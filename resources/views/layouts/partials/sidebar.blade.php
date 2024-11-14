<style>
    /* Personalización del Sidebar */
.bg-gradient-custom {
    background: linear-gradient(180deg, #1b3a57 10%, #4CAF50 100%);
    /* #1b3a57 es un azul marino oscuro, #4CAF50 es un verde */
}

.sidebar .nav-link {
    color: #ffffff;
    transition: all 0.3s ease-in-out;
}

.sidebar .nav-link:hover {
    background-color: #030c63;
    color: #fff;
}

.sidebar .nav-link.active {
    background-color: #0d0b5f; /* Un tono más oscuro de azul para el item activo */
    color: #fff;
}

/* Estilo del texto del Sidebar */
.sidebar-brand-text {
    color: #ffffff;
}

.sidebar-heading {
    color: #ffffff;
    font-weight: bold;
}

/* Estilo para los iconos */
.sidebar .nav-link i {
    color: #ffffff;
    transition: transform 0.3s ease;
}

.sidebar .nav-link:hover i {
    transform: rotate(10deg); /* Efecto para cuando el usuario pasa el mouse por encima */
}

    </style>


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-tshirt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sis <sup>Teñido</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - User CRUD -->
    <li class="nav-item {{ Request::routeIs('User.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-users"></i>
            <span>Crud</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Area Teñido Section -->
    <div class="sidebar-heading">
        Área Teñido
    </div>

    <li class="nav-item {{ Request::routeIs('Muestra.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('muestra.index') }}">
            <i class="fas fa-cloth"></i>
            <span>Tipos de Tela</span>
        </a>
    </li>

    <li class="nav-item {{ Request::routeIs('Marca.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('marca.index') }}">
            <i class="fas fa-tag"></i>
            <span>Marcas</span>
        </a>
    </li>

    <li class="nav-item {{ Request::routeIs('Aparato.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('aparato.index') }}">
            <i class="fas fa-cogs"></i>
            <span>Máquinas</span>
        </a>
    </li>

    <li class="nav-item {{ Request::routeIs('Menu.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('menu.index') }}">
            <i class="fas fa-file-alt"></i>
            <span>Pasos de Fabricación</span>
        </a>
    </li>

    <li class="nav-item {{ Request::routeIs('Encuesta.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('encuesta.index') }}">
            <i class="fas fa-poll"></i>
            <span>Encuestas</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Archivero Section -->
    <div class="sidebar-heading">
        Archivero
    </div>

    <li class="nav-item {{ Request::routeIs('Archivos.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('archivos.index') }}">
            <i class="fas fa-folder-open"></i>
            <span>Folders</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
