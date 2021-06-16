<style>
  .table-nostriped tbody tr:nth-of-type(odd) {
    background-color:transparent;
  }
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal-{{ $fqRequest->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle de Solicitud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6><i class="fas fa-inbox"></i> Solicitud</h6>
        <div class="table-responsive">
            <table class="table-nostriped">
                <thead>
                    <tr class="text-center">
                        <th style="width: 10%">Fecha Solicitud</th>
                        <th>Estado</th>
                        <th style="width: 20%">Nombre Contacto</th>
                        <th>Motivo</th>
                        <th>Especialidad</th>
                        <th>Observación Paciente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $fqRequest->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $fqRequest->StatusValue }}</td>
                        <td>{{ $fqRequest->contactUser->officialFullName }}</td>
                        <td>
                            {{ $fqRequest->NameValue }}
                            @if($fqRequest->prescription_file)
                                <h6>
                                    <a href="{{ route('fq.request.view_file', $fqRequest) }}"
                                        title="Receta"
                                        target="_blank">
                                        <i class="fas fa-paperclip"></i>
                                    </a>
                                </h6>
                            @endif
                        </td>
                        @if($fqRequest->name == 'specialty hours' && $fqRequest->specialties == 'other')
                        <td>{{ $fqRequest->SpecialtiesValue }} / {{ $fqRequest->OtherSpecialtiesValue }}</td>
                        @else
                        <td>{{ $fqRequest->SpecialtiesValue }}</td>
                        @endif
                        <td>{{ $fqRequest->observation_patient }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br>

        <div class="card">
            <div class="card-body">
                <h6><i class="fas fa-user"></i> Paciente</h6>
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered table-nostriped">
                        <tbody>
                            <tr>
                                <th scope="col" class="table-active" style="width: 20%">Nombre</th>
                                <th scope="col">{{ $fqRequest->patient->OfficialFullName }}</th>
                            </tr>
                            <tr>
                                <th scope="row" class="table-active">Identificación</th>
                                <td>
                                    {{ $fqRequest->patient->IdentifierRun->value }}-
                                    {{ $fqRequest->patient->IdentifierRun->dv }}
                                </td>
                            </tr>
                            <tr>
                                <th class="table-active">Nº Ficha</th>
                                <td>{{-- $fqRequest->patient->clinical_history_number --}}</td>
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
                              @foreach($fqRequest->contactUser->contactPoints->where('system', 'phone') as $contactPoint)
                                <tr>
                                    <th class="table-active" style="width: 20%">{{ $contactPoint->UseValue }}<br></th>
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
                              @foreach($fqRequest->contactUser->contactPoints->where('system', 'email') as $contactPoint)
                                <tr>
                                    <th class="table-active" style="width: 20%">{{ $contactPoint->UseValue }}<br></th>
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
                <table class="table table-sm table-bordered table-nostriped">
                    <tbody>
                        <tr class="table-active">
                            <th></th>
                            <th>Dirección</th>
                            <th>Depto.</th>
                            <td>Condominio/Villa/Localidad</th>
                            <th>Comuna</th>
                            <th>Región</th>
                        </tr>
                        @foreach($fqRequest->contactUser->addresses as $address)
                        <tr>
                            <th>{{ $address->UseValue }}</th>
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

        @if($fqRequest->name == 'dispensing')
            <h6><i class="fas fa-capsules"></i> Medicamentos o Insumos Solicitados</h6>

                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-nostriped">
                        <thead>
                            <tr class="text-center">
                              <td>#</td>
                              <td>Medicamento</td>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($fqRequest->fq_medicines as $key => $fq_medicine)
                            <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $fq_medicine->medicine->name }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>

        @endif

        @if($fqRequest->status == 'pending' && (Gate::check('Fq: Answer request medicines') ||
                                                Gate::check('Fq: admin')))
        <form method="POST" class="form-horizontal" action="{{ route('fq.request.update', $fqRequest) }}">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <fieldset class="form-group col-sm-3">
                            <label for="for_date_confirm">Fecha de confirmación</label>
                            <input type="datetime-local" class="form-control" name="date_confirm" id="for_date_confirm" required>
                        </fieldset>

                        <fieldset class="form-group col-sm-3">
                            <label for="for_attention">Tipo de Atención</label>
                            <select name="attention" id="for_attention" class="form-control"
                              @if($fqRequest->name != 'specialty hours') disabled @endif>
                                <option value="">Seleccione...</option>
                                <option value="face-to-face">Presencial</option>
                                <option value="teleconsultation">Teleconsulta</option>
                            </select>
                        </fieldset>

                        <fieldset class="form-group col-sm-3">
                            <label for="for_practitioner_id">Médico</label>
                            <select name="practitioner_id" id="for_practitioner_id" class="form-control"
                              @if($fqRequest->name != 'specialty hours') disabled @endif>
                                <option value="0">Seleccione...</option>
                                <option value="1">Jose Fernandez</option>
                                <option value="2">Francisco Rojas</option>
                            </select>
                        </fieldset>

                        <fieldset class="form-group col-sm-3">
                            <label for="for_value">Valor a pagar</label>
                            <input type="number" class="form-control" name="value" id="for_value">
                        </fieldset>
                    </div>
                    <div class="form-row">
                        <fieldset class="form-group col-sm-9">
                            <label for="for_link">Link</label>
                            <input type="text" class="form-control" name="link" id="for_link"
                              @if($fqRequest->name != 'specialty hours') disabled @endif>
                        </fieldset>

                        <fieldset class="form-group col-sm-3">
                            <label for="for_place">Lugar</label>
                            <input type="text" class="form-control" name="place" id="for_place">
                        </fieldset>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Guardar <i class="fas fa-save"></i></button>
                </div>
            </div>


        </form>
        @endif

        @if($fqRequest->status == 'complete' || $fqRequest->status == 'rejected')
        <h6><i class="far fa-calendar-alt"></i> Atendido</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-nostriped">
                <thead>
                    <tr class="text-center">
                        <th style="width: 10%">Fecha Respuesta</th>
                        <th style="width: 20%">Respuesta por:</th>
                        <th>Observación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $fqRequest->date_confirm->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $fqRequest->user->officialFullName }}</td>
                        <td>{{ $fqRequest->observation_request }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@section('custom_js')

<script type="text/javascript">
    document.getElementById("for_link").disabled = true;
    document.getElementById("for_place").disabled = true;

    jQuery('select[name=attention]').change(function(){
        var fieldsetName = $(this).val();
        switch(this.value){
            case "teleconsultation":
                document.getElementById("for_link").disabled = false;
                document.getElementById("for_place").disabled = true;
                document.getElementById('for_place').value = '';
                break;

            case "face-to-face":
                document.getElementById("for_place").disabled = false;
                document.getElementById("for_link").disabled = true;
                document.getElementById('for_link').value = '';
                break;

            default:
                document.getElementById("for_link").disabled = true;
                document.getElementById('for_link').value = '';
                document.getElementById("for_place").disabled = true;
                document.getElementById('for_place').value = '';
                break;
        }
    });
</script>

@endsection
