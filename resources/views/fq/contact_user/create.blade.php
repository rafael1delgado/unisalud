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
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h6><i class="fas fa-user"></i> Listado de Contactos</h6>
                <br>
                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Paciente</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if($user)
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h6><i class="fas fa-user"></i> Datos de Contacto</h6>
                <br>
                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead class="table-info">

                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">{{ $user->OfficialFullName }}</th>
                            </tr>

                        </thead>
                        <tbody>
                          @foreach($user->identifiers as $identifier)
                            <tr>
                                <th scope="row">Identificación</th>
                                <td>{{ $identifier->value }}-{{ $identifier->dv }}</td>
                            </tr>
                          @endforeach
                            <tr>
                                <th scope="row">Dirección</th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th scope="row">Comuna</th>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th scope="row">Teléfono</th>
                                <td colspan="2"></td>
                            </tr>
                          @foreach($user->contactPoints->where('system', 'email') as $contactPoint)
                            <tr>
                                <th scope="row">Correo</th>
                                <td colspan="2">{{ $contactPoint->value }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br>

        <a href="{{ route('fq.contact_user.store', $user) }}" class="btn btn-primary float-right"><i class="fas fa-save"></i> Guardar</a>
    </div>
    @endif
</div>

<br>

@endsection

@section('custom_js')

@endsection
