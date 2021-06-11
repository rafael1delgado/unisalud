@extends('fq.app')

@section('title', 'Crear Contacto')

@section('content')

<br>

<h5><i class="fas fa-user"></i> Contacto - Pacientes</h5>

<br>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6><i class="fas fa-user"></i> Datos de Contacto</h6>
                <br>
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordered">
                        <thead class="table-info text-center">
                            <tr>
                              <th scope="col" style="width: 5%">Identificación</th>
                              <th scope="col" style="width: 20%">Nombre Completo</th>
                              <th scope="col" style="width: 20%">Dirección</th>
                                <th scope="col">Comuna</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Teléfono</th>
                            </tr>
                        </thead>
                          {{-- @foreach($contactUsers as $contactUser) --}}
                            <tr>
                              <td>
                                @foreach($contactUser->user->identifiers as $identifier)
                                  {{ $identifier->value }}-{{ $identifier->dv }}<br>
                                @endforeach
                              </td>
                              <td>{{ $contactUser->user->OfficialFullName }}</td>
                              <!-- <td></td> -->
                              <td>
                                @foreach($contactUser->user->addresses as $address)
                                  {{ $address->text }}{{ $address->line }}<br>
                                @endforeach
                              </td>
                              <td>
                                @foreach($contactUser->user->addresses as $address)
                                  {{ $address->city }}<br>
                                @endforeach
                              </td>
                              <td>
                                @foreach($contactUser->user->contactPoints->where('system', 'email') as $contactPoint)
                                  {{ $contactPoint->value }}<br>
                                @endforeach
                              </td>
                              <td>
                                @foreach($contactUser->user->contactPoints->where('system', 'phone') as $contactPoint)
                                  +56 {{ $contactPoint->value }}<br>
                                @endforeach
                              </td>
                            </tr>
                          {{-- @endforeach --}}
                        <tbody>
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

@if($contactUser->user->usersPatients->count() > 0 )
    <div class="row" id="search_div">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h6><i class="fas fa-user"></i> Datos de Paciente(s) Asignado</h6>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover table-bordered">
                            <thead class="table-info text-center">
                                <tr>
                                    <th scope="col" style="width: 5%">Identificación</th>
                                    <th scope="col" style="width: 20%">Nombre Completo</th>
                                    <th scope="col" style="width: 20%">Dirección</th>
                                    <th scope="col">Comuna</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Teléfono</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contactUser->user->usersPatients as $usersPatient)
                                <tr>
                                    <td>
                                      @foreach($usersPatient->user->identifiers as $identifier)
                                        {{ $identifier->value }}-{{ $identifier->dv }}<br>
                                      @endforeach
                                    </td>
                                    <td>
                                      {{ $usersPatient->user->OfficialFullName }}<br>
                                    </td>
                                    <td>
                                      @foreach($usersPatient->user->addresses as $address)
                                        {{ $address->text }} {{ $address->line }}<br>
                                      @endforeach
                                    </td>
                                    <td>
                                      @foreach($usersPatient->user->addresses as $address)
                                        {{ $address->city }}<br>
                                      @endforeach
                                    </td>
                                    <td>
                                      @foreach($usersPatient->user->contactPoints->where('system', 'email') as $contactPoint)
                                        {{ $contactPoint->value }}<br>
                                      @endforeach
                                    </td>
                                    <td>
                                      @foreach($usersPatient->user->contactPoints->where('system', 'phone') as $contactPoint)
                                        +56 {{ $contactPoint->value }}<br>
                                      @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<br>

<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseSearch" role="button" aria-expanded="false" aria-controls="collapseSearch">
    <i class="fas fa-search"></i> Buscar Paciente
  </a>
</p>
<div class="collapse" id="collapseSearch">
    <div class="card card-body">
        <form method="GET" class="form-horizontal" action="{{ route('fq.contact_user.addPatient', $contactUser) }}">
            <div class="input-group mb-sm-0">
                <input class="form-control" type="text" name="search" autocomplete="off"
                  id="for_search" style="text-transform: uppercase;"
                  placeholder="RUN (sin dígito verificador) / OTRA IDENTIFICACION / NOMBRE"
                  value="{{ $request->search }}" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                </div>
            </div>
        </form>
        <br>
        @if($user)
            <h6><i class="fas fa-user"></i> Datos de Contacto</h6>
            <br>
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col" colspan="4">{{ $user->OfficialFullName }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Identificación</th>
                            <td colspan="4">
                                @foreach($user->identifiers as $identifier)
                                  {{ $identifier->value }}-{{ $identifier->dv }}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Dirección</th>
                            <td>
                              @foreach($user->addresses as $address)
                                {{ $address->text }} {{ $address->line }}<br>
                              @endforeach
                            </td>
                            <th scope="row">Departamento</th>
                            <td>
                              @foreach($user->addresses as $address)
                                {{ $address->apartment }}<br>
                              @endforeach
                            </td>
                            <td>
                              @foreach($user->addresses as $address)
                                {{ $address->suburb }}<br>
                              @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Comuna</th>
                            <td colspan="4">
                              @foreach($user->addresses as $address)
                                {{ $address->city }}<br>
                              @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Teléfono</th>
                            <td colspan="4"></td>
                        </tr>
                      @foreach($user->contactPoints->where('system', 'email') as $contactPoint)
                        <tr>
                            <th scope="row">Correo</th>
                            <td>{{ $contactPoint->value }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                <a href="{{ route('fq.contact_user.storeAddPatient',
                              ['contactUser' => $contactUser, 'user' => $user]) }}" class="btn btn-primary float-right"><i class="fas fa-save"></i> Agregar Paciente</a>
            </div>
        @endif
    </div>
</div>


<br><br><br>

@endsection

@section('custom_js')

<script type="text/javascript">
    var req = '{{ $request->search }}';
    if(req){
        $('#collapseSearch').collapse({
            toggle: true
        })
    }
</script>

@endsection
