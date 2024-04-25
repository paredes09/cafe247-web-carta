// validator para el formulario de registro de productos
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("#miFormulario3");

    if(form) {
        form.addEventListener("submit", function(event) {
            clearErrors(); // Limpia los mensajes de error antes de realizar nuevas validaciones
    
            const producto = document.querySelector('input[name="producto"]');
            const precio = document.querySelector('input[name="precio"]');
            const categoria = document.querySelector('select[name="categoria"]');
    
            validateInput(producto, "Ingrese el nombre del producto", "producto");
            validateInput(precio, "Ingrese el precio", "precio");
            validateSelect(categoria, "Seleccione la categoría", "categoria");
    
            // Puedes agregar más validaciones según tus necesidades
    
            // Si no hay errores, permitir que el formulario se envíe
            if (!hasErrors()) {
                console.log("No hay errores. Permitiendo el envío del formulario.");
                return true; // Permite el envío del formulario
            } else {
                console.log("Hay errores. Evitando el envío del formulario.");
                event.preventDefault(); // Evita el envío del formulario si hay errores
            }
        });
    
        // Agregar evento de escucha para el evento input en cada campo de entrada
        form.querySelectorAll('input, select').forEach(function(input) {
            input.addEventListener('input', function() {
                clearErrorsForField(this); // Limpia los errores cuando el usuario comienza a corregir
            });
        });
    
        function validateInput(input, errorMessage, fieldName) {
            const value = input.value.trim();
            if (value === "") {
                showError(input, errorMessage, fieldName);
            } else {
                clearErrorsForField(input);
            }
        }
    
        function validateSelect(select, errorMessage, fieldName) {
            const value = select.value;
            if (value === "") {
                showError(select, errorMessage, fieldName);
            } else {
                clearErrorsForField(select);
            }
        }
    
        function showError(element, errorMessage, fieldName) {
            const errorElement = document.createElement("div");
            errorElement.className = "text-danger";
            errorElement.textContent = errorMessage;
    
            const parent = element.parentNode;
            parent.appendChild(errorElement);
    
            // Añadir una clase de error al campo para resaltar visualmente
            element.classList.add("is-invalid");
        }
    
        function clearErrors() {
            const errorElements = document.querySelectorAll(".text-danger");
            errorElements.forEach(function(element) {
                element.parentNode.removeChild(element);
            });
    
            // Eliminar clases de error para todos los campos
            form.querySelectorAll(".is-invalid").forEach(function(input) {
                input.classList.remove("is-invalid");
            });
        }
    
        function clearErrorsForField(field) {
            // Elimina el mensaje de error y la clase de error para el campo específico
            const errorElement = field.parentNode.querySelector(".text-danger");
            if (errorElement) {
                errorElement.parentNode.removeChild(errorElement);
            }
            field.classList.remove("is-invalid");
        }
    
        function hasErrors() {
            // Verificar si hay elementos con la clase de error
            const errorElements = document.querySelectorAll(".text-danger");
            return errorElements.length > 0;
        }
    }

});


//validacion de formulario de registro de categorias
document.addEventListener("DOMContentLoaded", function() {
    const form2 = document.querySelector("#miFormulario2");
    if(form2){
        form2.addEventListener("submit", function(event) {
            clearErrors(); // Limpia los mensajes de error antes de realizar nuevas validaciones
    
            const categoria = document.querySelector('input[name="categoria"]');
            validateInput(categoria, "Ingrese el nombre de la categoria", "categoria");
            // Puedes agregar más validaciones según tus necesidades
    
            // Si no hay errores, permitir que el formulario se envíe
            if (!hasErrors()) {
                console.log("No hay errores. Permitiendo el envío del formulario.");
            } else {
                console.log("Hay errores. Evitando el envío del formulario.");
                event.preventDefault(); // Evita el envío del formulario si hay errores
            }
        });
    
        // Agregar evento de escucha para el evento input en cada campo de entrada
        form2.querySelectorAll('input').forEach(function(input) {
            input.addEventListener('input', function() {
                clearErrorsForField(this); // Limpia los errores cuando el usuario comienza a corregir
            });
        });
    
        function validateInput(input, errorMessage, fieldName) {
            const value = input.value.trim();
            console.log(`Valor de ${fieldName}: ${value}`);
            if (value === "") {
                showError(input, errorMessage, fieldName);
            } else {
                clearErrorsForField(input); // Limpiar errores si el campo está ahora válido
            }
        }
    
        function showError(element, errorMessage, fieldName) {
            const errorElement = document.createElement("div");
            errorElement.className = "text-danger";
            errorElement.textContent = errorMessage;
    
            const parent = element.parentNode;
            parent.appendChild(errorElement);
    
            // Añadir una clase de error al campo para resaltar visualmente
            element.classList.add("is-invalid");
        }
    
        function clearErrors() {
            const errorElements = form2.querySelectorAll(".text-danger");
            errorElements.forEach(function(element) {
                element.parentNode.removeChild(element);
            });
    
            // Eliminar clases de error para todos los campos
            form2.querySelectorAll(".is-invalid").forEach(function(input) {
                input.classList.remove("is-invalid");
            });
        }
    
        function clearErrorsForField(field) {
            // Elimina el mensaje de error y la clase de error para el campo específico
            const errorElement = field.parentNode.querySelector(".text-danger");
            if (errorElement) {
                errorElement.parentNode.removeChild(errorElement);
            }
            field.classList.remove("is-invalid");
        }
    
        function hasErrors() {
            // Verificar si hay elementos con la clase de error
            const errorElements = form2.querySelectorAll(".text-danger");
            return errorElements.length > 0;
        }
    }
    
});

//validacion de formulario de registro de ofertas
document.addEventListener("DOMContentLoaded", function() {
    const form3 = document.querySelector("#miFormulario1");

    if(form3){
        form3.addEventListener("submit", function(event) {
            clearErrors(); // Limpia los mensajes de error antes de realizar nuevas validaciones
    
            const oferta = document.querySelector('input[name="oferta"]');
            validateInput(oferta, "Ingrese el nombre de la oferta", "oferta");
    
            const precio = document.querySelector('input[name="o_precio"]');
            validateInput(precio, "Ingrese el precio de la oferta", "precio");
    
            const descripcion = document.querySelector('textarea[name="descripcion"]');
            validateInput(descripcion, "Ingrese la descripción de la oferta", "descripcion");
    
            const imagen = document.querySelector('input[name="imagen"]');
            validateFileInput(imagen, "Seleccione una imagen válida", "imagen");
    
            // Puedes agregar más validaciones según tus necesidades
    
            // Si no hay errores, permitir que el formulario se envíe
            if (!hasErrors()) {
                console.log("No hay errores. Permitiendo el envío del formulario.");
            } else {
                console.log("Hay errores. Evitando el envío del formulario.");
                event.preventDefault(); // Evita el envío del formulario si hay errores
            }
        });
    
        // Agregar evento de escucha para el evento input en cada campo de entrada
        form3.querySelectorAll('input, textarea').forEach(function(input) {
            input.addEventListener('input', function() {
                clearErrorsForField(this); // Limpia los errores cuando el usuario comienza a corregir
            });
        });
    
        function validateInput(input, errorMessage, fieldName) {
            const value = input.value.trim();
            console.log(`Valor de ${fieldName}: ${value}`);
            if (value === "") {
                showError(input, errorMessage, fieldName);
            } else {
                clearErrorsForField(input); // Limpiar errores si el campo está ahora válido
            }
        }
    
        function validateFileInput(input, errorMessage, fieldName) {
            const value = input.value.trim();
            console.log(`Valor de ${fieldName}: ${value}`);
            const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; // Extensiones permitidas: jpg, jpeg, png
            if (value === "" || !allowedExtensions.test(value)) {
                showError(input, errorMessage, fieldName);
            } else {
                clearErrorsForField(input); // Limpiar errores si el campo está ahora válido
            }
        }
    
        function showError(element, errorMessage, fieldName) {
            const errorElement = document.createElement("div");
            errorElement.className = "text-danger";
            errorElement.textContent = errorMessage;
    
            const parent = element.parentNode;
            parent.appendChild(errorElement);
    
            // Añadir una clase de error al campo para resaltar visualmente
            element.classList.add("is-invalid");
        }
    
        function clearErrors() {
            const errorElements = form3.querySelectorAll(".text-danger");
            errorElements.forEach(function(element) {
                element.parentNode.removeChild(element);
            });
    
            // Eliminar clases de error para todos los campos
            form3.querySelectorAll(".is-invalid").forEach(function(input) {
                input.classList.remove("is-invalid");
            });
        }
    
        function clearErrorsForField(field) {
            // Elimina el mensaje de error y la clase de error para el campo específico
            const errorElement = field.parentNode.querySelector(".text-danger");
            if (errorElement) {
                errorElement.parentNode.removeChild(errorElement);
            }
            field.classList.remove("is-invalid");
        }
    
        function hasErrors() {
            // Verificar si hay elementos con la clase de error
            const errorElements = form3.querySelectorAll(".text-danger");
            return errorElements.length > 0;
        }
    }


    
});


// validacion de formulario de registro de actualizacion de productos
document.addEventListener("DOMContentLoaded", function() {
    const form4 = document.querySelector("#miFormulario4");

    if(form4){
        form4.addEventListener("submit", function(event) {
            clearErrors(); // Limpia los mensajes de error antes de realizar nuevas validaciones
    
            const producto_actualizado = document.querySelector('input[name="producto_actualizado"]');
            const precio_actualizado = document.querySelector('input[name="precio_actualizado"]');
            const categoria_actualizado = document.querySelector('select[name="categoria_actualizado"]');
    
    
            validateInput(producto_actualizado, "Ingrese el nombre del producto", "producto_actualizado");
            validateInput(precio_actualizado, "Ingrese el precio", "precio_actualizado");
            validateSelect(categoria_actualizado, "Seleccione la categoría", "categoria_actualizado");
    
    
            // Puedes agregar más validaciones según tus necesidades
    
            // Si no hay errores, permitir que el formulario se envíe
            if (!hasErrors()) {
                console.log("No hay errores. Permitiendo el envío del formulario.");
                return true; // Permite el envío del formulario
            } else {
                console.log("Hay errores. Evitando el envío del formulario.");
                event.preventDefault(); // Evita el envío del formulario si hay errores
            }
        });
    
        // Agregar evento de escucha para el evento input en cada campo de entrada
        form4.querySelectorAll('input, select').forEach(function(input) {
            input.addEventListener('input', function() {
                clearErrorsForField(this); // Limpia los errores cuando el usuario comienza a corregir
            });
        });
    
        function validateInput(input, errorMessage, fieldName) {
            const value = input.value.trim();
            if (value === "") {
                showError(input, errorMessage, fieldName);
            } else {
                clearErrorsForField(input);
            }
        }
    
        function validateSelect(select, errorMessage, fieldName) {
            const value = select.value;
            if (value === "") {
                showError(select, errorMessage, fieldName);
            } else {
                clearErrorsForField(select);
            }
        }
    
        function showError(element, errorMessage, fieldName) {
            const errorElement = document.createElement("div");
            errorElement.className = "text-danger";
            errorElement.textContent = errorMessage;
    
            const parent = element.parentNode;
            parent.appendChild(errorElement);
    
            // Añadir una clase de error al campo para resaltar visualmente
            element.classList.add("is-invalid");
        }
    
        function clearErrors() {
            const errorElements = document.querySelectorAll(".text-danger");
            errorElements.forEach(function(element) {
                element.parentNode.removeChild(element);
            });
    
            // Eliminar clases de error para todos los campos
            form4.querySelectorAll(".is-invalid").forEach(function(input) {
                input.classList.remove("is-invalid");
            });
    
            const mensajeError = document.getElementById("mensaje-error");
            if (mensajeError) {
                mensajeError.style.display = "none";
            }
        }
    
        function clearErrorsForField(field) {
            // Elimina el mensaje de error y la clase de error para el campo específico
            const errorElement = field.parentNode.querySelector(".text-danger");
            if (errorElement) {
                errorElement.parentNode.removeChild(errorElement);
            }
            field.classList.remove("is-invalid");
        }
    
        function hasErrors() {
            // Verificar si hay elementos con la clase de error
            const errorElements = document.querySelectorAll(".text-danger");
            return errorElements.length > 0;
        }    
    }


 
  
});

// limpiar y cerrar modal para el formulario de registro de actualizacion de productoss
function clearErrors() {
    const errorElements = document.querySelectorAll(".text-danger");
    errorElements.forEach(function(element) {
        element.parentNode.removeChild(element);
    });

    // Eliminar clases de error para todos los campos
    document.querySelectorAll(".is-invalid").forEach(function(input) {
        input.classList.remove("is-invalid");
    });
    const mensajeError = document.getElementById("mensaje-error");
    if (mensajeError) {
        mensajeError.style.display = "none";
    }
}
function limpiarYCerrarModal() {
    
    clearErrors(); // Limpia los mensajes de error antes de cerrar el modal
    const modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
    modal.hide(); // Intentamos cerrar el modal
}

//validacion de formulario de registro de actualizacion de ofertas
document.addEventListener("DOMContentLoaded", function() {
    const form5 = document.querySelector("#miFormulario5");
    if(form5){
        form5.addEventListener("submit", function(event) {
            clearErrors(); // Limpia los mensajes de error antes de realizar nuevas validaciones
    
            const oferta = document.querySelector('input[name="oferta_actualizado"]');
            validateInput(oferta, "Ingrese el nombre de la oferta", "oferta");
    
            const precio = document.querySelector('input[name="o_precio_actualizado"]');
            validateInput(precio, "Ingrese el precio de la oferta", "precio");
    
            const descripcion = document.querySelector('textarea[name="descripcion_actualizado"]');
            validateInput(descripcion, "Ingrese la descripción de la oferta", "descripcion");
    
    
    
            // Puedes agregar más validaciones según tus necesidades
    
            // Si no hay errores, permitir que el formulario se envíe
            if (!hasErrors()) {
                console.log("No hay errores. Permitiendo el envío del formulario.");
            } else {
                console.log("Hay errores. Evitando el envío del formulario.");
                event.preventDefault(); // Evita el envío del formulario si hay errores
            }
        });
    
        // Agregar evento de escucha para el evento input en cada campo de entrada
        form5.querySelectorAll('input, textarea').forEach(function(input) {
            input.addEventListener('input', function() {
                clearErrorsForField(this); // Limpia los errores cuando el usuario comienza a corregir
            });
        });
    
        function validateInput(input, errorMessage, fieldName) {
            const value = input.value.trim();
            console.log(`Valor de ${fieldName}: ${value}`);
            if (value === "") {
                showError(input, errorMessage, fieldName);
            } else {
                clearErrorsForField(input); // Limpiar errores si el campo está ahora válido
            }
        }
    
        function validateFileInput(input, errorMessage, fieldName) {
            const value = input.value.trim();
            console.log(`Valor de ${fieldName}: ${value}`);
            const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; // Extensiones permitidas: jpg, jpeg, png
            if (value === "" || !allowedExtensions.test(value)) {
                showError(input, errorMessage, fieldName);
            } else {
                clearErrorsForField(input); // Limpiar errores si el campo está ahora válido
            }
        }
    
        function showError(element, errorMessage, fieldName) {
            const errorElement = document.createElement("div");
            errorElement.className = "text-danger";
            errorElement.textContent = errorMessage;
    
            const parent = element.parentNode;
            parent.appendChild(errorElement);
    
            // Añadir una clase de error al campo para resaltar visualmente
            element.classList.add("is-invalid");
        }
    
        function clearErrors() {
            const errorElements = form5.querySelectorAll(".text-danger");
            errorElements.forEach(function(element) {
                element.parentNode.removeChild(element);
            });
    
            // Eliminar clases de error para todos los campos
            form5.querySelectorAll(".is-invalid").forEach(function(input) {
                input.classList.remove("is-invalid");
            });
        }
    
        function clearErrorsForField(field) {
            // Elimina el mensaje de error y la clase de error para el campo específico
            const errorElement = field.parentNode.querySelector(".text-danger");
            if (errorElement) {
                errorElement.parentNode.removeChild(errorElement);
            }
            field.classList.remove("is-invalid");
        }
    
        function hasErrors() {
            // Verificar si hay elementos con la clase de error
            const errorElements = form5.querySelectorAll(".text-danger");
            return errorElements.length > 0;
        }
    }
    
});

