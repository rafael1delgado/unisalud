<ul class="nav nav-tabs mb-3" >
<li class="nav-item" >
        <a class="nav-link
        @if(request()->route()->view == 'home') active @endif"
        href=" {{ route('samu.welcome') }}"><i class="fas fa-home"></i> Home</a>
</li>
<li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'shift') active @endif"
        href=" {{ route('samu.shift.index') }}"> <i class="fas fa-list"></i> Turno</a>
</li>
<li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'novelties') active @endif"
        href=" {{ route('samu.noveltie.index') }}"><i class="fas fa-book"></i> Novedades</a>
</li>
<li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'qtc') active @endif"
        href=" {{ route('samu.qtc.index') }}"><i class="fas fa-phone-volume"></i> Call Center</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'mobile') active @endif"
        href=" {{ route('samu.mobile.index') }}"><i class="fas fa-ambulance"></i> Movil-Tripulacion</a>
    </li>

    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'codekey') active @endif"
        href=" {{ route('samu.codekey.index') }}"><i class="fas fa-lock"></i> Codificación de las Claves</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'codemobile') active @endif"
        href=" {{ route('samu.codemobile.index') }}"><i class="fas fa-lock"></i> Codificación de Movil</a>
    </li>

</ul>
