// validator.js
$(document).ready(function () {
  $(".php-email-form").submit(function (e) {
      // Resetear mensajes de error
      $(".is-invalid").removeClass("is-invalid");

      // Validar Nombres
      var name = $("#name").val();
      if (name.trim() == "") {
          $("#name").addClass("is-invalid");
          return false;
      }

      // Validar Email
      var email = $("#email").val();
      if (email.trim() == "" || !isValidEmail(email)) {
          $("#email").addClass("is-invalid");
          return false;
      }

      // Validar Celular
      var celular = $("#celular").val();
      if (celular.trim() == "") {
          $("#celular").addClass("is-invalid");
          return false;
      }

      // Validar Monto
      var monto = $("#monto").val();
      if (monto.trim() == "" || isNaN(monto)) {
          $("#monto").addClass("is-invalid");
          return false;
      }

      // Validar Descripción
      var descriptionField = $("#description");

      // Verifica si el campo de descripción existe y si su valor está en blanco
      if (descriptionField.length && descriptionField.val().trim() === "") {
          descriptionField.addClass("is-invalid");
          return false;
      }
      

      // Validar Solicitud
      var solicitudField = $("#solicitud");

      // Verifica si el campo de solicitud existe y si su valor está en blanco
      if (solicitudField.length && solicitudField.val().trim() === "") {
          solicitudField.addClass("is-invalid");
          return false;
      }
      

      // Validar Detalle
      var detalleField = $("#detalle");

// Verifica si el campo de detalle existe y si su valor está en blanco
if (detalleField.length && detalleField.val().trim() === "") {
    detalleField.addClass("is-invalid");
    return false;
}


      // Si la validación pasa, el formulario se enviará
      return true;
  });

  // Función para validar el formato del correo electrónico
  function isValidEmail(email) {
    // Verifica si el campo de correo existe antes de intentar acceder a su valor
    var emailField = $("#email");
    if (emailField.length === 0) {
        // Si el campo no existe, retorna false
        return false;
    }

    // Accede al valor del campo de correo
    var emailValue = emailField.val();

    // Verifica el formato del correo
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(emailValue);
}
});
