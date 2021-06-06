@extends('fq.app')

@section('title', 'Nuevo Staff')

@section('content')

<h5>Ingreso de Solicitud</h5>

<br>

<h6>Contacto</h6>
<br>

<div class="table-responsive">
    <table class="table table-sm table-striped table-bordered table-hover">
        <thead class="text-center table-info">
            <tr>
                <th scope="col" style="width: 5%">Identificación</th>
                <th scope="col" style="width: 20%">Nombre Completo</th>
                <th scope="col" style="width: 20%">Dirección</th>
                <th scope="col">Comuna</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col" style="width: 4%"></th>
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
                  {{ $address->text }} {{ $address->line }}<br>
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

<hr>

<h6>Paciente</h6>
<br>
{{-- dd($contactUser->user->usersPatients->first()->user) --}}

<form method="POST" class="form-horizontal" action="{{ route('fq.request.store', $contactUser) }}" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <table class="table table-sm table-striped table-bordered table-hover">
        <thead class="text-center table-info">
            <tr>
                <th scope="col" style="width: 5%">Identificación</th>
                <th scope="col" style="width: 20%">Nombre Completo</th>
                <th scope="col" style="width: 20%">Dirección</th>
                <th scope="col">Comuna</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <!-- <th style="width: 5%"></th> -->
                <th style="width: 4%"></th>
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
                <td>
                    <fieldset class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="patient_id"
                                value="{{-- $usersPatients->patient->id --}}" required>
                        </div>
                    </fieldset>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <div class="form-row">
        <fieldset class="form-group col-sm-3">
            <label for="for_name">Motivo de Solicitud</label>
            <select name="name" id="for_name" class="form-control" required>
                <option value="">Seleccione...</option>
                <option value="specialty hours">Horas de especialidad</option>
                <option value="prescription">Renovación de receta</option>
                <option value="home hospitalization">Contacto con hospitalización domiciliaria</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for_specialties">Especialidad</label>
            <select name="specialties" id="for_specialties" class="form-control" required>
                <option value="">Seleccione...</option>
                <option value="1">Broncopulmonar</option>
                <option value="2">Otorrinolaringología</option>
                <option value="3">Endocrinología</option>
                <option value="4">Gastroenterología</option>
                <option value="other">Otros</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for_other_specialty">Otra especialidad</label>
            <input type="text" class="form-control" name="other_specialty" id="for_other_specialty">
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <div class="mb-3">
              <label for="for_prescription_file" class="form-label">Receta</label>
              <input class="form-control" type="file" name="prescription_file" id="for_prescription_file">
            </div>
        </fieldset>

        <fieldset class="form-group col-sm">
          <label for="observation_patient" class="form-label">Observación</label>
          <textarea class="form-control" name="observation_patient" id="for_observation_patient" rows="3"></textarea>
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Guardar</button>

</form>

@endsection

@section('custom_js')

<script type="text/javascript">

    $('#for_specialties').attr("disabled", true);
    document.getElementById('for_other_specialty').readOnly = true;
    $('#for_prescription_file').attr("disabled", true);

    jQuery('select[name=name]').change(function(){
        var fieldsetName = $(this).val();
        switch(this.value){
            case "specialty hours":
                $('#for_specialties').attr("disabled", false);
                $('#for_prescription_file').attr("disabled", true);
                document.getElementById('for_prescription_file').value = '';
                break;

            case "prescription":
                $('#for_prescription_file').attr("disabled", false);
                $('#for_specialties').attr("disabled", true);
                document.getElementById('for_specialties').value = '';
                document.getElementById('for_other_specialty').readOnly = true;
                document.getElementById('for_other_specialty').value = '';
                break;

            default:
                $('#for_specialties').attr("disabled", true);
                document.getElementById('for_specialties').value = '';
                document.getElementById('for_other_specialty').readOnly = true;
                document.getElementById('for_other_specialty').value = '';
                $('#for_prescription_file').attr("disabled", true);
                document.getElementById('for_prescription_file').value = '';

                break;
        }
    });

    jQuery('select[name=specialties]').change(function(){
        var fieldsetName = $(this).val();
        switch(this.value){
            case "other":
                document.getElementById('for_other_specialty').readOnly = false;
                break;

            default:
                document.getElementById('for_other_specialty').readOnly = true;
                document.getElementById('for_other_specialty').value = '';

                break;
        }
    });
</script>

@endsection
