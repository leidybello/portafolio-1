<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Ejercicio 3</title>
</head>
<body>
  <h1>Ejercicio 3</h1>
<form action="ejercicio3.php" method="GET">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name">Nombre:</label>
      <input type="text"  name="name" class="form-control" id="name" placeholder="Digite Nombre:" required>
    </div>
    <div class="form-group col-md-4">
      <label for="last_name">Apellido:</label>
      <input type="text"  name="last_name" class="form-control" id="last_name" placeholder="Digite Apellido" required>
    </div>
    <div class="form-group col-md-4">
      <label for="id">Cedula:</label>
      <input type="number" step="any" name="id" class="form-control" id="id" placeholder="Digite Número de Cedula" required>
    </div>
  </div>
  <br>
  <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
</form>

  <?php
    if (isset($_GET['enviar'])) {
      $name = $_GET['name'];
      $last_name = $_GET['last_name'];
      $id = $_GET['id'];
      $enviar = $_GET['enviar'];
      echo '<h3>Nombre: ' . $name . '</h3>';
      echo '<h3>Apellido: ' . $last_name . '</h3>';
      echo '<h3>Cedula: ' . $id . '</h3>';
    }
?>

</body>
</html>