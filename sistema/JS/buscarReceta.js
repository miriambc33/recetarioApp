//Función para buscar receta por nombre
//variable num_cols se utiliza para saber en qué columnas se buscará, contando desde la primera columna que será la cero
//https://www.w3schools.com/howto/howto_js_filter_table.asp
function search() {
  let num_cols, display, input, filter, table_body, tr, td, i, txtValue;
  num_cols = 10;
  input = document.getElementById("filtrar");
  filter = input.value.toUpperCase();
  table_body = document.getElementById("tablaRecetas");
  tr = table_body.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    display = "none";
    for (j = 0; j < num_cols; j++) {
      td = tr[i].getElementsByTagName("td")[j];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          display = "";
        }
      }
    }
    tr[i].style.display = display;
  }
}
