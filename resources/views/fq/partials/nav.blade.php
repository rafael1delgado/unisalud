<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
    <span>Mi información</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <!-- <span data-feather="plus-circle"></span> -->
    </a>
</h6>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ active(['profile.show', 'profile.edit']) }}" href="{{ route('profile.show') }}">
        <span data-feather="user"></span>
        Mi perfíl<span class="sr-only"></span>
        </a>
    </li>
</ul>

<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
    <span>Pacientes</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <!-- <span data-feather="plus-circle"></span> -->
    </a>
</h6>
<ul class="nav flex-column">
    @if(App\Models\Fq\ContactUser::getAmIContact() > 0)
        <li class="nav-item">
            <a class="nav-link {{ active('fq.request.create') }}" href="{{ route('fq.request.create') }}">
                <i class="fas fa-plus"></i> Nueva Solicitud
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ active('fq.request.own_index') }}" href="{{ route('fq.request.own_index') }}">
                <i class="fas fa-inbox"></i> Mis Solicitudes
            </a>
        </li>
    @else
        @canany(['Fq: Answer request', 'Fq: Answer request medicines'])
            <li class="nav-item">
                <a class="nav-link {{ active('fq.request.create') }}" href="{{ route('fq.request.index') }}">
                    <i class="fas fa-inbox"></i> Solicitudes Pacientes FQ
                </a>
            </li>
        @endcanany
        @can('Fq: admin')
            <li class="nav-item">
                <a class="nav-link {{ active('fq.contact_user.create') }}" href="{{ route('fq.contact_user.create') }}">
                    <i class="fas fa-user-plus"></i> Crear contacto
                </a>
            </li>
        @endcan
    @endif
</ul>

<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
    <span>Encuestas</span>
    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
    <!-- <span data-feather="plus-circle"></span> -->
    </a>
</h6>
<ul class="nav flex-column">
    <li class="nav-item">
      @can('Fq: admin')
          <a class="nav-link {{ active('surveys.teleconsultation.index') }}" href="{{ route('surveys.teleconsultation.index') }}">
              <i class="fas fa-inbox"></i> Listado Encuestas
          </a>
      @endcan
      @if(App\Models\Fq\ContactUser::getAmIContact() > 0)
        @if(App\Models\Surveys\TeleconsultationSurvey::getAnswerSurvey() > 0)
          <a class="nav-link {{ active('surveys.teleconsultation.my_survey') }}" href="{{ route('surveys.teleconsultation.my_survey') }}">
              <i class="fas fa-laptop"></i> Habilitantes Teleconsulta
                <span class="badge bg-secondary"><i class="fas fa-check"></i></span>
          </a>
        @else
          <a class="nav-link {{ active('surveys.teleconsultation.create') }}" href="{{ route('surveys.teleconsultation.create') }}">
              <i class="fas fa-laptop"></i> Habilitantes Teleconsulta
                <span class="badge bg-warning text-dark"><i class="fas fa-clock"></i></span>
          </a>
        @endif
      @endif
    </li>
</ul>

<ul class="nav flex-column">
    <li class="nav-item border-top">
        <a class="nav-link" href="">
            <i class="fas fa-user"></i> {{ Auth::user()->OfficialFullName }}
        </a>
        <a class="nav-link" href="{{ route('claveunica.logout') }}">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </a>
    </li>
</ul>
