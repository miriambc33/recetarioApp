//Consulta a la API para obtener los tipos de recetas
//Forma de atacar al servicio REST
var xmlHttp = new XMLHttpRequest();
xmlHttp.open(
  "GET",
  "http://localhost/recetarioAppWeb/sistema/API/tipos.php",
  false
); // false for synchronous request
xmlHttp.send(null);
//console.log(xmlHttp.responseText);

//Convertimos en objeto
var resultadoTipos = JSON.parse(xmlHttp.responseText);

//console.log(resultadoTipos);

var html = '<option value="">Seleccione un tipo</option>';
for (var i = 0; i < resultadoTipos.length; i++) {
  html +=
    '<option value="' +
    resultadoTipos[i].id +
    '">' +
    resultadoTipos[i].nombre +
    "</option>";
}

document.getElementById("id_tipos").innerHTML += html;
