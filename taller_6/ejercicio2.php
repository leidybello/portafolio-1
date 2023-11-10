<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Ejercicio 2</title>
</head>
<body>
  <h1>Ejercicio 2</h1>
<form action="ejercicio2.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="edad">Edad</label>
      <input type="number" step="any" name="edad" class="form-control" id="edad" placeholder="Digite la edad" required>
    </div>
</div>
    <br>
    
  <button type="submit" name="calcular" class="btn btn-primary">calcular</button>
</form>


  <?php
  if (isset($_POST['calcular'])) {
    $edad = $_POST['edad'];
  
    if ($edad >= 18 && $edad <= 100) {
        echo '<h3>¡Es mayor de edad!</h3>';
    } elseif ($edad < 18 && $edad > 0) {
        echo '<h3>¡Es menor de edad!</h3>';
    } else {
        echo '<h3>¡El valor ingresado es incorrecto!</h3>';
    }
}
        
  

?>

</body>
</html>