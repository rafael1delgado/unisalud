<div>
    <div class="form-row mt-3">

        <div class="form-group col-md-4">
            <label for="inputrut">RUT</label>
            <input type="text" class="form-control"  placeholder="Ingrese el rut" wire:model="run">
        </div>
        <div class="form-group col-md-1">
            <label for="inputdv">Dv</label>
            <input type="text" class="form-control"  placeholder="Dv">
        </div>
        <div class="form-group col-md-5">
            <label for="inputnombre">Nombre</label>
            <input type="text" class="form-control"  placeholder="Ingrese Nombre">
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">&nbsp;</label>
            <button type="button" class="btn btn-primary form-control" wire:click="searchUser()">Buscar</button>
        </div>
    </div>

    <div class="form-row mt-3">
        <div class="form-group col-md-6">
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead class="table-info">
                    <tr>
                        <th scope="col">Nombre:</th>
                        <th scope="col">{{ ($user) ? $user->officialFullName : '' }}</th>

                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Identificación</th>
                        <td>{{($user) ? $user->identifierRun->value . '-' . $user->identifierRun->dv : ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Edad</th>
                        <td>{{($user) ? \Carbon\Carbon::parse($user->birthday)->age .' años' : ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Sexo</th>
                        <td colspan="2"> {{($user) ? $user->sex : '' }} </td>
                    </tr>

                    <tr>
                        <th scope="row">Dirección</th>
                        <td colspan="2"> {{($user) ? $user->officialFullAddress : ''}}  </td>
                    </tr>

                    <tr>
                        <th scope="row">Teléfono</th>
                        <td colspan="2">{{($user) ? $user->officialPhone : ''}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Correo</th>
                        <td colspan="2">{{($user && $user->officialEmail) ? $user->officialEmail : ''}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="form-group col-md-6">
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead class="table-info">

                    <tr>
                        <th scope="col">HISTORIAL DE CITAS MÉDICAS</th>
                        <th scope="col"></th>

                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">25-03-2021</th>
                        <td>08:00-Traumatología</td>

                    </tr>

                    <tr>
                        <th scope="row">22-04-2021</th>
                        <td>10:00-Traumatología</td>
                    </tr>

                    <tr>
                        <th scope="row">03-05-2021</th>
                        <td colspan="2">08:00-Neurología</td>
                    </tr>

                    <tr>
                        <th scope="row">10-05-2021</th>
                        <td colspan="2">10:00-Traumatología</td>
                    </tr>

                    <tr>
                        <th scope="row">26-05-2021</th>
                        <td colspan="2">11:30-Neurología</td>
                    </tr>

                    <tr>
                        <th scope="row">29-05-2021</th>
                        <td colspan="2">13:30-Cardiología</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
