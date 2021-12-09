<ul class="nav nav-tabs mb-3" >
    <li class="nav-item" >
        <a class="nav-link {{ active('samu.welcome') }}"
        href=" {{ route('samu.welcome') }}"><i class="fas fa-home"></i> Home</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ active(['samu.shift.*']) }}"
        href=" {{ route('samu.shift.index') }}"> <i class="fas fa-blender-phone"></i> Turnos</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ active('samu.mobileinservice.*') }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.mobileinservice.index') }}"><i class="fas fa-ambulance"></i> Moviles en servicio</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ active('samu.noveltie.*') }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.noveltie.index') }}"><i class="fas fa-book"></i> Novedades</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ active('samu.call.*') }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.call.index') }}"><i class="fas fa-headset"></i> Centro de Llamadas</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ active('samu.qtc.*') }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.qtc.index') }}"><i class="fas fa-car-crash"></i> QTCs</a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ active(['samu.key.*','samu.mobile.*']) }}" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
            <i class="fas fa-cog"></i> Configuración</a>
        <div class="dropdown-menu">

            <a class="dropdown-item {{ active('samu.key.*') }}"
            href=" {{ route('samu.key.index') }}"><i class="fas fa-user-injured"></i> Codificación de las claves</a>

            <a class="dropdown-item {{ active('samu.mobile.*') }}"
            href=" {{ route('samu.mobile.index') }}"><i class="fas fa-ambulance"></i> Móviles</a>

        </div>
    </li>
    
</ul>