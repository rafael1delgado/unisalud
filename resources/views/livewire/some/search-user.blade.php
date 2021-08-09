<div wire:ignore.self class="modal fade" id="searchUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Búsqueda de pacientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="inputnombre">&nbsp;</label>
                        <input type="text" class="form-control" placeholder="Nombre o identificador" wire:model.lazy="searchText">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputEmail4">&nbsp;</label>
                        <button type="button" class="btn btn-primary form-control" wire:click="search()"> <i class="fa fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">

                        <table class="table table-sm table-hover">
                            <thead class="table-info">
                            <tr>
                                <th scope="col">Nombre:</th>
                                <th scope="col">Indentificación</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Selec.</th>

                            </thead>
                            <tbody>
                            @if($users)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ ($user) ? $user->officialFullName : '' }}</td>
                                        <td>{{($user) ? $user->identifierRun->value . '-' . $user->identifierRun->dv : ''}}</td>
                                        <td>{{($user) ? \Carbon\Carbon::parse($user->birthday)->age .' años' : ''}}</td>
                                        <td>{{($user) ? $user->sex : '' }}</td>
                                        <td>{{($user) ? $user->officialFullAddress : ''}}</td>
                                        <td>{{($user) ? $user->officialPhone : ''}}</td>
                                        <td>{{($user && $user->officialEmail) ? $user->officialEmail : ''}}</td>
                                        <td><button type="button" class="btn-primary btn-sm" wire:click="selectUser({{$user->id}})" data-dismiss="modal"> <i class="fas fa-check"></i> </button></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> faclose Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
