<div class="modal fade" id="showNameHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Historial de nombres</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead class="table-info">
                            <tr>
                                <th scope="col">Nombre:</th>
                                <th scope="col">Fecha vigencia:</th>
                            </thead>
                            <tbody>
                            @foreach($patient->humanNames as $humanName)
                                <tr>
                                    <td>{{$humanName->fullName}}</td>
                                    <td>{{$humanName->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
