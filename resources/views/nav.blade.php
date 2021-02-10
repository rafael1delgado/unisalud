<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
    <span>Mi información</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <span data-feather="plus-circle"></span>
    </a>
</h6>
<ul class="nav flex-column">   
    <li class="nav-item">
        <a class="nav-link {{ active('profile.observation.index') }}" href="{{ route('profile.observation.index') }}">
        <span data-feather="user"></span>
        Mis exámenes<span class="sr-only"></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ active('profile.show') }}" href="{{ route('profile.show') }}">
        <span data-feather="user"></span>
        Mi perfíl<span class="sr-only"></span>
        </a>
    </li>
</ul>

@can('Developer')
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
@endcan

@can('Administrator')
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
    <span>Administrador</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <span data-feather="plus-circle"></span>
    </a>
</h6>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ active('parameter.permission.index') }}" href="{{ route('parameter.permission.index') }}">
        <span data-feather="lock"></span>
        Permisos<span class="sr-only">(current)</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ active('user.edit') }}" href="{{ route('user.edit',auth()->id()) }}">
        <span data-feather="unlock"></span>
        Mis permisos
        </a>
    </li>
</ul>
@endcan

<ul class="nav flex-column">   
    <li class="nav-item border-top">
        <a class="nav-link" href="{{ route('claveunica.logout') }}">
        <span data-feather="log-out"></span>
        Cerrar sesión
        </a>
    </li>
</ul>