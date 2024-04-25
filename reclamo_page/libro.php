<?php
require_once "forms/config.php";
$query = "SELECT c_id FROM consumidor ORDER BY c_id DESC LIMIT 1";
$result = $con->query($query);
if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $ultimoID = $row['c_id'];
  $correlativo = "CAFE247-WEB-001-" . sprintf("%03d", $ultimoID + 1);
} else {
  $correlativo = "CAFE247-WEB-001-001";
}
?>

<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Libro de Reclamaciones | CAFE247</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo.png" rel="icon">
  <link href="../assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <div id="row" class="column">
        <h1 class="logo me-auto me-lg-0"><a href="libro.php" class="logo"><img src="../assets/img/logo.png" alt= "1" class="img-fluid"></a>
          <a href="libro.php">CAFE247</a></h1>
      </div>

    </div>

  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-u">

        <div class="section-title">
          <h1>Libro de Reclamaciones</h1>
          <h2>HOJA DE RECLAMACIÓN <?php print($correlativo) ?></h2>
          <p>Conforme a lo establecido en el código de la Protección y Defensa del consumidor este establecimiento
           cuenta con un Libro de Reclamaciones a tu disposición. Registra la queja o reclamo aqui.</p>
          <br>
           <div class="container">
            <style>

              .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff
              }.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}
              .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not
              .elementor-drop-cap-view-default.elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default)
              elementor-widget-text-editor.elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor 
              .elementor-drop-cap-letter{display:inline-block}</style>				
              <p><strong>RUC:</strong> 20611314877<br><strong>Razón Social</strong>: INVERSIONES ALIV S.A.C <br><strong>Dirección:</strong><a 
              href="https://maps.app.goo.gl/5pT6ZY56mrYDUhpJ7" 
                target="_blank" rel="nofollow noopener"><span class="elementor-icon-list-text">  Av. José Abelardo Quiñonez N°1010, San Juan</span></a></p></div>   
                <hr class="my-md-1">
              </div>

        <div class="row mt-1 justify-content-center" data-aos="fade-up" style="display: flex;">
          <div class="col-lg-8 mt-5 mt-lg-0" style="flex: 1;">
            <p><b>1. Identificación del Consumidor Reclamante</b></p>
                    <form action="forms/reclamo_instert.php" id="miFormulario" method="post" role="form" class="php-email-form mt-auto" onsubmit=enviarFormulario(event)>
            <div class="row">
                <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombres*" autocomplete="name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email*" autocomplete="email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <input type="tel" name="celular" class="form-control" id="celular" placeholder="Celular*" autocomplete="tel" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="text" class="form-control" name="dni" id="dni" placeholder="Dni">
                </div>
            </div>
            <div class="row">
                <p><b>2. Identificación del Bien Contratado (Marca Uno)*</b></p>
                <div class="col-md-3 form-group">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="categoria" value="1" id="Producto" required>
                        <label class="form-check-label" for="Producto">
                            Producto
                        </label>
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="categoria" value="2" id="servicio" required>
                        <label class="form-check-label" for="servicio">
                            Servicio
                        </label>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <input type="number" class="form-control" name="monto" id="monto" placeholder="Monto reclamado" required>
                </div>
            </div>
            <div class="row">
            <p><b>3. Detalle de Reclamación y Pedido del Consumidor *</b></p>
            <div class="col-md-3 form-group">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="detal" value="1" id="Queja" required>
                    <label class="form-check-label" for="Queja">
                        Queja
                    </label>
                </div>
            </div>
            <div class="col-md-3 form-group">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="detal" value="2" id="Reclamo" required>
                    <label class="form-check-label" for="Reclamo">
                        Reclamo
                    </label>
                </div>
            </div>
            </div>     
            <div class="form-group">
                <textarea class="form-control" name="description" rows="1" placeholder="Descripción" required></textarea>
            </div>
            <div class="form-group mt-3">
                <textarea class="form-control" name="solicitud" rows="4" placeholder="Detalle y Pedido" required></textarea>
            </div>
            <p><b>4. Observaciones y acciones adoptadas por el proveedor</b></p>
            <div class="form-group">
                <textarea class="form-control" name="detalle" rows="4" placeholder="Detalle" required></textarea>
            </div>
              
              <div class="sent-message" id="mensaje-exito" style="display: none;">
                  <p>Tu mensaje fue enviado exitosamente.
                  </p>
              </div>
              <div class= "loading" id="carga" style="display: none;">
                  <p>Procesando su solicitud</p>
              </div>
              <div data-v-af55ba28="" class="reclamo-queja"><br data-v-af55ba28=""><h4 data-v-af55ba28="">RECLAMO: Disconformidad relacionada con los productos o servicios.</h4> <h4 data-v-af55ba28="">
                QUEJA : Disconformidad no relacionada a los productos o servicios; o, malestar o descontento respecto
                a la atención al público.
              </h4> <br data-v-af55ba28=""> <h4 data-v-af55ba28="">
                *La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito
                previo para interponer una denuncia ante el INDECOPI.
              </h4> <h4 data-v-af55ba28="">
                *El proveedor debe dar respuesta al reclamo o queja en un plazo no mayor a quince (15) días hábiles,
                el cual es improrrogable.
              </h4> <h4 data-v-af55ba28="" class="consumidor">CONSUMIDOR</h4></div>
            <div class="text-center mt-3"><button type="submit">Enviar</button></div>
        </form>


          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="header-social-links" >
        <a href="https://www.facebook.com/lacasadelasenchiladas.iquitos" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/lacasadelasenchiladas.iquitos/" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://api.whatsapp.com/send?phone=51912034201" class="whatsapp" target="_blank"><i class="bi bi-whatsapp"></i></i></a>
      </div>        
     <hr class="my-md-1">
      <div class="copyright">
        &copy; Copyright <strong><span>Cafe247</span></strong>. Todos los Derechos Reservados
      </div>
      <div class="credits">
        Diseñado por <a href="mailto:aroldoparedespineiros@gmail.com">aroldoparedespineiros@gmail.com</a> - Sistemas y Soporte TI
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/carga-datos/carga-datos.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>