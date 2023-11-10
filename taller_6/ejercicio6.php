<?php

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mi_proyecto";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Filtrar y consultar usuarios
function filtrarUsuarios($campo, $filtro) {
    global $conn;

    $filtro = "%$filtro%";

    // Verificar si se proporcionó un campo específico
    if ($campo !== "general") {
        // Construir la consulta SQL para el campo especificado
        $sql = "SELECT * FROM usuarios WHERE $campo LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $filtro);
        $stmt->execute();

        $result = $stmt->get_result();
        $usuarios = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $usuarios;
    } else {
        // Si no se proporciona un campo específico, buscar en todas las columnas
        $sql = "SELECT * FROM usuarios WHERE nombre LIKE ? OR apellido LIKE ? OR cedula LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $filtro, $filtro, $filtro);
        $stmt->execute();

        $result = $stmt->get_result();
        $usuarios = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $usuarios;
    }
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si las variables "nombre", "apellido" y "cedula" están definidas en $_POST
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
    $cedula = isset($_POST["cedula"]) ? $_POST["cedula"] : "";
    $busqueda_general = isset($_POST["busqueda_general"]) ? $_POST["busqueda_general"] : "";

    // Filtrar y consultar usuarios según los valores ingresados
    $usuarios_nombre = filtrarUsuarios("nombre", $nombre);
    $usuarios_apellido = filtrarUsuarios("apellido", $apellido);
    $usuarios_cedula = filtrarUsuarios("cedula", $cedula);
    $usuarios_busqueda_general = filtrarUsuarios("general", $busqueda_general);

    // Combinar los resultados en un único array para eliminar duplicados
    $usuarios_combinados = array_merge($usuarios_nombre, $usuarios_apellido, $usuarios_cedula, $usuarios_busqueda_general);

    // Eliminar duplicados usando la cédula como clave única
    $usuarios_unicos = array_unique($usuarios_combinados, SORT_REGULAR);
}

// No cerramos la conexión aquí para que la base de datos siga siendo accesible.

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style6.css">
    <title>Consulta de Usuarios</title>
    
</head>
<body>
    <h1>Consulta de Usuarios</h1>
    <div class="buscar">
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="text" placeholder="Buscar" name="busqueda_general" id="busqueda_general" oninput="submitForm()">
        <button type="submit">Buscar</button>
    </form>
    </div>
    <div class="container-form2 p-4" >
    <form action="" class="filtro-columna">
    <input type="text" placeholder="Buscar por nombre" name="filtro_nombre" id="filtro_nombre" oninput="submitForm()">
    <input type="text" placeholder="Buscar porr apellido" name="filtro_apellido" id="filtro_apellido" oninput="submitForm()">
    <input type="text" placeholder="Buscar por cedula" name="filtro_cedula" id="filtro_cedula" oninput="submitForm()">
    </form>
    </div>
    
    <div class="result-container">
    <?php
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
    ?>
</div>

<script> $(document).ready(function() {
            $('#mitabla').DataTable();
        });
</script>
</body>
</html>
