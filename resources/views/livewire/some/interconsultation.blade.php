<div>
    <h3 class="mb-3">Interconsultas Externas</h3>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="for_specialty_id">Especialidad</label>
            @if($specialties != null)
                <select name="specialty_id" id="for_specialty_id" class="form-control" wire:model.lazy="specialty_id">
                    <option></option>
                    @foreach ($specialties as $specialty)
                        <option value="{{$specialty->id}}">{{$specialty->specialty_name}}</option>
                    @endforeach
                </select>
            @endif
        </div>

        <div class="form-group col-md-2">
            <label for="inputEmail4">Desde</label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Fecha inicio"
                   wire:model.lazy="appointments_from">
        </div>

        <div class="form-group col-md-2">
            <label for="inputEmail4">Hasta</label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Fecha fin"
                   wire:model.lazy="appointments_to">
        </div>
        <div class="form-group col-md-2">
            <label for="for_state">Estado</label>
            <select id="for_state" name="for_state" class="form-control" wire:model.lazy="state">
                <option></option>
                <option value='pendiente'>Pendiente</option>
                <option value='priorizadas'>Priorizadas</option>
                <option value='citadas'>Citadas</option>
                <option value='observadas'>Observadas</option>
                <option value='rechazadas'>Rechazadas</option>
            </select>
        </div>
        <fieldset class="form-group  col-md-4 mb-3">
            <button type="button" class="btn btn-primary button" wire:click="search"><i class="fas fa-search"></i>  Buscar</button>
        </fieldset>
    </div>

    <div class="table-responsive">
        <table class="table table-sm table-hover">
            <thead class="table-info">
            <tr>
                <th scope="col">Interconsulta</th>
                <th scope="col">Solicitud</th>
                <th scope="col">Tipo</th>
                <th scope="col">Urgencia</th>
                <th scope="col">RUN</th>
                <th scope="col">Nombre Paciente</th>
                <th scope="col">Nacimiento</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Origen</th>
                <th scope="col">Pertinencia</th>
                <th scope="col">Citar</th>
            </tr>
            </thead>
            <tbody>

            @foreach($sics as $sic)
                <tr>
                    <td>{{$sic->pciNumSic}}</td>
                    <td>{{$sic->pcdFechaSolic->format('d-m-Y')}}</td>
                    <td>{{$sic->pciIndMotivo}}</td>
                    <td>{{$sic->pcsIndUrgencia}}</td>
                    <td>{{"$sic->pciRutPac-$sic->pcsDigVerPac"}}</td>
                    <td>{{"$sic->pcsNombrePac $sic->pcsApellidoPat $sic->pcsApellidoMat"}}</td>
                    <td>{{$sic->pcdFechNacPac->format('d-m-Y')}}</td>
                    <td>{{$sic->pcsCodEspecDer}}</td>
                    <td>{{$sic->pcsCodEspecDer}}</td>
                    <td><a href="{{ route('vista.relevant') }}" class="btn btn-sm btn-outline-secondary"><span
                                class="fas fa-edit" aria-hidden="true"></span></a></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary "><i class="fas fa-file-alt"></i> Citar</button>
                    </td>
                </tr>
            @endforeach

            {{--            <tr>--}}
            {{--                <td>10932487</td>--}}
            {{--                <td>15/09/2021 12:44</td>--}}
            {{--                <td>LEC</td>--}}
            {{--                <td>293748</td>--}}
            {{--                <td>16350137-6</td>--}}
            {{--                <td>Álvaro Alex Lupa Huanca</td>--}}
            {{--                <td>29 Años</td>--}}
            {{--                <td>MEDICINA FAMILIAR ADULTO</td>--}}
            {{--                <td>Cesfam Cirujano Aguirre</td>--}}
            {{--                <td>20/09/2021 16:44</td>--}}
            {{--                <td><a href="{{ route('vista.relevant') }}"class="btn btn-sm btn-outline-secondary"><span class="fas fa-edit" aria-hidden="true"></span></a></td>--}}
            {{--                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <td>10532487</td>--}}
            {{--                <td>10/09/2021 17:14</td>--}}
            {{--                <td>LEC</td>--}}
            {{--                <td>096451</td>--}}
            {{--                <td>9945878-k</td>--}}
            {{--                <td>Alice Antonieta Hernández Zamorano</td>--}}
            {{--                <td>56 Años</td>--}}
            {{--                <td>MEDICINA FAMILIAR ADULTO</td>--}}
            {{--                <td>Cesfam Cirujano Aguirre</td>--}}
            {{--                <td>15/09/2021 12:44</td>--}}
            {{--                <td><a href="{{ route('vista.relevant') }}"class="btn btn-sm btn-outline-secondary"><span class="fas fa-edit" aria-hidden="true"></span></a></td>--}}
            {{--                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>--}}
            {{--            </tr><tr>--}}
            {{--                <td>10654657</td>--}}
            {{--                <td>09/09/2021 10:43</td>--}}
            {{--                <td>LEC</td>--}}
            {{--                <td>873265</td>--}}
            {{--                <td>21253269-k</td>--}}
            {{--                <td>Alondra Zambra Sanchez</td>--}}
            {{--                <td>19 Años</td>--}}
            {{--                <td>MEDICINA FAMILIAR ADULTO</td>--}}
            {{--                <td>Cesfam Cirujano Aguirre</td>--}}
            {{--                <td>11/09/2021 11:44</td>--}}
            {{--                <td><a href="{{ route('vista.relevant') }}"class="btn btn-sm btn-outline-secondary"><span class="fas fa-edit" aria-hidden="true"></span></a></td>--}}
            {{--                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>--}}
            {{--            </tr><tr>--}}
            {{--                <td>10939876</td>--}}
            {{--                <td>07/09/2021 09:44</td>--}}
            {{--                <td>LEC</td>--}}
            {{--                <td>762398</td>--}}
            {{--                <td>15.004.481-2</td>--}}
            {{--                <td>Ana Inés Henríquez Campos</td>--}}
            {{--                <td>39 Años</td>--}}
            {{--                <td>MEDICINA FAMILIAR ADULTO</td>--}}
            {{--                <td>Cesfam Cirujano Aguirre</td>--}}
            {{--                <td>09/09/2021 09:44</td>--}}
            {{--                <td><a href="{{ route('vista.relevant') }}"class="btn btn-sm btn-outline-secondary"><span class="fas fa-edit" aria-hidden="true"></span></a></td>--}}
            {{--                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>--}}
            {{--            </tr><tr>--}}
            {{--                <td>10930913</td>--}}
            {{--                <td>10/09/2021 16:47</td>--}}
            {{--                <td>LEC</td>--}}
            {{--                <td>658709</td>--}}
            {{--                <td>16182752-5</td>--}}
            {{--                <td>Dominique Francoise Larroucau Salas</td>--}}
            {{--                <td>35 Años</td>--}}
            {{--                <td>MEDICINA FAMILIAR ADULTO</td>--}}
            {{--                <td>Cesfam Cirujano Aguirre</td>--}}
            {{--                <td>13/09/2021 13:44</td>--}}
            {{--                <td><a href="{{ route('vista.relevant') }}"class="btn btn-sm btn-outline-secondary"><span class="fas fa-edit" aria-hidden="true"></span></a></td>--}}
            {{--                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <td>10876487</td>--}}
            {{--                <td>13/09/2021 11:11</td>--}}
            {{--                <td>LEC</td>--}}
            {{--                <td>124576</td>--}}
            {{--                <td>15501493-8</td>--}}
            {{--                <td>Eduardo Andrés Galleguillos Pardo</td>--}}
            {{--                <td>38 Años</td>--}}
            {{--                <td>MEDICINA FAMILIAR ADULTO</td>--}}
            {{--                <td>Cesfam Cirujano Aguirre</td>--}}
            {{--                <td>16/09/2021 16:04</td>--}}
            {{--                <td><a href="{{ route('vista.relevant') }}"class="btn btn-sm btn-outline-secondary"><span class="fas fa-edit" aria-hidden="true"></span></a></td>--}}
            {{--                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>--}}
            {{--            </tr>--}}
            {{--            <tr>--}}
            {{--                <td>10542376</td>--}}
            {{--                <td>13/09/2021 13:12</td>--}}
            {{--                <td>LEC</td>--}}
            {{--                <td>658709</td>--}}
            {{--                <td>12895491-0</td>--}}
            {{--                <td>Eliecer Antonio Fuentes Díaz</td>--}}
            {{--                <td>46 Años</td>--}}
            {{--                <td>MEDICINA FAMILIAR ADULTO</td>--}}
            {{--                <td>Cesfam Cirujano Aguirre</td>--}}
            {{--                <td>16/09/2021 14:41</td>--}}
            {{--                <td><a href="{{ route('vista.relevant') }}"class="btn btn-sm btn-outline-secondary"><span class="fas fa-edit" aria-hidden="true"></span></a></td>--}}
            {{--                <td class="text-center"><button type="button" class="btn btn-primary ">Citar</button></td>--}}
            {{--            </tr>--}}

            </tbody>
        </table>
    </div>

</div>

<!-- <table class="table table-sm table-hover">
        <thead class="table-info">
        <tr>
            <th scope="col">Interconsulta</th>
            <th scope="col">Solicitud</th>
        </tr>
        </thead>
    </table>
</div> -->


<!--
        <fieldset class="form-group col">
            <label for="for_name">Nombre Locación</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="name" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_alias">Alias</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="alias" required>
        </fieldset>
    </div>

    -->

