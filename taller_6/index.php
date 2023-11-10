<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.7/b-2.4.2/date-1.5.1/fc-4.3.0/r-2.5.0/rg-1.4.1/datatables.min.css" rel="stylesheet">
 
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.7/b-2.4.2/date-1.5.1/fc-4.3.0/r-2.5.0/rg-1.4.1/datatables.min.js"></script>
<link href="DataTables/datatables.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="DataTables/Buttons-2.4.2/css/buttons.dataTables.min.css"> -->
 

    <title>Document</title>
</head>
<body>
    <div class="container p-4">
        <div class="card ">
        <div class="card-header">
            <h1>Tabla Usuarios</h1>
        </div>
            <div class="card-body">
            <table id="mitabla" class="table table-striped responsive nowrap" style="width:100%">
    <thead>
    <tr>
        <th>id</th>
        <th>nombre</th>
        <th>apellido</th>
        <th>celular</th>
        <th>ac</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>1</th>
        <th>karina</th>
        <th>perez</th>
        <th>345345345</th>
        <th><button type="submit" class="btn btn-primary">Actualizar</button></th>
    </tr>
    </tbody>
    </table>
            </div>
        </div>



    </div>
    
</body>
<script src="js/proceso.js"></script>
<script src="DataTables/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://DataTables/Buttons-2.4.2/js/buttons.bootstrap4.min.js"></script>



<script>
    datatable();
    
</script>

</html>