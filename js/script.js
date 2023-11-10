 const abrirPdfButton = document.getElementById('abrirPdf');

//Al dar click en el boton la funcion se asigna
 abrirPdfButton.addEventListener('click', function() {
 //direccionamiento de la hoja de vida en la carpeta documents
            const pdfUrl = 'documents/hoja_de_vida.pdf';

         // Abrir el PDF en una nueva pagina
            window.open(pdfUrl, '_blank');
        });

        document.addEventListener("DOMContentLoaded", function() {
         const form = document.querySelector('form');

         form.addEventListener('submit', function(event) {
             event.preventDefault();

             // Obtener los valores de los campos del formulario
             const nombre = document.querySelector('input[placeholder="Nombre Completo"]').value;
             const direccionCorreo = document.querySelector('input[placeholder="Direccion de Correo"]').value;
             const numeroCelular = document.querySelector('input[placeholder="Numero de Celular"]').value;
             const asuntoCorreo = document.querySelector('input[placeholder="Asunto Correo"]').value;
             const mensaje = document.querySelector('textarea').value;

             // Enviar los datos al servidor mediante una solicitud AJAX (usando fetch)
             fetch('guardar_datos.php', {
                 method: 'POST',
                 headers: {
                     'Content-Type': 'application/json',
                 },
                 body: JSON.stringify({
                     nombre,
                     direccionCorreo,
                     numeroCelular,
                     asuntoCorreo,
                     mensaje
                 }),
             })
             .then(response => response.json())
             .then(data => {
                 // Hacer algo con la respuesta del servidor (si es necesario)
                 console.log(data);
             })
             .catch(error => {
                 console.error('Error:', error);
             });
         });
     });