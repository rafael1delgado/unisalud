@extends('fq.app')

@section('title', 'Crear Contacto')

@section('content')

<br>

<h5><i class="fas fa-user-plus"></i> Crear Contacto</h5>

<br>

<!-- <div class="row">
    <div class="col-6"> -->
        <form method="GET" class="form-horizontal" action="{{ route('fq.contact_user.create') }}">
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
    <!-- </div>
</div> -->

<br>

<div class="row">
    <div class="col">
    @if($user)
        <div class="card">
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <h6><i class="fas fa-user"></i> Datos Personales</h6>
                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="col" class="table-info" style="width: 20%">Nombre</th>
                                        <th scope="col">{{ $user->OfficialFullName }}</th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="table-info">Identificación</th>
                                        <td>
                                            @foreach($user->identifiers as $identifier)
                                              {{ $identifier->value }}-{{ $identifier->dv }}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">Nº Ficha</th>
                                        <td>
                                            {{-- $fqRequest->patient->clinical_history_number --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h6><i class="fas fa-phone"></i> Teléfonos</h6>

                                <table class="table table-sm table-bordered table-nostriped">
                                    <tbody>
                                      @foreach($user->contactPoints->where('system', 'phone') as $contactPoint)
                                        <tr>
                                            <th class="table-info" style="width: 20%">{{ $contactPoint->UseValue }}<br></th>
                                            <td colspan="4">
                                                +56 {{ $contactPoint->value }}<br>
                                            </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h6><i class="fas fa-at"></i> E-mail</h6>
                                <table class="table table-sm table-bordered table-nostriped">
                                    <tbody>
                                      @foreach($user->contactPoints->where('system', 'email') as $contactPoint)
                                        <tr>
                                            <th class="table-info" style="width: 20%">{{ $contactPoint->UseValue }}<br></th>
                                            <td colspan="4">
                                                {{ $contactPoint->value }}<br>
                                            </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class="card">
                    <div class="card-body">
                        <h6><i class="fas fa-house-user"></i> Direcciones:</h6>
                        <table class="table table-sm table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th class="table-info">Dirección</th>
                                    <th class="table-info">Depto.</th>
                                    <td class="table-info">Condominio/Villa/Localidad</th>
                                    <th class="table-info">Comuna</th>
                                    <th class="table-info">Región</th>
                                </tr>
                              @foreach($user->addresses as $address)
                                <tr>
                                    <th class="table-info">{{ $address->UseValue }}</th>
                                    <td>{{ $address->text }} {{ $address->line }}</td>
                                    <td>{{ $address->apartment }}</td>
                                    <td>{{ $address->suburb }}</td>
                                    <td>{{ $address->commune->name }}</td>
                                    <td>{{ $address->region->name }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <a href="{{ route('fq.contact_user.store', $user) }}" class="btn btn-primary float-right"><i class="fas fa-save"></i> Agregar a Contactos</a>
            </div>
        </div>
    @endif
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h6><i class="fas fa-user"></i> Listado de Contactos</h6>
                <br>
                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">Identificación</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Comuna</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                          @foreach($contactUsers as $contactUser)
                            <tr>
                              <td>
                                @foreach($contactUser->user->identifiers as $identifier)
                                  {{ $identifier->value }}-{{ $identifier->dv }}<br>
                                @endforeach
                              </td>
                              <td>{{ $contactUser->user->OfficialFullName }}</td>
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
                              <td>
                                  <a href="{{ route('fq.contact_user.addPatient', $contactUser) }}" class="btn btn-outline-secondary btn-sm" title="Pacientes">
                                    <i class="fas fa-users"></i>
                                  </a>
                              </td>
                            </tr>
                          @endforeach
                        <tbody>
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom_js')

@endsection
