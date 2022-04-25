<div class="modal fade" id="showSexHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Historial de cambios de sexo</h5>
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
                                <th scope="col">Sexo:</th>
                                <th scope="col">Inicio vigencia:</th>
                                <th scope="col">Fin vigencia:</th>
                            </thead>
                            <tbody>
                            @foreach($patient->sexes as $sex)
                                <tr>
                                    <td>{{$sex->text}}</td>
                                    <td>{{$sex->pivot->valid_from}}</td>
                                    <td>{{$sex->pivot->valid_to}}</td>
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
