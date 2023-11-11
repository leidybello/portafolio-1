<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mi_proyecto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para filtrar y consultar usuarios por nombre, apellido y cédula
function filtrarUsuarios($conn, $columna, $valor) {
    $valor = "%$valor%";

    if ($columna === "general") {
        // Búsqueda general en todas las columnas
        $sql = "SELECT * FROM usuarios WHERE nombre LIKE ? OR apellido LIKE ? OR cedula LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $valor, $valor, $valor);
    } else {
        // Búsqueda específica por columna
        $sql = "SELECT * FROM usuarios WHERE $columna LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $valor);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $usuarios = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    return $usuarios;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si las variables "nombre", "apellido" y "cedula" están definidas en $_POST
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
    $cedula = isset($_POST["cedula"]) ? $_POST["cedula"] : "";
    $busqueda_general = isset($_POST["busqueda_general"]) ? $_POST["busqueda_general"] : "";

    // Filtrar y consultar usuarios según los valores ingresados
    $usuarios_nombre = filtrarUsuarios($conn, "nombre", $nombre);
    $usuarios_apellido = filtrarUsuarios($conn, "apellido", $apellido);
    $usuarios_cedula = filtrarUsuarios($conn, "cedula", $cedula);
    $usuarios_busqueda_general = filtrarUsuarios($conn, "general", $busqueda_general);

    // Combinar los resultados en un único array para eliminar duplicados
    $usuarios_combinados = array_merge($usuarios_nombre, $usuarios_apellido, $usuarios_cedula, $usuarios_busqueda_general);

    // Eliminar duplicados usando la cédula como clave única
    $usuarios_unicos = array_unique($usuarios_combinados, SORT_REGULAR);
}

// No cerramos la conexión aquí para que la base de datos siga siendo accesible.
// Mostrar resultados 

if (isset($usuarios_unicos)) {
    echo "<h2>Resultados:</h2>";
    echo "<table id='usuariosTable'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>Cédula</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($usuarios_unicos as $usuario) {
        echo "<tr>";
        echo "<td>" . $usuario["nombre"] . "</td>";
        echo "<td>" . $usuario["apellido"] . "</td>";
        echo "<td>" . $usuario["cedula"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}

// Cerrar la conexión
$conn->close();
?>
