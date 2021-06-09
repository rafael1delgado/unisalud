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
            <table class="table table-sm table-bordered">
                <thead>
                    <tr class="text-center table-active">
                        <th style="width: 20%">Fecha Solicitud</th>
                        <th>Estado</th>
                        <th>Nombre Contacto</th>
                        <th>Motivo</th>
                        <th>Observación Paciente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $fqRequest->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $fqRequest->StatusValue }}</td>
                        <td>{{ $fqRequest->contactUser->officialFullName }}</td>
                        <td>{{ $fqRequest->NameValue }}</td>
                        <td>{{ $fqRequest->observation_patient }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h6><i class="fas fa-hospital-user"></i> Paciente</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                </thead>
                <tbody>
                    <tr>
                        <th class="table-active" style="width: 20%">RUN</th>
                        <td colspan="4">
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
                        <th scope="row">Dirección</th>
                        <td>
                          @foreach($fqRequest->contactUser->addresses as $address)
                            {{ $address->text }} {{ $address->line }}<br>
                          @endforeach
                        </td>
                        <th scope="row">Departamento</th>
                        <td>
                          @foreach($fqRequest->contactUser->addresses as $address)
                            {{ $address->apartment }}<br>
                          @endforeach
                        </td>
                        <td>
                          @foreach($fqRequest->contactUser->addresses as $address)
                            {{ $address->suburb }}<br>
                          @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Comuna</th>
                        <td colspan="4">
                          @foreach($fqRequest->contactUser->addresses as $address)
                            {{ $address->city }}<br>
                          @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if($fqRequest->name == 'dispensing')
            <h6><i class="fas fa-capsules"></i> Medicamentos o Insumos Solicitados</h6>

                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
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

            <div class="form-row">
                <fieldset class="form-group col-sm-3">
                    <label for="for_attention">Tipo de Atención</label>
                    <select name="attention" id="for_attention" class="form-control"
                      onchange="myFunction()" @if($fqRequest->name != 'specialty hours') disabled @endif>
                        <option value="">Seleccione...</option>
                        <option value="face-to-face">Presencial</option>
                        <option value="teleconsultation">Teleconsulta</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-3">
                    <label for="for_date_confirm">Fecha de confirmación</label>
                    <input type="datetime-local" class="form-control" name="date_confirm" id="for_date_confirm" required>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label for="for_link">Link</label>
                    <input type="text" class="form-control" name="link" id="for_link"
                      @if($fqRequest->name != 'specialty hours') disabled @endif>
                </fieldset>
            </div>

            <div class="form-row">
                <fieldset class="form-group col-sm">
                    <label for="observation_request" class="form-label">Observación</label>
                    <textarea class="form-control" name="observation_request" id="for_observation_request" rows="3"></textarea>
                </fieldset>
            </div>

            <button type="submit" class="btn btn-primary float-right">Guardar <i class="fas fa-save"></i></button>
        </form>
        @endif

        @if($fqRequest->status == 'complete' || $fqRequest->status == 'rejected')
        <h6><i class="far fa-calendar-alt"></i> Atendido</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr class="text-center table-active">
                        <th style="width: 20%">Fecha Respuesta</th>
                        <th>Observación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $fqRequest->date_confirm->format('d-m-Y H:i:s') }}</td>
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
