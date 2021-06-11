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
                    <tr>
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
                        <td>{{ $fqRequest->NameValue }}</td>
                        <td>{{ $fqRequest->SpecialtiesValue }}</td>
                        <td>{{ $fqRequest->observation_patient }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br>
        @if($fqRequest->prescription_file)
            <h6><i class="far fa-file-alt"></i> Receta</h6>
            <div class="card">
                <div class="card-body">
                  <a href="{{ route('fq.request.view_file', $fqRequest) }}"
                      @if($fqRequest->prescription_file)
                          class="btn btn-outline-secondary btn-sm"
                      @else
                          class="btn btn-outline-secondary btn-sm disabled"
                      @endif
                      title="Receta"
                      target="_blank">
                      <i class="far fa-file-alt"></i>
                  </a>
                </div>
            </div>
            <br>
        @endif


        <h6><i class="fas fa-hospital-user"></i> Paciente</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-nostriped">
                <tbody>
                    <tr>
                        <th class="table-active" style="width: 20%">RUN</th>
                        <td colspan="4" style="width: 30%">
                            {{ $fqRequest->patient->IdentifierRun->value }}-
                            {{ $fqRequest->patient->IdentifierRun->dv }}
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active">Nombre</th>
                        <td colspan="4">
                            {{ $fqRequest->patient->officialFullName }}
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active">Nº Ficha</th>
                        <td colspan="4">
                            {{-- $fqRequest->patient->clinical_history_number --}}
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active">Teléfono</th>
                        <td colspan="4">
                            @foreach($fqRequest->contactUser->contactPoints->where('system', 'phone') as $contactPoint)
                              +59 {{ $contactPoint->value }}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active">Correo electrónico</th>
                        <td colspan="4">
                          @foreach($fqRequest->contactUser->contactPoints->where('system', 'email') as $contactPoint)
                            {{ $contactPoint->value }}
                          @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active">Dirección</th>
                        <td>
                          @foreach($fqRequest->contactUser->addresses as $address)
                            {{ $address->text }} {{ $address->line }}<br>
                          @endforeach
                        </td>
                        <th class="table-active" style="width: 10%">Departamento</th>
                        <td style="width: 20%">
                          @foreach($fqRequest->contactUser->addresses as $address)
                            {{ $address->apartment }}<br>
                          @endforeach
                        </td>
                        <td style="width: 20%">
                          @foreach($fqRequest->contactUser->addresses as $address)
                            {{ $address->suburb }}<br>
                          @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active">Comuna</th>
                        <td colspan="4">
                          @foreach($fqRequest->contactUser->addresses as $address)
                            {{ $address->city }}<br>
                          @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
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

        @if($fqRequest->status == 'pending' && (Gate::check('Fq: Answer request') ||
                                                Gate::check('Fq: Answer request medicines') ||
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
