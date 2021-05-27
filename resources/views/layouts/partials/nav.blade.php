<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
    <span>Mi información</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <span data-feather="plus-circle"></span>
    </a>
</h6>
<ul class="nav flex-column">
    <!-- <li class="nav-item">
        <a class="nav-link {{ active('profile.observation.index') }}" href="{{ route('profile.observation.index') }}">
        <span data-feather="user"></span>
        Mis exámenes<span class="sr-only"></span>
        </a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link {{ active(['profile.show', 'profile.edit']) }}" href="{{ route('profile.show') }}">
        <span data-feather="user"></span>
        Mi perfíl<span class="sr-only"></span>
        </a>
    </li>
</ul>

{{--@can('Developer')--}}
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
    @if(App\Models\Fq\ContactUser::getAmIContact() > 0)
        <li class="nav-item">
            <a class="nav-link {{ active('fq.request.create') }}" href="{{ route('fq.request.create') }}">
            <span data-feather="plus-circle"></span>
            Solicitudes Pacientes FQ
            </a>
        </li>
    @else
      @can('Fq: Answer request')
          <li class="nav-item">
              <a class="nav-link {{ active('fq.request.create') }}" href="{{ route('fq.request.index') }}">
              <span data-feather="plus-circle"></span>
              Solicitudes Pacientes FQ
              </a>
          </li>
      @endcan
    @endif

</ul>
{{--@endcan--}}

{{--@can('Administrator')--}}
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
{{--@endcan--}}

<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
    <span>Programador médico</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <span data-feather="plus-circle"></span>
    </a>
</h6>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ active('medical_programmer.operating_room_programming.index') }}" href="{{ route('medical_programmer.operating_room_programming.index') }}">
        <span data-feather="chevrons-right"></span>
        Programador de pabellones<span class="sr-only">(current)</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link">
        <span data-feather="chevrons-right"></span>
        Programador teórico<span class="sr-only">(current)</span>
        </a>
    </li>
    <ul class="pl-4 nav flex-column">
      <li class="nav-item">
          <a class="nav-link {{ active('medical_programmer.theoretical_programming.index') }}" href="{{ route('medical_programmer.theoretical_programming.index','tipo=1') }}">
          <span data-feather="chevron-right"></span>
          Médico<span class="sr-only">(current)</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link {{ active('medical_programmer.theoretical_programming.index') }}" href="{{ route('medical_programmer.theoretical_programming.index','tipo=2') }}">
          <span data-feather="chevron-right"></span>
          No médico<span class="sr-only">(current)</span>
          </a>
      </li>
    </ul>

    <li class="nav-item">
        <a class="nav-link {{ active('medical_programmer.activities.index') }}" href="{{ route('medical_programmer.activities.index') }}">
        <span data-feather="chevrons-right"></span>
        Actividades
        </a>
    </li>
</ul>

<ul class="nav flex-column">
    <li class="nav-item border-top">
        <a class="nav-link" href="{{ route('claveunica.logout') }}">
        <span data-feather="log-out"></span>
        Cerrar sesión
        </a>
    </li>
</ul>

<!-- <p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Button with data-target
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div> -->
