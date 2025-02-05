Conexión.php
<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "mi_proyecto";

// Conexión a la base de datos
$conexion = new mysqli($server, $user, $pass, $db);

// Verificar la conexión
if ($conexion->connect_errno) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}

// Si se ha enviado el formulario de búsqueda por nombre, apellido o cédula
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar qué campos se enviaron y construir la consulta correspondiente
    $query = "SELECT * FROM tabla_usuarios WHERE 1 = 1";

    if (!empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $query .= " AND nombre = '$nombre'";
    }

    if (!empty($_POST['apellido'])) {
        $apellido = $_POST['apellido'];
        $query .= " AND apellido = '$apellido'";
    }

    if (!empty($_POST['cedula'])) {
        $cedula = $_POST['cedula'];
        $query .= " AND cedula = '$cedula'";
    }

    // Ejecutar la consulta
    $result = $conexion->query($query);

    // Mostrar los resultados
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Aquí puedes mostrar los resultados como desees
            echo "Nombre: " . $row['nombre'] . ", Apellido: " . $row['apellido'] . ", Cédula: " . $row['cedula'] . "<br>";
        }
    } else {
        echo "No se encontraron resultados.";
    }
}
?>