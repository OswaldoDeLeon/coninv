<?php
include("includes/head.php");
include('conexion.php');
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<!-- AQUI VA EL HEADER -->
<?php include("includes/head.php")?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

            <!-- AQUI VA EL SIDEBAR -->
             <?php include("includes/sidebar.php")?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- AQUI VA EL TOPBAR -->
                <?php include("includes/topbar.php")?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Principal</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Card 1 -->
                        <?php
                         $query = "SELECT SUM(cantidad+precio_unitario) AS total FROM inventario";
                         $result = $conn->query($query);

                         if($fila = $result->fetch_assoc()){
                        echo '
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total de Inventario - (Precio)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Precio</div>'.
                                            'Q. '.number_format($fila['total'], 2).
                                       '</div>
                                        <div class="col-auto">
                                            <i class="fas fa-sack-dollar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                        ?>
                    <!-- END CARD 1 -->

                    <!-- Card 2 -->
                    <?php
                         $query = "SELECT SUM(cantidad) AS total_productos FROM inventario";
                         $result = $conn->query($query);

                         if($fila = $result->fetch_assoc()){
                        echo '
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total de Unidades de Inventario</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Unidades</div>'
                                            .number_format($fila['total_productos'], 2).
                                       '</div>
                                        <div class="col-auto">
                                            <i class="bi bi-box-seam-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                        ?>
                    <!-- END CARD 2 -->

                    <!-- Card 3 -->
                    <?php
                         $query = "SELECT count(id_categoria) AS total_categorias FROM inventario";
                         $result = $conn->query($query);

                         if($fila = $result->fetch_assoc()){
                        echo '
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total de Categorias</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Categorias</div>'
                                            .number_format($fila['total_categorias'], 0).
                                       '</div>
                                        <div class="col-auto">
                                            <i class="bi bi-tags-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                        ?>
                    <!-- END CARD 3 -->

                    <!-- CARD 4 -->
                           <?php
                         $query = "SELECT count(id_proveedor) AS total_proveedores FROM proveedores";
                         $result = $conn->query($query);

                         if($fila = $result->fetch_assoc()){
                        echo '
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total de Proveedores</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Proveedores</div>'
                                            .number_format($fila['total_proveedores'], 0).
                                       '</div>
                                        <div class="col-auto">
                                            <i class="bi bi-person-vcard-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                        ?>
                        <!-- END card 4-->

                    <!-- CARD 5 -->
                    <?php
                         $query = "select c.nombre_categoria,i.cantidad*i.precio_unitario AS totalxcategoria
                                    from inventario AS i left join categorias as c on(i.id_categoria=c.id_categoria)
                                    where c.nombre_categoria='bebidas'
                                    group by c.nombre_categoria;";
                         $result = $conn->query($query);

                         if($fila = $result->fetch_assoc()){
                        echo '
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total de la Categorias de:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">BEBIDAS</div>'
                                            .'Q. '.number_format($fila['totalxcategoria'], 2).
                                       '</div>
                                        <div class="col-auto">
                                            <i class="bi bi-cup-straw fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                        ?>
                        <!-- END card 5 -->


                           <!-- CARD 6 -->
                    <?php
                         $query = "select c.nombre_categoria,i.cantidad*i.precio_unitario AS totalxcategoria
                                    from inventario AS i left join categorias as c on(i.id_categoria=c.id_categoria)
                                    where c.nombre_categoria='CARNES'
                                    group by c.nombre_categoria;";
                         $result = $conn->query($query);

                        if($fila = $result->fetch_assoc()){
                        echo '
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total de la Categorias de:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">CARNES</div>'
                                            .'Q. '.number_format($fila['totalxcategoria'], 2).
                                       '</div>
                                        <div class="col-auto">
                                            <i class="bi bi-tencent-qq fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                        ?>
                    <!-- END card 6 -->


                    <!-- CARD 7 EMBUTIDOS-->
                    <?php
                         $query = "select c.nombre_categoria,i.cantidad*i.precio_unitario AS totalxcategoria
                                    from inventario AS i left join categorias as c on(i.id_categoria=c.id_categoria)
                                    where c.nombre_categoria='EMBUTIDOS'
                                    group by c.nombre_categoria;";
                         $result = $conn->query($query);

                         if($fila = $result->fetch_assoc()){
                        echo '
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total de la Categorias de:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">EMBUTIDOS</div>'
                                            .'Q. '.number_format($fila['totalxcategoria'], 2).
                                       '</div>
                                        <div class="col-auto">
                                            <i class="bi bi-cup-straw fa-2x text-gray-300"></i>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                        ?>
                    <!-- END card 7 -->

                       <!-- CARD 8 - LIBRERIA-->
                       <?php
                         $query = "select c.nombre_categoria,i.cantidad*i.precio_unitario AS totalxcategoria
                                    from inventario AS i left join categorias as c on(i.id_categoria=c.id_categoria)
                                    where c.nombre_categoria='LIBRERIA'
                                    group by c.nombre_categoria;";
                         $result = $conn->query($query);

                         if($fila = $result->fetch_assoc()){
                        echo '
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total de la Categorias de:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">LIBRERIA</div>'
                                            .'Q. '.number_format($fila['totalxcategoria'], 2).
                                       '</div>
                                        <div class="col-auto">
                                            <i class="bi bi-cup-straw fa-2x text-gray-300"></i>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                        ?>
                    <!-- END card 7 -->

                    <!-- Content Row -->
<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->
                    <div class="row">
<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->                    <!-- GRAFICA 1 -->
            
                        <!-- GRAFICA 1 -->
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Resumen en Graficas</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id="graficoCol2">Gráfico</div>
                                </div>
                            </div>
                        </div>

<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->
                        
    <!-- GRAFICA 2 -->
                       <!-- Grafica de Pastel --> 
                       <script type="text/javascript">
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(dibujarGrafico);

                                function dibujarGrafico() {
                                        //solicitud AJAX  para obtener los datos de data.php 
                                    fetch('data.php')
                                    .then(response=> response.json())
                                    .then(data => {
                                                    //crear la tabla dataTable
                                        var dataTable = google.visualization.arrayToDataTable(data);

                                                    //Opciones del grafico 
                                        var options = {
                                        title: 'Cantidad de productos vendidos',
                                        width: 600,
                                        height: 400,
                                                    };
                                                    
                                                    //dibujar el grafico
                                var chart = new google.visualization.PieChart(document.getElementById('grafico'));
                                    chart.draw(dataTable, options);
                                        
                                    });   
                                }
                        </script>

                        <!-- Pie Chart -->
                        <div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Cantidad de Productos por Marca</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                                           
                                        <div id="grafico">Gráfico Ventas</div>
                          
                                 </div>
                            </div>
                        </div>
                        
<!-- --------------------------------------------------------------------------------------------------------------- -->

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Color System -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- AQUI VA EL FOOTER -->

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript" src="script_graficos/ColumnChart.js"></script>
            <?php include("includes/footer.php")?>