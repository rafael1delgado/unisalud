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
                </div>
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
                                <th scope="col">Paciente</th>
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
                              <td></td>
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
                                  <a href="" class="btn btn-outline-secondary btn-sm" title="Ir" target="_blank"> <i class="far fa-eye"></i></a>
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
