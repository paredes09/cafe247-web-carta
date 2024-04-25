function enviarFormulario(event) {
      event.preventDefault();    
    // Mostrar el círculo de carga
    document.getElementById("carga").style.display = "block";

    // Deshabilitar el formulario mientras se procesa
    document.getElementById("miFormulario").disabled = true;

    // Obtener los datos del formulario
    var formData = new FormData(document.getElementById("miFormulario"));

    // Realizar la petición AJAX para enviar los datos al servidor
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "forms/reclamo_instert.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            // Ocultar el círculo de carga
           
                document.getElementById("carga").style.display = "none";

                // Habilitar el formulario nuevamente
                document.getElementById("miFormulario").disabled = false;

                // Manejo de errores
                if (xhr.status === 200) {
                    // Respuesta exitosa, verifica el contenido de la respuesta
                  
                     // Buscar la posición del primer '{' en la respuesta
                            var start = xhr.responseText.indexOf('{');

                            // Extraer la parte válida del JSON
                            var jsonResponse = xhr.responseText.substring(start);

                            // Analizar la respuesta JSON
                            var response = JSON.parse(jsonResponse);
                            
                    if (response.success) {
                        // Inserción exitosa, muestra el mensaje de éxito en algún contenedor en tu página
                        document.getElementById("mensaje-exito").innerHTML = response.message;
                        document.getElementById("mensaje-exito").style.display = "block";
                        // Limpiar el formulario
                        document.getElementById("miFormulario").reset();

                        // funcion para recargar la pagina despues de 3 segundos
                        setTimeout(function(){
                           window.location.reload();
                           }, 2000);
                    } else {
                        // Algo salió mal en el servidor, muestra un mensaje de error
                        alert("Error en el servidor: " + response.message);
                    }
                } else {
                    // Error en la solicitud AJAX
                    alert("Error de solicitud AJAX. Estado: " + xhr.status);
                }
            
        }
    };

    // Enviar los datos del formulario al servidor
    xhr.send(formData);
}
