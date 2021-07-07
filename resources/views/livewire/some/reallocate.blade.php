<div>
    <div class="form-row mt-3">

        <div class="form-group col-md-3">
            <label for="for_type">Tipo</label>
            <select id="for_type" name="type" class="form-control" wire:model.lazy="type" required
                    wire:change="getPractitioners()">
                <option></option>
                <option>Médico</option>
                <option>No médico</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            @if($specialties != null)
                <label for="for_specialty_id">Especialidad</label>
                <select id="for_specialty_id" name="specialty_id" class="form-control" wire:model.lazy="specialty_id"
                        wire:change="getPractitioners()"
                        required>
                    <option></option>
                    @foreach($specialties as $specialty)
                        <option value="{{$specialty->id}}">{{$specialty->specialty_name}}</option>
                    @endforeach
                </select>
            @endif

            @if($professions != null)
                <label for="for_profession_id">Profesión</label>
                <select id="for_profession_id" name="profession_id" class="form-control" wire:model.lazy="profession_id"
                        wire:change="getPractitioners"
                        required>
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

        <div class="form-group col-md-3">
            <label for="for_practitioner_id">Funcionario</label>
            <select id="for_practitioner_id" name="practitioner_id" class="form-control"
                    wire:model.lazy="practitioner_id" required>
                <option></option>
                @if($practitioners != null)
                    @foreach($practitioners as $practitioner)
                        <option value="{{$practitioner->id}}">{{$practitioner->user->OfficialFullName}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group col-md-2">
            <label for="inputEmail4">Fecha </label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Ingrese Fecha"
                   wire:model.lazy="selectedDateFrom">
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4">&nbsp;</label>
            <button type="button" class="btn btn-primary form-control" wire:click="getAppointments()">Buscar</button>
        </div>

    </div>
    <!--tabla doctor-->
    <div class="table-responsive">
        <table class="table table-sm table-hover">
            <thead>
            <tr class="table-info">
                <th scope="col">{{ ($selectedPractitioner) ? $selectedPractitioner->officialFullName : ''}}</th>
                <th scope="col">HORA</th>
                <th scope="col">USUARIO</th>
            </tr>
            </thead>

            <tbody>


            @if($appointments && $appointments->count() > 0)
                @foreach($appointments as $appointment)

                    <tr>
                        <th scope="row"></th>
                        <td>
                            <input class="form-check-input " type="checkbox" value="" id="invalidCheck2" required>
                            <label class="form-check-label" for="invalidCheck2">{{$appointment->start}}</label>
                        </td>
                        <td>
                            <input class="form-check-input " type="checkbox" value="" id="invalidCheck2" required>
                            <label class="form-check-label"
                                   for="invalidCheck2">{{$appointment->users->first()->officialFullName}}</label>

                        </td>

                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>
    <!--fin tabla doctor-->
    <div class="form-row">

        <div class="form-group col-md-10">
        </div>
        <div class="form-group col-md-2">
            <button type="button" class="btn btn-danger form-control">BLOQUEAR</button>
        </div>
    </div>

    <div class="form-row">

        <div class="form-group col-md-3">
            <label for="inputEmail4">Especialidad</label>
            <select id="inputState" class="form-control">
                <option selected>Traumatología</option>
                <option>Cardiología</option>
                <option>Ginecología</option>
                <option>Neurología</option>

            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmail4">Funcionario</label>
            <select id="inputState" class="form-control">
                <option selected>Macarena Lopez</option>
                <option>Daniel Suarez</option>
                <option>Jorge Miranda</option>
                <option>Maria Isabel Araya</option>
            </select>
        </div>
        <!--CHECK-->
        <div class="form-group col-md-2 mt-5 ml-4">

            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Proxima</label>
        </div>
        <!--CHECK-->

        <div class="form-group col-md-2">
            <label for="inputEmail4">Fecha </label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Ingrese Fecha">
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4">&nbsp;</label>
            <button type="button" class="btn btn-primary form-control">Buscar</button>
        </div>
    </div>
    <!--anterior,siguiente,traspasar-->
    <div class="form-row">

        <div class="form-group col-md-2">
            <button type="button" class="btn btn-outline-primary">ANTERIOR <<</button>

            </select>
        </div>
        <div class="form-group col-md-2">
            <button type="button" class="btn btn-outline-primary">SIGUIENTE >></button>
        </div>
        <div class="form-group col-md-6">
        </div>
        <div class="form-group col-md-2">
            <button type="button" class="btn btn-primary form-control">TRASPASAR</button>
        </div>


    </div>
    <!-- fin anterior,siguiente,traspasar-->


    <!--tabla agenda-->
    <div class="table-responsive">

        <table class="table table-sm table-hover">
            <thead>
            <tr class="table-info">
                <th scope="col">JUEVES 27 DE MAYO</th>
                <th scope="col">ESPECIALIDAD</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">CUPOS</th>
                <th scope="col">SOBRE CUPO</th>
                <th scope="col">ESTADO</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <th scope="row">Dra Macarena Lopez</th>
                <td>Neurología</td>
                <td>
                    <label class="form-check-label" for="invalidCheck2">8:00</label>
                </td>
                <td>
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                </td>
                <td>2</td>
                <td>1</td>
                <td>DISPONIBLE</td>


            </tr>
            <tr>
                <th scope="row">Dr. Daniel Suarez</th>
                <td>Neurología</td>
                <td></td>
                <td>
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2"></label>

                </td>
                <td>3</td>

                <td>0</td>
                <td>DISPONIBLE</td>

            </tr>
            <thead>
            <tr class="table-info">
                <th scope="col">VIERNES 28 DE MAYO</th>
                <th scope="col">ESPECIALIDAD</th>
                <th scope="col"></th>
                <th scope="col-md-1"></th>
                <th scope="col">CUPOS</th>
                <th scope="col">SOBRE CUPO</th>
                <th scope="col">ESTADO</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <th scope="row">Dr. Jorge Lopez</th>
                <td>Neurología</td>
                <td>
                    <label class="form-check-label" for="invalidCheck2">9:00</label>

                </td>
                <td>
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                </td>
                <td>3</td>
                <td>1</td>
                <td>DISPONIBLE</td>


            </tr>
            <tr>
                <th scope="row">Dr. Daniel Suarez</th>
                <td>Neurología</td>
                <td></td>
                <td>
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2"></label>

                </td>
                <td>3</td>
                <td>0</td>
                <td>DISPONIBLE</td>

            </tr>

            </tbody>
        </table>
    </div>
</div>
