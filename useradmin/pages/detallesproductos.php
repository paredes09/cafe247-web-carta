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
                    <h1 class="h3 mb-2 text-gray-800 mt-2">Lista de Producto</h1>
      

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>categoria</th>
                                            <th>Subcategoria</th>
                                            <th>Activo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>categoria</th>
                                            <th>Subcategoria</th>
                                            <th>Activo</th>
                                            <th>Acciones</th>  
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while ($row = $resultProductos->fetch_assoc()) {
                                                echo '<tr class="producto-row">';
                                                echo '<td>' . $row['p_nombre'] . '</td>';
                                                echo '<td>' . $row['p_precio'] . '</td>';
                                                echo '<td>' . $row['c_nombre'] . '</td>';
                                                echo '<td>' . $row['sc_nombre'] . '</td>';
                                                echo '<td>' . ($row['estado'] == 1 ? 'Si' : 'No') . '</td>';
                                                echo '<td>';
                                                echo '<button type="button" class="btn btn-warning editar-producto" data-bs-toggle="modal" data-bs-target="#staticBackdrop" 
                                                        data-id="' . $row['p_id'] . '"
                                                        data-producto="' . $row['p_nombre'] . '" 
                                                        data-descripcion="' . $row['p_descripcion'] . '" 
                                                        data-precio="' . $row['p_precio'] . '" 
                                                        data-categoria="' . $row['c_nombre'] . '" 
                                                        data-subcategoria="' . $row['sc_nombre'] . '" 
                                                        data-estado="' . $row['estado'] . '">Editar</button>';
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

    <!--Modal Para actualizar-->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Actualizar Producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="tuModalId">
            <form action = "update/product-update.php" id="miFormulario4" method="post" role="form4" id="form4" onsubmit="enviarFormulario(event, 'miFormulario4','update/product-update.php');" novalidate>
                <input type="hidden" name="id_producto" id="id_producto" value="">
                <div class="form-floating">
                    <label for="floatingInput1">Nombre del producto</label>
                    <input class="form-control" type="text" name="producto_actualizado" id="floatingInput1" placeholder>
                    <!-- Mensaje de error para producto -->
                </div>
                <div class= "form-floating mt-2">
                    <label for="descripcion1">Descripción</label>
                    <input class="form-control" type="text" name="descripcion_actualizado" id="descripcion1" placeholder>
                    <!-- Mensaje de error para descripcion -->
                </div>
                <div class= "row g-1 mt-2">
                    <div class="col-md-2 form-floating">
                        <label for="Precio1">Precio</label>
                        <input class="form-control" name="precio_actualizado" id="Precio1" type="text" placeholder>
                    </div>
                    <div class="col-md-4 form-floating">
                        <label for="categoria1">Categoria</label>
                        <select class="form-control" name="categoria_actualizado" id="categoria1" aria-label>
                            <?php
                                while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['c_id'] . '">' . $row['c_nombre'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-floating">
                        <label for="subcategoria1">SubCategoria</label>
                        <select class="form-control" name="subcategoria_actualizado" id="subcategoria1" aria-label>
                        </select>
                    </div>
                    <div class="col-md-2 form-floating">
                        <label for="estado1">Activo</label>
                        <select class="form-control" name="estado_actualizado" id="estado1" aria-label>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-12 text-center">
                    <div class="sent-message" id="mensaje-error" style="display: none;"></div>
                </div>
                                                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="limpiarYCerrarModal()">Cerrar</button>
                    <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <div class= "loading" id="carga" style="display: none;"></div>
                <div class="sent-message" id="mensaje-exito" style="display: none;"></div>
            </form>
        </div>
    </div>
</div>

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