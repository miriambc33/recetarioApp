const borrarReceta = (id) => {
  const url = `http://localhost/recetarioAppWeb/sistema/API/borrarReceta.php?id=${id}`;
  location.href = url;
  // //   //   fetch(url)
  // //   //     .then((response) => response.json())
  // //   //     .then((recetas) => {
  // //   //       const tpl = recetas.map(
  // //   //         (data) => `<tr>
  // //   //                 <td>${data[index].id}</td>
  // //   //                 <td>${data[index].nombre}</td>
  // //   //                 <td>${data[index].cantidad_pax}</td>
  // //   //                 <td>${data[index].tiempo_min}</td>
  // //   //                 <td>${data[index].dificultad}</td>
  // //   //                 <td>${data[index].ingredientes}</td>
  // //   //                 <td>${data[index].cantidad}</td>
  // //   //                 <td class='text-truncate' style='max-width: 150px;'>${data[index].descripcion}</td>
  // //   //                 <td>${data[index].foto_url}</td>
  // //   //                 <td>${data[index].nombre_tipo}</td>
  // //   //                 <td>
  // //   //                   <div class='btn-group' role='group' aria-label='Button group name'>
  // //   //                     <a href='editar-recetas.php' class='btn btn-primary'>Editar</a>
  // //   //                     <a type="button" class="btn btn-danger onclick="borrarReceta(${data[index].id})">Borrar</a>
  // //   //                     <a type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal${data[index].id}'>
  // //   //                       Ver descripción
  // //   //                     </a>
  // //   //                   </div>
  // //   //                 </td>
  // //   //               </tr>`
  // //   //       );

  // //   //       htmlResponse.innerHTML = `<ul>${tpl}</ul>`;
  // //   //     });
};
