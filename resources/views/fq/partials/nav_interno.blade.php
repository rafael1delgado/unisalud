<ul class="nav nav-tabs mb-3 d-print-none">

    @can('Fq: Answer request')
        <li class="nav-item">
            <a class="nav-link"
                href="{{ route('fq.request.index') }}">
                <i class="fas fa-inbox"></i> Todas las Solicitudes
            </a>
        </li>
    @endcan

    @can('Fq: admin')
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-hospital-user"></i>  Pacientes
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('fq.contact_user.create') }}"><i class="fas fa-plus"></i> Crear contacto</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-id-badge"></i> Asociar Paciente</a></li>
            </ul>
        </li>
    @endcan

    @if(App\Models\Fq\ContactUser::getAmIContact() > 0)
        <li class="nav-item">
            <a class="nav-link"
                href="{{ route('fq.request.own_index') }}">
                <i class="fas fa-inbox"></i> Mis Solicitudes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"
                href="{{ route('fq.request.create') }}">
                <i class="fas fa-plus"></i> Nueva Solicitud
            </a>
        </li>
    @endif
</ul>
