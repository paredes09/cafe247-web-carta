function enviarFormulario(event, formID,actionUrl) {
    event.preventDefault();    
  // Mostrar el círculo de carga
  document.getElementById("carga").style.display = "block";

  // Deshabilitar el formulario mientras se procesa
  document.getElementById(formID).disabled = true;

  // Obtener los datos del formulario
  var formData = new FormData(document.getElementById(formID));

  // Realizar la petición AJAX para enviar los datos al servidor
  var xhr = new XMLHttpRequest();
  xhr.open("POST", actionUrl, true);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
        // Agregar un tiempo de espera de 2 segundos antes de ocultar el círculo de carga
        setTimeout(function() {
            // Ocultar el círculo de carga
            document.getElementById("carga").style.display = "none";
    
            // Habilitar el formulario nuevamente
            document.getElementById(formID).disabled = false;
    
            // Manejo de errores
            if (xhr.status === 200) {
                // Respuesta exitosa, verifica el contenido de la respuesta
                var jsonResponse;
                // Buscar la posición del primer '{' en la respuesta
                var start = xhr.responseText.indexOf('{');

                function mostrarModal(message) {
                    // Actualizar el contenido del modal
                    var modalContent = document.getElementById('modal-content');
                    modalContent.innerHTML = message;
                    
                    // Mostrar el check
                    var check = document.getElementById('check');
                    check.style.display = 'block';
                    // Mostrar el modal
                    $('#myModal').modal('show');

                
                    // Cerrar el modal después de 3 segundos (puedes ajustar este tiempo)
                    setTimeout(function() {
                        cerrarModal();
                    }, 3000);
                }
                
                function cerrarModal() {
                    // Ocultar el modal
                    $('#myModal').modal('hide');
                }
                
                if (start != -1) {
                    // Extraer la parte válida del JSON
                    jsonResponse = xhr.responseText.substring(start);
                    console.log(jsonResponse);
                    var response = JSON.parse(jsonResponse);
                    
                    if (response.success) {
                        mostrarModal(response.message);
                        // Inserción exitosa, muestra el mensaje de éxito en algún contenedor en tu página
                        // Limpiar el formulario
                        document.getElementById(formID).reset();
        
                        // Función para recargar la página después de 2 segundos
                        setTimeout(function() {
                            window.location.reload();
                        }, 2800);
                    } else {
                        // Inserción fallida, muestra el mensaje de error en algún contenedor en tu página
                        document.getElementById("mensaje-error").innerHTML = response.message;
                        document.getElementById("mensaje-error").style.display = "block";
                    }
                } else {
                
                }
            } else {
                // Error en la solicitud AJAX
                alert("Error de solicitud AJAX. Estado: " + xhr.status);
            }
        },); // Tiempo de espera de 2 segundos (ajusta según sea necesario)
    }    
  };

  // Enviar los datos del formulario al servidor
  xhr.send(formData);
}
