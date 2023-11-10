   var tablas="";
function datatable(){
    // $(document).ready(function () {

        tablas=$('#mitabla').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }

        );
    // });
  
}