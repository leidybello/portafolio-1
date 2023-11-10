<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Ejercicio 1</title>
</head>
<body>
  <h1>Ejercicio 1</h1>
<form action="ejercicio1.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="n1">Numero 1</label>
      <input type="number" step="any" name="n1" class="form-control" id="n1" placeholder="Digite Número 1" required>
    </div>
    <div class="form-group col-md-6">
      <label for="n2">Numero 2</label>
      <input type="number" step="any" name="n2" class="form-control" id="n2" placeholder="Digite Número 2" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="operacion">Operacion a realizar</label>
      <select id="operacion" name="ope" class="form-control" required>
        <option value="">Selecione una operacion...</option>
        <option value="1">Suma</option>
        <option value="2">Resta</option>
        <option value="3">Multiplicación</option>
        <option value="4">División</option>
      </select>
    </div>
  </div>
  <br>
  <button type="submit" name="operar" class="btn btn-primary">Operar</button>
</form>


  <?php
  if (isset($_POST['operar'])) {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $ope = $_POST['ope'];

    switch ($ope) {
      case '1':
        $total = $n1 + $n2;
        $ope2 = 'suma' ;
      break;
      case '2':
        $total = $n1 - $n2;
        $ope2 = 'resta' ;
      break;
      case '3':
        $total = $n1 * $n2;
        $ope2 = 'multiplicacion' ;
      break;
      case '4':
        $total = $n1 / $n2;
        $ope2 = 'division' ;   
      break;      
    }

     
      echo '<h3>La ' . $ope2 . ' entre el número ' . $n1 . ' y el número ' . $n2 . ' es igual a: ' . $total. '</h3>';

    }

?>

</body>
</html>