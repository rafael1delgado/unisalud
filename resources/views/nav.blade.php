<ul class="nav nav-tabs mb-3" >
    <li class="nav-item" >
        <a class="nav-link {{ active('samu.welcome') }}"
        href=" {{ route('samu.welcome') }}"><i class="fas fa-home"></i> Home</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ active('samu.shift.index') }}"
        href=" {{ route('samu.shift.index') }}"> <i class="fas fa-list"></i> Turno</a>
       
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ active('samu.mobileinservice.index') }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.mobileinservice.index') }}"><i class="fas fa-ambulance"></i> Moviles en servicio</a>
    </li>

    <li class="nav-item">
    <a class="nav-link {{ active('samu.noveltie.index') }} @if(!App\Models\Samu\Shift::todayShiftVerify()) disabled @endif" 
        href=" {{ route('samu.noveltie.index') }}"><i class="fas fa-book"></i>Novedades</a>
    </li>

    

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
            <i class="fas fa-cog"></i> Configuración</a>
        <div class="dropdown-menu">

            <a class="dropdown-item
            @if(request()->route()->view == 'codekey') active @endif"
            href=" {{ route('samu.codekey.index') }}"><i class="fas fa-lock"></i> Codificación de las claves</a>

            <a class="dropdown-item
            @if(request()->route()->view == 'mobile') active @endif"
            href=" {{ route('samu.mobile.index') }}"><i class="fas fa-ambulance"></i> Móviles</a>

        </div>
    </li>
    
</ul>