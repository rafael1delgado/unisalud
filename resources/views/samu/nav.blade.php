<h4 class="d-none d-print-block">SAMU</h4>

<ul class="nav nav-tabs mb-3 d-print-none">
    <li class="nav-item" >
        <a class="nav-link {{ active('samu.welcome') }}"
        href=" {{ route('samu.welcome') }}"><i class="fas fa-home"></i> Home</a>
    </li>

    @canany(['SAMU administrador','SAMU regulador','SAMU despachador'])
    <li class="nav-item">
        <a class="nav-link {{ active(['samu.shift.*']) }}"
        href=" {{ route('samu.shift.index') }}"> <i class="fas fa-blender-phone"></i> Turnos</a>
    </li>
    @endcan
    
    @canany(['SAMU administrador','SAMU regulador','SAMU despachador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.mobileinservice.*') }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.mobileinservice.index') }}"><i class="fas fa-ambulance"></i> Moviles en servicio</a>
    </li>
    @endcan
    
    @canany(['SAMU administrador','SAMU regulador','SAMU operador','SAMU despachador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.noveltie.*') }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.noveltie.index') }}"><i class="fas fa-book"></i> Novedades</a>
    </li>
    @endcan
    
    @canany(['SAMU administrador','SAMU operador','SAMU regulador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.call.create') }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.call.create') }}"><i class="fas fa-headset"></i> Llamadas</a>
    </li>
    @endcan
    
    @canany(['SAMU administrador','SAMU regulador'])
    <li class="nav-item">
        <a class="nav-link {{ active(['samu.call.index','samu.call.edit']) }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.call.index') }}"><i class="fas fa-clipboard-check"></i> Regulación</a>
    </li>
    @endcan
    
    @canany(['SAMU administrador','SAMU regulador','SAMU operador','SAMU despachador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.call.ots') }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.call.ots') }}"><i class="fas fa-phone"></i> OT</a>
    </li>
    @endcan
    
    @canany(['SAMU administrador','SAMU despachador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.event.index') }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.event.index') }}"><i class="fas fa-car-crash"></i> Despacho</a>
    </li>
    @endcan
    
    @canany(['SAMU administrador','SAMU despachador','SAMU regulador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.event.filter') }}" 
        href=" {{ route('samu.event.filter') }}"><i class="fas fa-search"></i></a>
    </li>
    @endcan

    @can('SAMU administrador')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ active(['samu.key.*','samu.mobile.*']) }}" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
            <i class="fas fa-cog"></i> Configuración</a>
        <div class="dropdown-menu">

            <a class="dropdown-item {{ active('samu.key.*') }}"
            href=" {{ route('samu.key.index') }}"><i class="fas fa-user-injured"></i> Codificación de las claves</a>

            <a class="dropdown-item {{ active('samu.mobile.*') }}"
            href=" {{ route('samu.mobile.index') }}"><i class="fas fa-ambulance"></i> Móviles</a>

            <a class="dropdown-item {{ active('samu.establishment.*') }}"
            href=" {{ route('samu.establishment.index') }}"><i class="fas fa-building"></i> Establecimientos</a>

            <a class="dropdown-item {{ active('user.*') }}"
            href=" {{ route('user.index') }}"><i class="fas fa-user"></i> Usuarios</a>
        </div>
    </li>
    @endcan
    
</ul>