document.getElementById('abrirPdf').addEventListener('click', function() {
    // Cambia la URL a la ubicación de tu PDF
    const urlPDF = 'documents/hoja_de_vida.pdf';
    
    // Abre el PDF en una nueva pestaña o ventana
    const nuevaVentana = window.open(urlPDF, '_blank');
    if (nuevaVentana) {
        nuevaVentana.focus();
    } else {
        // Si el navegador bloquea la apertura de una nueva ventana,
        // muestra un mensaje indicando que se ha bloqueado
        alert('La apertura de la nueva ventana ha sido bloqueada por el navegador. Por favor, revisa la configuración de tu navegador.');
    }
});