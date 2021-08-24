<ul class="nav nav-tabs mb-3">

    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.call.index') }}">Call Center</a>
    </li>
    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.mobile.index') }}">Movil</a>
    </li>

    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.crew.index') }}">Tripulacion</a>
    </li>

    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.regulatory-center.index') }}">Centro Regulador</a>
    </li>

    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.cclave.index') }}">Codificación de las Calves</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.cmovil.index') }}">Codificación de Movil</a>
    </li>

</ul>
