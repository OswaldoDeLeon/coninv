<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas  fa-solid fa-binoculars"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Oswaldo De León</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">


<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="home.php">
        <i class="fas fa-gauge-high"></i>
        <span>Home</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Gestión de productos
</div>

<!-- Nav Item - Gestion de inventario -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu1"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-store"></i>
        <span>Gestión de inventario</span>
    </a>
    <div id="menu1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Inventario</h6>
            <a class="collapse-item" href="nuevo_producto.php"><i class="bi bi-box-seam-fill"></i> +Nuevo Producto</a>
            <a class="collapse-item" href="mostrar_producto.php"><i class="bi bi-dropbox"></i><i class="bi bi-eyeglasses"></i> Mostrar Productos</a>
            <a class="collapse-item" href="editar_producto.php"><i class="bi bi-dropbox"></i>+-Editar Productos</a>
            <a class="collapse-item" href="eliminar_producto.php"><i class="bi bi-calendar-x-fill"></i> Eliminar Productos</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu2"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-solid fa-user-tag"></i>
        <span>Categoría y Proveedores</span>
    </a>
    <div id="menu2" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestión de inventario</h6>
            <a class="collapse-item" href="control_categoria_invent.php"><i class="bi bi-tags-fill"></i> Control de Categorías</a>
            <a class="collapse-item" href="control_proveedores.php"><i class="bi bi-person-vcard-fill"></i> Control de Proveedores</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Movimientos inventario
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu3"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-up-down-left-right"></i>
        <span>Movimientos</span>
    </a>
    <div id="menu3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestiones de movimientos</h6>
            <a class="collapse-item" href="nuevo_movimiento.php"><i class="fa-solid fa-dolly"></i> + Entrada y - Salidas</a>
            <a class="collapse-item" href="mostrar_movimientos.php"><i class="fa-solid fa-recycle"></i> Consulta de movimientos</a>                                        
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#menu4">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Reportes</span>
    </a>
    <div id="menu4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestiones de movimientos</h6>
            <a class="collapse-item" href="generador_pdf.php"><i class="fa-solid fa-clipboard-list"></i> Reporte de Inventarios</a>
            <a class="collapse-item" href="reporte_proveedores.php"><i class="fa-solid fa-people-arrows"></i> Reporte de Proveedores</a>                                        
        </div>
    </div>
</li>



<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="control_usuarios.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Control de usuarios</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->