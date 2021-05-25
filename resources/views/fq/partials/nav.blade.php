<ul class="nav nav-tabs mb-3 d-print-none">

    {{--@role('Replacement Staff: admin')--}}
    <!-- <li class="nav-item">
        <a class="nav-link"
                      href="{{ route('fq.request.index') }}">
            <i class="fas fa-inbox"></i> Lista de Solicitudes
        </a>
    </li> -->
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
    {{--@endrole--}}

</ul>
