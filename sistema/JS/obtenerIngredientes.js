//Consulta a la API para obtener los tipos de recetas
//Forma de atacar al servicio REST
var xmlHttp = new XMLHttpRequest();
xmlHttp.open(
  "GET",
  "http://localhost/recetarioAppWeb/sistema/API/ingredientes.php",
  false
); // false for synchronous request
xmlHttp.send(null);
//console.log(xmlHttp.responseText);

//Convertimos en objeto
var resultadoIngredientes = JSON.parse(xmlHttp.responseText);

let html = "<label>Seleccione uno o varios ingredientes: </label> <br><br>";

for (var i = 0; i < resultadoIngredientes.length; i++) {
  html += `<div class='form-check form-check-inline'>
    <input class='form-check-input' type='checkbox' value='${resultadoIngredientes[i].id}' id='inlineCheckbox1' name='ingredientes[]'>
    <label class='form-check-label' for='inlineCheckbox1'>
      ${resultadoIngredientes[i].nombre}
    </label>
  </div>`;
}

document.getElementById("ingredientes").innerHTML += html;

const select = document.getElementsByClassName("form-check-input");
console.log(select);

select.addEventListener("blur", () => {
  alert(select.value);
});
