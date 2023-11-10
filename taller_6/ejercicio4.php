<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Ejercicio 4</title>
</head>
<body>
  <h1>Ejercicio 4</h1>
<form action="ejercicio4.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="edad">Fecha de Nacimiento</label>
      <input type="date" step="any" name="fecha" class="form-control" id="fecha" required>
    </div>
</div>
    <br>
    
  <button type="submit" name="calcular" class="btn btn-primary">Enviar</button>
</form>


<?php
if (isset($_POST['calcular'])) {
  $fecha_n = $_POST['fecha'];
  $fecha = new DateTime($_POST['fecha']);
  $fecha_actual_n = date('Y-m-d');
  $fecha_actual = new DateTime(date('Y-m-d'));
  $diff = $fecha->diff($fecha_actual);
  $año = $diff->y; 
  $mes = $diff->m;
  $dia = $diff->d;

  echo '<h3>Fecha de nacimiento = ' . $fecha_n . '<br>' .
       'Fecha actual = ' . $fecha_actual_n . '<br>' .
       'Edad = ' . $año . 'año(s) ' . $mes . 'mes(es) ' . $dia . 'dia(s)  </h3>'; 
}
?>








</body>
</html>
