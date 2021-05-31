<!-- Modal -->
<div class="modal fade" id="exampleModal-{{ $fqRequest->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <h6><i class="fas fa-inbox"></i> Solicitud</h6>
          <div class="table-responsive">
              <table class="table table-sm table-bordered">
                  <thead>
                      <tr class="text-center table-active">
                          <th style="width: 20%">Fecha Solicitud</th>
                          <th>Estado</th>
                          <th>Motivo</th>
                          <th>Obseravación Paciente</th>
                          <th>Nombre</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>{{ $fqRequest->created_at->format('d-m-Y H:i:s') }}</td>
                          <td>{{ $fqRequest->StatusValue }}</td>
                          <td>{{ $fqRequest->NameValue }}</td>
                          <td>{{ $fqRequest->observation_patient }}</td>
                          <td>{{ $fqRequest->contactUser->FullName }}</td>
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
                          <td colspan="2">
                              {{ $fqRequest->patient->RunFormat }}
                          </td>
                      </tr>
                      <tr>
                          <th class="table-active">Nombre</th>
                          <td colspan="2">
                              {{ $fqRequest->patient->FullName }}
                          </td>
                      </tr>
                      <tr>
                          <th class="table-active">Nº Ficha</th>
                          <td colspan="2">
                              {{ $fqRequest->patient->clinical_history_number }}
                          </td>
                      </tr>
                      <tr>
                          <th class="table-active">Teléfono</th>
                          <td style="width: 40%">
                              {{ $fqRequest->patient->telephone }}
                          </td>
                          <td style="width: 40%">
                              {{ $fqRequest->patient->telephone2 }}
                          </td>
                      </tr>
                      <tr>
                          <th class="table-active">Correo electrónico</th>
                          <td colspan="2">
                              {{ $fqRequest->patient->email }}
                          </td>
                      </tr>
                      <tr>
                          <th class="table-active">Dirección</th>
                          <td>
                              {{ $fqRequest->patient->address }}
                          </td>
                          <td>
                              {{ $fqRequest->patient->commune }}
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>

          @if($fqRequest->status == 'pending' && (Gate::check('Fq: Answer request') || Gate::check('Fq: Answer request medicines')))
          <form method="POST" class="form-horizontal" action="{{ route('fq.request.update', $fqRequest) }}">
              @csrf
              @method('PUT')
              <div class="form-row">
                  <fieldset class="form-group col-sm-3">
                      <label for="for_date_confirm">Fecha de confirmación</label>
                      <input type="datetime-local" class="form-control" name="date_confirm" id="date_confirm" required>
                  </fieldset>
                  <fieldset class="form-group col-sm-9">
                      <label for="for_observation_request">Observación</label>
                      <input type="text" class="form-control" name="observation_request" id="observation_request">
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
