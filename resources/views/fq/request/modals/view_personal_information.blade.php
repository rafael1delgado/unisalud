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
          <div class="table-responsive">
              <table class="table table-sm table-bordered table-nostriped">
                  <tbody>
                      <tr>
                          <th class="table-active" style="width: 20%">RUN</th>
                          <td colspan="4" style="width: 30%">
                              {{ $contactUser->user->IdentifierRun->value }}-
                              {{ $contactUser->user->IdentifierRun->dv }}
                          </td>
                      </tr>
                      <tr>
                          <th class="table-active">Nombre</th>
                          <td colspan="4">
                              {{-- $fqRequest->patient->officialFullName --}}
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

                          </td>
                      </tr>
                      <tr>
                          <th class="table-active">Correo electrónico</th>
                          <td colspan="4">

                          </td>
                      </tr>
                      <tr>
                          <th class="table-active">Dirección</th>
                          <td>

                          </td>
                          <th class="table-active" style="width: 10%">Departamento</th>
                          <td style="width: 20%">

                          </td>
                          <td style="width: 20%">

                          </td>
                      </tr>
                      <tr>
                          <th class="table-active">Comuna</th>
                          <td colspan="4">

                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>

@section('custom_js')

@endsection
