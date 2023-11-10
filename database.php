<?
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'portafolio';

try {
    $conn = new PDO("mqsql:host=$server;dbname=$database",$username, $password);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}
?>