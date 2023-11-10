function filterTable(event, columnIndex) {
    if (event.key === "Enter") {
        var filter = event.target.value.toUpperCase();
        var table = document.getElementById('usuariosTable');
        var rows = table.getElementsByTagName('tr');
        
        for (var i = 2; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td')[columnIndex];
            if (cells) {
                var textValue = cells.textContent || cells.innerText;
                if (textValue.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    }
}

function submitForm() {
    document.forms[0].submit();
}