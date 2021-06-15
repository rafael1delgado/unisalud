<div>
    <div class="form-row mt-3">

        <div class="form-group col-md-4">
            <label for="inputrut">RUT</label>
            <input type="text" class="form-control" placeholder="Ingrese el rut" wire:model="run">
        </div>
        <div class="form-group col-md-1">
            <label for="inputdv">Dv</label>
            <input type="text" class="form-control" placeholder="Dv">
        </div>
        <div class="form-group col-md-5">
            <label for="inputnombre">Nombre</label>
            <input type="text" class="form-control" placeholder="Ingrese Nombre">
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


    <hr class="mt-3 mb-3">
    <div class="form-row">

        <div class="form-group col-md-5">
            <label for="inputEmail4">Prevision</label>
            <select id="inputState" class="form-control">
                <option selected>Fonasa</option>
                <option>Isapre</option>
            </select>
        </div>
        <div class="form-group col-md-5">
            <label for="inputEmail4">Tramo</label>
            <select id="inputState" class="form-control">
                <option selected>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">&nbsp;</label>
            <button type="button" class="btn btn-primary form-control">Fonasa</button>
        </div>

    </div>

    <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="for_type">Tipo</label>
                    <select id="for_type" name="type" class="form-control" wire:model.lazy="type" required>
                        <option></option>
                        <option>Médico</option>
                        <option>No médico</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    @if($specialties != null)
                        <label for="for_specialty_id">Especialidad</label>
                        <select id="for_specialty_id" name="specialty_id" class="form-control" wire:model.lazy="specialty_id" required>
                            <option></option>
                            @foreach($specialties as $specialty)
                                <option value="{{$specialty->id}}">{{$specialty->specialty_name}}</option>
                            @endforeach
                        </select>
                    @endif

                    @if($professions != null)
                        <label for="for_profession_id">Profesión</label>
                        <select id="for_profession_id" name="profession_id" class="form-control" wire:model.lazy="profession_id" required>
                            <option></option>
                            @foreach($professions as $profession)
                                <option value="{{$profession->id}}">{{$profession->profession_name}}</option>
                            @endforeach
                        </select>
                    @endif

                    @if($specialties == null && $professions == null)
                        <label for="for_profession_id">&nbsp;</label>
                        <select class="form-control">
                            <option></option>
                        </select>
                    @endif

                </div>

                <div class="form-group col-md-4">
                    <label for="for_practitioner_id">Funcionario</label>
                    <select id="for_practitioner_id" name="practitioner_id" class="form-control" wire:model.lazy="practitioner_id" required>
                        <option></option>
                        @if($practitioners != null)
                            @foreach($practitioners as $practitioner)
                                <option value="{{$practitioner->id}}">{{$practitioner->user->OfficialFullName}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>


    </div>

    <div class="form-row">

        <div class="form-group col-md-1">
            <label for="imputBool">Codigo</label>
            <input type="bool" class="form-control" id="inputBool" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="imputBool">Prestación</label>
            <input type="bool" class="form-control" id="inputBool" placeholder="">
        </div>
        <div class="form-group col-md-2">
            <label for="imputNumeric">Número de Interconsulta</label>
            <input type="numeric" class="form-control" id="inputNumeric" placeholder="">
        </div>
        <div class="form-group col-md-3">
            <label for="inputDate">Fecha de Interconsulta</label>
            <input type="date" class="form-control" id="inputDate" placeholder="Fecha de interconsulta">
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">Procedencia</label>
            <select id="inputState" class="form-control">
                <option selected>Cesfam Videla</option>
                <option>Cesfam Aguirre</option>
                <option>Cesfam Guzmán</option>
                <option>Cesfam Sur</option>
            </select>
        </div>
    </div>

    <div class="form-row">

        <fieldset class="form-group col-4">
            <label></label>
            <div class="form-group mt-1 ml-4">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Proxima Fecha Disponible
                </label>
            </div>
        </fieldset>


        <div class="form-group col-md-3">
            <label for="inputEmail4">Desde</label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Fecha inicio">
        </div>

        <div class="form-group col-md-3">
            <label for="inputEmail4">Hasta</label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Fecha fin">
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">&nbsp;</label>
            <button type="button" class="btn btn-primary form-control" wire:click="searchAppointments()">Buscar</button>
        </div>

    </div>
    <!--opcion asignar-->

    <div class="form-row ">
        <div class="form-group col-md-2">
            <label for="inputAsignar">&nbsp;</label>
            <button type="button" class="btn btn-primary form-control" wire:click="asignAppointment()">Asignar</button>
        </div>
    </div>
    <!-- fin opcion asignar-->
    <!--inicio tabla profesionales-->
    <div class="table-responsive">
        <table class="table table-sm table-hover">
            <thead class="table-info">
            <tr>
                <th scope="col">Profesional</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Subespecialidad</th>
                <th scope="col">Hora</th>
{{--                <th scope="col">Cupo</th>--}}
{{--                <th scope="col">Sobre Cupo</th>--}}
                <th scope="col">Estado</th>
            </tr>
            </thead>
            <tbody>
            @if($appointments)

                @foreach($appointments as $key => $appointment)
                    <tr>
                        <td>
                            <input class="form-check-input " type="checkbox" value="{{$appointment->id}}" name="selectedAppointments[{{$key}}]" wire:model="selectedAppointments" required>
                            <label class="form-check-label" for="invalidCheck2">{{$appointment->theoreticalProgramming->User->officialFullName}}</label>
                        </td>

                        <td>{{$appointment->theoreticalProgramming->activity->activity_name}}</td>
                        <td>{{($appointment->theoreticalProgramming->subactivity) ? $appointment->theoreticalProgramming->subactivity->sub_activity_name : ''}}</td>
                        <td>{{$appointment->start}}</td>
{{--                        <td>3</td>--}}
{{--                        <td>2</td>--}}
                        <td>{{$appointment->status}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <hr class="mt-3">

</div>
