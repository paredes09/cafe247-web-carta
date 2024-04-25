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

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/formulario.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 mt-2">Lista de Ofertas</h1>
      

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Dias</th>
                                            <th>Activo</th>
                                            <th>Acciones</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Dias</th>
                                            <th>Activo</th>
                                            <th>Acciones</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while ($row = $resultOfertasDias->fetch_assoc()) {
                                                echo '<tr class="producto-row">';
                                               
                                                echo '<td>' . $row['o_titulo'] . '</td>';
                                                echo '<td>' . $row['o_precio'] . '</td>';
                                                echo '<td class="text-start">' . $row['dias'] . '</td>';
                                                echo '<td>' . ($row['o_estado'] == 1 ? 'Si' : 'No') . '</td>';
                                                echo '<td>';
                                                echo '<button type="button" class="btn btn-warning editar-oferta" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" 
                                                        data-id="' . $row['o_id'] . '"
                                                        data-oferta="' . $row['o_titulo'] . '" 
                                                        data-precio="' . $row['o_precio'] . '"
                                                        data-desc="' . $row['o_desc'] . '" 
                                                        data-condicion="' . $row['o_condiciones'] . '"
                                                        data-imagen="' . $row['o_img'] . '"
                                                        data-dias="' . $row['id_dias'] . '"
                                                        data-estado="' . $row['o_estado'] . '">Editar</button>'; 
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                        ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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


    <!-- Modal actualizar oferta -->

    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Actualizar Oferta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action = "update/oferta_update.php" id="miFormulario5" method="post" role="form5" id="form5" onsubmit="enviarFormulario(event, 'miFormulario5','update/oferta_update.php');" novalidate>
                        <div class ="row g-1">
                            <input type="hidden" name="id_oferta" id="oferta_id" value="">
                            <div class = "col-md-8">
                                <div class= "row g-1">
                                    <div class="col-md-8 form-floating">
                                        <label for="Oferta2">Nombre de la oferta</label>   
                                        <input class="form-control" type="text" name="oferta_actualizado" id="Oferta2" placeholder>      
                                    </div>
                                    <div class="col-md-2 form-floating">
                                        <label for="Precio2">Precio</label>
                                        <input class="form-control" type="text" name="o_precio_actualizado" id="Precio2" placeholder>
                                    </div>
                                    <div class="col-md-2 form-floating">
                                        <label for="estado2">Activo</label>
                                        <select class="form-control" name="estado_actualizado" id="estado2" aria-label>
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-1 mt-2">
                                    <div class="col-md-6 form-floating">
                                        <label for="descripcion2">Descripcion</label>
                                        <textarea class="form-control" type="text" name="descripcion_actualizado" id="descripcion2" placeholder></textarea>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <label for="condicion2">Condiciones</label>
                                        <textarea class="form-control" name="condiciones_actualizado" id="condicion2" placeholder></textarea>
                                    </div>
                                </div>
                                <div class ="row g-1 mt-2">
                                    <div class="col-md-3 form-floating">
                                        <label for="Descripcion">Días disponibles</label>
                                    </div>
                                    <div class="col-md-9 container-fluid">
                                        <div class="form-floating">
                                            <?php
                                                $diasOptions2 = []; // Array para almacenar las opciones únicas
                                                while ($row = $resultDias2->fetch_assoc()) {
                                                    $diasOptions2[$row['d_id']] = $row['d_nombre'];
                                                }
                                                foreach ($diasOptions2 as $d_id2 => $d_nombre2) {
                                                    echo '<div class="form-check form-check-inline">';
                                                    echo '<input class="form-check-input" type="checkbox" value="' . $d_id2 . '" id="check_1' . $d_id2 . '" name="dias2[]">';
                                                    echo '<label class="form-check-label" for="check_1' . $d_id2 . '">' . $d_nombre2 . '</label>';
                                                    echo '</div>';
                                                }
                                            ?>      
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            <div class = "col-md-4">
                                <div class= "row g-1">
                                    <div class = "col-md-12">
                                        <div class="rounded" id="contenedor-imagen">
                                            <img name="imagen" width="350" height="250" id="img" alt="Imagen seleccionada" onclick="document.getElementById('seleccionar-archivo').click()">
                                        </div>
                                        <input name="imagen2" type="file" id="seleccionar-archivo" style="display: none;">
                                    </div>
                                </div>
                            </div>      
                        </div>
                        <div class="col-md-12 text-center">
                        <div class="sent-message" id="mensaje-errore" style="display: none;"></div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="sent-message" id="mensaje-error" style="display: none;"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
                        </div>     
                        <div class= "loading" id="carga" style="display: none;"></div>
                        <div class="sent-message" id="mensaje-exito" style="display: none;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- check Modal-->
    <div class="modal fade mymodal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down px-5">
            <div class="modal-content">
                <div class="modal-body" id="modal-content"></div>
                <div id="check">&#10004;</div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <script src="js/validator.js"></script> 
    <script src="js/script.js"></script>  
    <script src="../../assets/vendor/carga_datos/carga-datos.js"></script> 
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>                                        
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>