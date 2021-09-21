<ul class="nav nav-tabs mb-3">
<li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.regulatory-center.index') }}">Turno</a>
</li>
<li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.novelties.index') }}">Novedades</a>
</li>
<li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.qtc.index') }}">Call Center</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.mobile.index') }}">Movil-Tripulacion</a>
    </li>

    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.codekey.index') }}">Codificación de las Claves</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link
        @if(request()->route()->view == 'pacientes') active @endif"
        href=" {{ route('samu.codemobile.index') }}">Codificación de Movil</a>
    </li>

</ul>
