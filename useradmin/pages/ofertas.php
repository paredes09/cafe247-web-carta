<?php
require_once '../../forms/config.php';
include '../../forms/consultas.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../assets/img/logo.png" rel="icon">
    <link href="../../assets/img/logo.png" rel="apple-touch-icon">
    <title>CAFE247 - ADMIN</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/formulario.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CAFE <sup>247</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

     

            <!-- Heading -->
            <div class="sidebar-heading">
              INSERCION
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="productos.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Productos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categorias.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Categorias</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ofertas.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Ofertas</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                ACTUALIZACION
            </div>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="detallesproductos.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Productos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="detallescategorias.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Categorias</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="detallesofertas.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Ofertas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Registrar oferta</h1>

                </div>
                <!-- /.section registrar productos -->
                <section>
                    <div class = "container-fluid mx-auto my-1">
                        <div class = "row justify-content-center">
                            <div class = "col-lg-12"> 
                                <div class = "card border-0 shadow">
                                    <div class = "card-body">
                                        <form action="insert/oferta_insert.php" id="miFormulario1" role="form3" id="form3" method="post" enctype="multipart/form-data" onsubmit="enviarFormulario(event, 'miFormulario1','insert/oferta_insert.php');" novalidate>
                                            <div class= "row g-1">
                                                <div class="col-md-8 form-floating">
                                                    <label for="Oferta">Nombre de la oferta</label>
                                                    <input class="form-control" type="text" name="oferta" id="Oferta" placeholder>   
                                                </div>
                                                <div class="col-md-2 form-floating">
                                                    <label for="Precio">Precio</label>
                                                    <input class="form-control" type="text" name="o_precio" id="Precio" placeholder>
                                                </div>
                                                <div class="col-md-2 form-floating">
                                                    <label for="estado">Activo</label>
                                                    <select class="form-control" name="estado" id="estado" aria-label>
                                                        <option value="1">Si</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            
                                                <div class="col-md-6 mt-2">
                                                    <label for="floatingInput">Descripcion</label>
                                                    <textarea class="form-control" type="text" name="descripcion" id="floatingInput" placeholder></textarea>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="Descripcion">Condiciones</label>
                                                    <textarea class="form-control" name="condiciones" id="Descripcion" placeholder></textarea>
                                                </div>
                                                <div class="row px-3 mt-2">
                                                    <div class="col-md-6 text-lg-start mt-2">
                                                    <div class="row">
                                                        <div class="col-md-3 form-floating">
                                                            <label for="Descripcion">Días disponibles</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-floating">
                                                                <?php
                                                                    $diasOptions = []; // Array para almacenar las opciones únicas
                                                                    while ($row = $resultDias->fetch_assoc()) {
                                                                        $diasOptions[$row['d_id']] = $row['d_nombre'];
                                                                    }
                                                                    foreach ($diasOptions as $d_id => $d_nombre) {
                                                                        echo '<div class="form-check form-check-inline">';
                                                                        echo '<input class="form-check-input" type="checkbox" value="' . $d_id . '" id="check_' . $d_id . '" name="dias[]">';
                                                                        echo '<label class="form-check-label" for="check_' . $d_id . '">' . $d_nombre . '</label>';
                                                                        echo '</div>';
                                                                    }
                                                                ?>    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-floating col-md-6 mt-3">
                                                    <input class="form-group" type="file" name="imagen" id="Imagen" placeholder>
                                                </div>
                                                
                                                <div class="col-md-12 text-center mt-2">
                                                    <button class="btn btn-primary" type="submit" name="submit">Guardar</button>
                                                </div>
                                                
                                                <div class="col-md-12 text-center">
                                                    <div class="sent-message" id="mensaje-error" style="display: none;"></div>
                                                </div>

                                                <div class= "loading" id="carga" style="display: none;"></div>
                                                <div class="sent-message" id="mensaje-exito" style="display: none;"></div>
                                            </div>   
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </section>
            </div>         
            <!-- End of Main Content -->
            
            <!-- Modal -->
            <div class="modal fade mymodal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down px-5">
                    <div class="modal-content">
                        <div class="modal-body" id="modal-content"></div>
                        <div id="check">&#10004;</div>
                    </div>
                </div>
            </div>  
            <!-- End of Modal -->
            
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CAFE247 - Desarrollado por <a href="">aroldoparedespineiros@gmail.com</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


<!-- Bootstrap core JavaScript -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Core plugin JavaScript-->
<script src="js/validator.js"></script> 
<script src="js/script.js"></script>  
<script src="../../assets/vendor/carga_datos/carga-datos.js"></script> 
<script src="../js/sb-admin-2.min.js"></script>




</body>

</html>