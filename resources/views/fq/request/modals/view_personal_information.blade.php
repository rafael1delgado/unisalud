<style>
  .table-nostriped tbody tr:nth-of-type(odd) {
    background-color:transparent;
  }
</style>

<!-- Modal -->
<div class="modal fade" id="viewPersonalInformatioModal" tabindex="-1" aria-labelledby="viewPersonalInformatioModallLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewPersonalInformatioModal">Mis Datos de Contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card">
              <div class="card-body">
                  <h6><i class="fas fa-user"></i> Datos Personales</h6>
                  <table class="table table-sm table-nostriped">
                      <tbody>
                          <tr>
                              <th class="table-active" style="width: 20%">RUN</th>
                              <td colspan="4">
                                  {{ $contactUser->user->IdentifierRun->value }}-
                                  {{ $contactUser->user->IdentifierRun->dv }}
                              </td>
                          </tr>
                          <tr>
                              <th class="table-active">Nombre</th>
                              <td colspan="4">
                                  {{ $contactUser->user->officialFullName }}
                              </td>
                          </tr>
                          <tr>
                              <th class="table-active">Nº Ficha</th>
                              <td colspan="4">
                                  {{-- $fqRequest->patient->clinical_history_number --}}
                              </td>
                          </tr>
                      </tbody>
                  </table>
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
                                @foreach($contactUser->user->contactPoints->where('system', 'phone') as $contactPoint)
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
                                @foreach($contactUser->user->contactPoints->where('system', 'email') as $contactPoint)
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
                          @foreach($contactUser->user->addresses as $address)
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
      </div>
    </div>
  </div>
</div>

@section('custom_js')

@endsection
