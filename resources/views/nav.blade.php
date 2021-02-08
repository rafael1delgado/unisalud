<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
    <span>Pacientes</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <span data-feather="plus-circle"></span>
    </a>
</h6>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ active('patient.index') }}" href="{{ route('patient.index') }}">
        <span data-feather="users"></span>
        Ver todos<span class="sr-only">(current)</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ active('patient.create') }}" href="{{ route('patient.create') }}">
        <span data-feather="plus-circle"></span>
        Ingresar nuevo
        </a>
    </li>

</ul>
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
    <span>Preferencias</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <span data-feather="plus-circle"></span>
    </a>
</h6>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ active('profile.show') }}" href="{{ route('profile.show') }}">
        <span data-feather="user"></span>
        Mi perfíl<span class="sr-only"></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('patient.create') }}">
        <span data-feather="log-out"></span>
        Cerrar sesión
        </a>
    </li>
    <li class="nav-item d-block d-md-none">
        <a class="nav-link" href="/">
        <span data-feather="home"></span>
        Volver al inicio<span class="sr-only"></span>
        </a>
    </li>

</ul>
<!--
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
    <span>Documentos</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <span data-feather="plus-circle"></span>
    </a>
</h6>
<ul class="nav flex-column mb-2">
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Generador
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Partes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Acreditación de Calidad
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Planes Comunales
        </a>
    </li>
</ul>
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
    <span>Recursos Humanos</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <span data-feather="plus-circle"></span>
    </a>
</h6>
<ul class="nav flex-column mb-2">
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="users"></span>
        Usuarios
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="airplay"></span>
        Unidades Organizacionales
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="award"></span>
        Autoridades
        </a>
    </li>
</ul>
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
    <span>Recursos</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <span data-feather="plus-circle"></span>
    </a>
</h6>
<ul class="nav flex-column mb-2">
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="monitor"></span>
        Computadores
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="printer"></span>
        Impresoras
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="phone"></span>
        Teléfonos Fijos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="smartphone"></span>
        Teléfonos Móviles
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
        <span data-feather="wifi"></span>
        Banda Ancha Móvil
        </a>
    </li>
</ul>
-->
