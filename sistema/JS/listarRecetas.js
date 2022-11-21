const tablaHTML = document.getElementById("tablaRecetas");
const url = "http://localhost/recetarioAppWeb/sistema/API/recetas.php";
const request = fetch(url);
let html = "";

request
  .then((response) => response.json())
  .then((data) => {
    console.log(data.length);
    for (let index = 0; index < data.length; index++) {
      html += `<tr>
                <td>${data[index].id}</td>
                <td>${data[index].nombre}</td>
                <td>${data[index].cantidad_pax}</td>
                <td>${data[index].tiempo_min}</td>
                <td>${data[index].dificultad}</td>
                <td>${data[index].ingredientes}</td>
                <td>${data[index].cantidad}</td>
                <td class='text-truncate' style='max-width: 150px;'>${data[index].descripcion}</td>
                <td>${data[index].foto_url}</td>
                <td>${data[index].nombre_tipo}</td>
                <td>
                  <div class='btn-group' role='group' aria-label='Button group name'>
                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop${data[index].id}">Editar</a>
                    <a type='button' class='btn btn-danger' onclick='borrarReceta(${data[index].id})'>Borrar</a>
                    <a type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal${data[index].id}'>
                      Ver descripción
                    </a>
                  </div>
                </td>
              </tr>`;

      html += `<div class='modal fade' id='exampleModal${data[index].id}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h5 class='modal-title' id='exampleModalLabel'>¿CÓMO ELABORAMOS LA RECETA?</h5>
                      <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                    ${data[index].descripcion}
                    </div>
                    <div class='modal-footer'>
                      <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>`;

      html += `<!-- Modal para editar recetas -->
              
              <div class="modal fade" id="staticBackdrop${data[index].id}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Editar receta</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="editarRecetas">
          
                      <div class="mb-3">
                        <label for="" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" formControlName="nombre" aria-describedby="helpId" 
                        placeholder="Introduce el título de la receta" value=" ${data[index].nombre}"  />

                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">Cantidad comensales:</label>
                        <input type="text" class="form-control" name="cantidad_pax" formControlName="cantidad_pax" aria-describedby="helpId" 
                        placeholder="Introduce los comensales" value="${data[index].cantidad_pax}" />
                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">Tiempo:</label>
                        <input type="text" class="form-control" name="tiempo_min" aria-describedby="helpId" formControlName="tiempo_min" 
                        placeholder="Introduce el tiempo de elaboración" value="${data[index].tiempo_min}" />
                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">Dificultad:</label>
                        <input type="text" class="form-control" name="dificultad" aria-describedby="helpId" formControlName="dificultad" 
                        placeholder="Introduce la dificultad de la receta" value="${data[index].dificultad}" />
                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">Ingredientes:</label>

                        <div id="ingredientes" name="ingredientes[]" multiple class="form-control" style="height: 200px;" value="${data[index].ingredientes}">
                    
                        </div>

                      </div>

                      
                      <div class="mb-3">
                        <label for="" class="form-label">Cantidad:</label>
                        <input type="text" class="form-control" name="dificultad" aria-describedby="helpId" formControlName="dificultad" 
                        placeholder="Introduce la dificultad de la receta" value="${data[index].cantidad}" />
                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">Descripción:</label>
                        <textarea rows="4" type="text" class="form-control" name="descripcion" aria-describedby="helpId" formControlName="descripcion" 
                        placeholder="Introduce la descripción de la receta">${data[index].descripcion}
                      </textarea>
                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">Tipo:</label>

                        <select class="form-control" aria-describedby="helpId" formControlName="tipo" name="id_tipos" id="id_tipos" value="${data[index].nombre_tipo}">

                        </select>
                      </div>

                      <!-- <div class="mb-3">
                        <label for="" class="form-label">Imagen:</label>
                        <div><input type="file" class="form-control" name="image" id="image" multiple aria-describedby="helpId" formControlName="imagen" 
                        placeholder="Introduce una foto de la receta" value="${data[index].foto_url}" />
                          <br>
                          <input type="submit" name="cargarImagen" class="btn" style="background-color: green; color: white" value="Cargar Imagen">
                        </div>
                      </div> -->

      
                    </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-primary">Editar</button>
                    </div>
                  </div>
                </div>
              </div>`;
    }

    tablaHTML.innerHTML += html;
  })
  .catch((error) => console.log(error));
