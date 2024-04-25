<?php
require_once 'forms/config.php';
include 'forms/consultas.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CAFE247</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="user-admin/formulario.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Delicious
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<!-- Modal -->
<div class="modal fade mymodal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down px-5">
            <div class="modal-content">
                <div class="modal-body" id="modal-content"></div>
                <!-- Elemento para el check -->
                <div id="check">&#10004;</div>
            </div>
        </div>
</div>
<!-- Fin del Modal -->

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+51 912 034 201</span></i>
      <i class="bi bi-clock ms-4 d-flex align-items-center"><span>Ln - Dom: 10:00 AM - 22:00 PM</span></i>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto column">
        
        <h1 class="logo me-auto me-lg-0"><a href="index.php" class="logo"><img src="assets/img/logo.png" width="50"   alt= "ing invalid" class="img-fluid"></a>
        <a href="index.php">CaFe247</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inico</a></li>
          <li><a class="nav-link scrollto" href="#about">Conocenos</a></li>
          <li><a class="nav-link scrollto" href="#menu">Carta</a></li>
          <!-- <li><a class="nav-link scrollto" href="#specials">Especialidad</a></li> -->
          <li><a class="nav-link scrollto" href="#events">Ofertas</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Fotos</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contactanos</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#book-a-table" class="book-a-table-btn scrollto">Reserva con Nosotros</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>CaFe</span> 247</h2>
                
                <p class="animate__animated animate__fadeInUp">Disfruta de la mejor experiencia del cafe con nostros. Bienvenido</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Carta</a>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Reserva con Nosotros</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <p class="animate__animated animate__fadeInUp">Experiencia de primer nivel solo con Cafe247, vive, Conocenos y experimenta cosas nuevas</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Carta</a>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Reserva con Nosotros</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">El combustible de los soñadores</h2>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Carta</a>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Reserva con Nosotros</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/oferta-tottus.jpg");'>
            
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Carta Seccion ======= -->
    <section id="menu" class="menu">
    <div class="container">
        <div class="section-title">
            <h2>Consulta nuestra variada Carta</h2>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="menu-flters">
                    <li data-filter="*" class="filter-active">Todo</li>
                    <?php
                    // Itera sobre los resultados de la consulta y genera las etiquetas <li>
                    while ($row = $result->fetch_assoc()) {
                        $categoria = $row['c_nombre'];
                        $estado = $row['c_estado'];
                        if ($estado == 1){
                          echo '<li data-filter=".' . strtolower(str_replace(' ', '-', $categoria)) . '">' . $categoria . '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    <div class="row menu-container">

    <?php
    $currentCategoria = null;

    // Almacena los productos directamente asociados a categorías
    $productosCategoria = array();

    // Recorre los productos
    while ($rowProducto = $resultProductos->fetch_assoc()) {
        $categoriaProducto = $rowProducto['c_nombre'];
        $subCategoriaProducto = $rowProducto['sc_nombre'];
        $estadocate = $rowProducto['c_estado'];
        $estadoProducto = $rowProducto['estado'];
        
        // Verifica si el producto no tiene subcategoría
        if (empty($subCategoriaProducto) && $estadocate == 1 && $estadoProducto == 1) {
            $productosCategoria[$categoriaProducto][] = $rowProducto;
        }
        
    }

    // Recorre las subcategorías y productos
   
    while ($rowSub = $resultSub->fetch_assoc()) {
      $subCategoria = $rowSub['sc_nombre'];
      $categoria = $rowSub['c_nombre'];
      $estadosubcategoria = $rowSub['sc_estado'];
      $estadoCate = $rowSub['c_estado'];
     
      // Almacena los productos de la subcategoría actual
      $productosSubcategoria = array();

      // Recorre los productos
      $resultProductos->data_seek(0); // Reinicia el puntero de productos
      while ($rowProducto = $resultProductos->fetch_assoc()) {
          $categoriaProducto = $rowProducto['c_nombre'];
          $subCategoriaProducto = $rowProducto['sc_nombre'];
          $estadoProducto = $rowProducto['estado'];
          // Verifica si el producto pertenece a la subcategoría actual
          if ($categoriaProducto == $categoria && $subCategoriaProducto == $subCategoria && $estadoProducto == 1 && $estadoCate == 1) {
              $productosSubcategoria[] = $rowProducto;
          }
      }

      // Imprime la subcategoría o la categoría solo si hay productos asociados
        
          if (!empty($productosSubcategoria) && $estadosubcategoria == 1) {

              echo '<div class="col-lg-12 mt-5 menu-item ' . strtolower(str_replace(' ', '-', $categoria)) . ' filter-' . strtolower(str_replace(' ', '-', $categoria)) . '">';
              echo '<h5>' . ($subCategoria ? $subCategoria : $categoria) . '</h5>';
              echo '</div>';

            // Imprime los productos de la subcategoría actual
            foreach ($productosSubcategoria as $producto) {
              
                echo '<div class="col-lg-4 menu-item product-item ' . strtolower(str_replace(' ', '-', $producto['c_nombre'])) . ' filter-' . strtolower(str_replace(' ', '-', $producto['sc_nombre'] ?: $producto['c_nombre'])) . '">';
                echo '<div class="menu-content">';
                echo '<a>' . $producto['p_nombre'] . '</a><span>S/.' . $producto['p_precio'] . '</span>';
                echo '</div>';
                echo '<div class="menu-ingredients">' . $producto['p_descripcion'] . '</div>';
                echo '</div>';
            }
        
        }
        
        

  }
   

// Verifica si se ha aplicado algún filtro
      $filterApplied = isset($_GET['filter']) && $_GET['filter'] != '*';
     
      // Imprime los productos directamente asociados a categorías

          foreach ($productosCategoria as $categoria => $productos) {
            // Verifica si se ha aplicado un filtro y si la categoría actual está presente en los filtros seleccionados
            if (!$filterApplied || !in_array(strtolower(str_replace(' ', '-', $categoria)), explode(',', $_GET['filter']))) {
                echo '<div class="col-lg-12 mt-5 menu-item">';
                echo '<h5>' . $categoria . '</h5>';
                echo '</div>';
            }
  
            // Imprime los productos de la categoría actual
            foreach ($productos as $producto) {
                echo '<div class="col-lg-4 menu-item product-item ' . strtolower(str_replace(' ', '-', $producto['c_nombre'])) . ' filter-' . strtolower(str_replace(' ', '-', $producto['c_nombre'])) . '">';
                echo '<div class="menu-content">';
                echo '<a>' . $producto['p_nombre'] . '</a><span>S/.' . $producto['p_precio'] . '</span>';
                echo '</div>';
                echo '<div class="menu-ingredients">' . $producto['p_descripcion'] . '</div>';
                echo '</div>';
            }   
    }
  
    

    ?>
</div>      
    </div>

</section><!-- Fin del Menú -->

    <!-- Fin del Menú -->

    <!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
<!--     <section id="specials" class="specials">
      <div class="container">

        <div class="section-title">
          <h2>Nuestras <span>Specialidades</span></h2>
          <p>
            Para que podamos obtener el placer y el placer de la vida en todos los sentidos, nos conviene poder hacerlo en un momento dado.</p>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Modi sit est</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Unde praesentium sed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Pariatur explicabo vel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Architecto ut aperiam autem id</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Et blanditiis nemo veritatis excepturi</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                    <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                    <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                    <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-4.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section> -->
    <!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
    <div class="container">
        <div class="section-title">
            <h2>Ofertas del <span>Día</span></h2>
        </div>
        <!-- oferta de prueba-->
        <div class="events-slider swiper">
            <div class="swiper-wrapper">
            <?php
                // Obtener el nombre del día actual en español
                $diasEnEspanol = array('Monday' => 'LUNES', 'Tuesday' => 'MARTES', 'Wednesday' => 'MIERCOLES', 'Thursday' => 'JUEVES', 'Friday' => 'VIERNES', 'Saturday' => 'SABADO', 'Sunday' => 'DOMINGO');
                $nombreDia = date('l');
                $nombreDiaEspanol = strtoupper($diasEnEspanol[$nombreDia]);
                // Iterar sobre los resultados y mostrar cada oferta
                while ($row = $resultOfertas->fetch_assoc()) {
                    $estado = $row['o_estado'];
                    $dia = strtoupper($row['d_nombre']);
                    if ($dia == $nombreDiaEspanol) {
                      if($estado == 1){
                        echo '<div class="swiper-slide">';
                        echo '<div class="row event-item">';
                        echo '<div class="col-lg-6">';
                        echo '<img src="' . $row['o_img'] . '" class="img-fluid" alt="">';
                        echo '</div>';
                        echo '<div class="col-lg-6 pt-4 pt-lg-0 content">';
                        echo '<h3>' . $row['o_titulo'] . '</h3>';
                        echo '<div class="price">';
                        echo '<p><span>S/. ' . $row['o_precio'] . '</span></p>';
                        echo '</div>';
                        echo '<p class="fst-italic">' . $row['o_desc'] . '</p>';
                        echo '<ul>';
                        echo '</ul>';
                        echo '<p>' . $row['o_condiciones'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                  } 
                }
                ?>   
            </div>
            <div class="swiper-pagination">
            </div>
        </div>
    </div>
</section>

    <!-- End Events Section --> 

    <!-- ======= reservar mesa Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container">

        <div class="section-title">
          <h2>Reservar una <span>Mesa</span></h2>
          <p>Completa los datos del formulario para reservar con nosotros.</p>
        </div>

        <form action="forms/reserva_insert.php" id="miFormulario" method="POST" role="form" class="php-email-form mt-auto" onsubmit="enviarFormulario(event, 'miFormulario','forms/reserva_insert.php');">
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nombre y Apellido" data-rule="minlen:4" data-msg="Please enter at least 4 chars" autocomplete="name" required>
              
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Correo " data-rule="email" data-msg="Please enter a valid email" autocomplete="email" required>
              
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="telf" class="form-control" name="phone" id="phone" placeholder="Nº Celular" data-rule="minlen:4" data-msg="Please enter at least 4 chars" autocomplete="tel" required>
              
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="date" name="date" class="form-control" id="date" placeholder="Fecha" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="time" class="form-control" name="time" id="time" placeholder="Hora" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
            
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="people" id="people" placeholder="# de personas" data-rule="minlen:1" data-msg="Please enter at least 1 chars" required>
             
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="mensaje" rows="5" placeholder="Detalles de la reserva" required></textarea>
          </div>
          
   
          <div class="sent-message" id="mensaje-exito" style="display: none;">
          </div>
          <div class="text-center m-1">
          <p class= "loading" id="carga" style="display: none;" >Enviando</p>  
          <button type="submit">Realizar Reserva</button></div>
        </form>

      </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Algunas fotos de <span>nuestra CaFeteria</span></h2>
          <p>Nuestra experiencia empalmada en cada una de nuestras postales</p>
        </div>

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><span>Contacta con</span> Nosotros</h2>
          <p>Contactanos en nuestros diferentes canales</p>
        </div>
      </div>

      <div class="map">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.2040734258653!2d-73.26721229999997!3d-3.76571889999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ea112428d4d2c3%3A0x44fed3d5883e5dbc!2sMall%20Aventura%20Iquitos!5e0!3m2!1ses-419!2spe!4v1701104404679!5m2!1ses-419!2spe" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container mt-5">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-3 col-md-6 info">
              <i class="bi bi-geo-alt"></i>
              <h4>Direccion:</h4>
              <p>Av. Capitan Jose Abelardo Quiñones 1050<br>Iquitos 16006, Perú</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-clock"></i>
              <h4>Horarios de apertura:</h4>
              <p>Lunes-Domingo:<br>10:00 AM - 22:00 PM</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>cafe247.iquitos@gmail.com</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-phone"></i>
              <h4>Celular:</h4>
              <p>+51 912 034 201</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>CaFe247</h3>
      <p>El combustible de los soñadores.</p>
      <div class="row justify-content-center">
        <div class="col-md-2">
          <div class="social-links">
            <a href="https://www.facebook.com/profile.php?id=61551997646302" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/cafe247iquitos/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
            <a href="https://api.whatsapp.com/send?phone=51912034201" class="whatsapp" target="_blank"><i class="bx bxl-whatsapp"></i></a>
          </div>
        </div>
        <div class="col-md-2  mb-3 mb-md-0">
          <a href="reclamo_page/libro.php">
            <img src="assets/img/logo_libro_reclam.jpg" alt="" class="img-fluid" width="120" height="75">
          </a>
        </div>
      </div>
    </div>

      <div class="copyright">
        &copy; Copyright <strong><span>Cafe247</span></strong>. Todos los Derechos Reservados
      </div>
      <div class="credits">
      Diseñado por <a href="mailto:aroldoparedespineiros@gmail.com">aroldoparedespineiros@gmail.com</a> - Sistemas y Soporte TI
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/carga_datos/carga-datos.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>