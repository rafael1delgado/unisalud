@extends('layouts.app')

@section('content')
<h3 class="mb-3">Listado de Solicitudes de Examenes de Chagas</h3>

<div class="table-responsive">
    <table class="table table-sm table-bordered" id="tabla_casos">
        <thead>
            <tr>
                <th nowrap>ID</th>
                <th>Fecha muestra</th>
                <th>Origen</th>
                <th>Nombre</th>
                <th>RUN</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Fecha de Resultado</th>
                <th>Estado</th>
                <th>Observación</th>
            </tr>
        </thead>
        <tbody id="tableCases">
            <tr>
                <td>777 <a href="{{ route('epi.chagas.edit') }}" class="btn_edit"><i class="fas fa-edit"></i></a></td>
                <td>01-09-2021</td>
                <td>Hospital Ernesto Torres Galdames</td>
                <td>ANA MARIA CHAPPE VARGAS</td>
                <td>22601558-2</td>
                <td>58</td>
                <td>F</td>
                <td></td>
                <td>Pendiente</td>
                <td>Sin Observaciones</td>
            </tr>

            <tr>
                <td>778 <a href="#" class="btn_edit"><i class="fas fa-edit"></i></a></td>
                <td>28-08-2021</td>
                <td>Hospital Ernesto Torres Galdames</td>
                <td>ICIAR DEL CARMEN DUFRAIX</td>
                <td>15684886-7</td>
                <td>34</td>
                <td>F</td>
                <td>01-09-2021</td>
                <td>Negativo</td>
                <td>Sin Observaciones</td>
            </tr>


            <tr>
                <td>780 <a href="#" class="btn_edit"><i class="fas fa-edit"></i></a></td>
                <td>28-08-2021</td>
                <td>SAPU Pozo Almonte</td>
                <td>ALCIRA RIVERA MERCHAN</td>
                <td>19181123-2</td>
                <td>25</td>
                <td>F</td>
                <td>01-09-2021</td>
                <td>Rechazo</td>
                <td>Sin Observaciones</td>
            </tr>

        </tbody>
    </table>

</div>


@endsection

@section('custom_js')

@endsection