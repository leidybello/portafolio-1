<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'portafolio';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $direccionCorreo = $_POST["direccionCorreo"];
    $numeroCelular = $_POST["numeroCelular"];
    $asuntoCorreo = $_POST["asuntoCorreo"];
    $mensaje = $_POST["mensaje"];

    $sql = "INSERT INTO contacto (nombre, direccionCorreo, numeroCelular, asuntoCorreo, mensaje)
            VALUES ('$nombre', '$direccionCorreo', '$numeroCelular', '$asuntoCorreo', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos guardados con éxito";
    } else {
        echo "Error al guardar datos: " . $conn->error;
    }
}

$conn->close();
?>