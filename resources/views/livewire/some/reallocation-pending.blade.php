<div>
    <div class="row mt-3">
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Identificación</th>
                <th>Especialidad</th>
                <th>Diagnóstico</th>
                <th>N° Interconsulta</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @if($appointments)
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{$appointment->users->first()->officialFullName}}</td>
                        <td>{{$appointment->users->first()->identifierRun->value}}</td>
                        <td>{{$appointment->theoreticalProgramming->specialty->specialty_name}}</td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"
                                    data-whatever="@getbootstrap"><i class="fas fa-edit"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Antecedentes de egreso de lista de espera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="form-group col-9">
                                <label for="recipient-name" class="col-form-label">Diagnóstico:</label>
                                <input type="text" class="form-control" id="recipient-name"
                                       value="Hipertención Arterial">
                            </div>
                            <div class="form-group col-3">
                                <label for="message-text" class="col-form-label">CIE10:</label>
                                <input type="text" class="form-control" id="recipient-name" value="X20">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-3">
                                <label for="recipient-name" class="col-form-label">N° citación:</label>
                                <input type="text" class="form-control" id="recipient-name" value="10">
                            </div>
                            <div class="form-group col-6">
                                <label for="message-text" class="col-form-label">Fecha:</label>
                                <input type="date" class="form-control" id="recipient-name" value="2021-05-21">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-7">
                                <label for="recipient-name" class="col-form-label">Profesional:</label>
                                <input type="text" class="form-control" id="recipient-name" value="Dr. Alvaro Torres">
                            </div>
                            <div class="form-group col-5">
                                <label for="message-text" class="col-form-label">Estado citacion:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="message-text" class="col-form-label">Estado registro:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group col-6">
                                <label for="recipient-name" class="col-form-label">Egreso:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="message-text" class="col-form-label">Motivo de:</label>
                                <select class="form-control">
                                    <option>Procedimiento informado</option>
                                    <option>Atención otorgada</option>
                                    <option>Fallecimiento</option>
                                    <option>Renuncia o rechazo voluntario</option>
                                </select>

                            </div>
                            <div class="form-group col-6">
                                <label for="message-text" class="col-form-label">Especialdiad:</label>
                                <input type="text" class="form-control" id="recipient-name" value="Traumatología">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Egresar</button>
                </div>
            </div>
        </div>
    </div>
</div>
