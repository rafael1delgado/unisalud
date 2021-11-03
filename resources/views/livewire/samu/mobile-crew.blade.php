<div class="table-responsive col-md-12 mt-3">
    <table class="table table-sm table-bordered table-striped small">
        <tr class="text-center table-success">
            <th colspan="2">Tripulacion</th>
        </tr>
        <tr class="text-center">
            <th>Nombre</th>
            <th>Función</th>
        </tr>
        @foreach($pivot->crew as $tripulant)
        <tr>     
            <td> {{ $tripulant->humanNames->last()->fullName }}</td>
            <td> {{ $tripulant->pivot->job_type_id }}</td>
        </tr>
        @endforeach
        <tr>
            <div class="form-row"> 
                <fieldset class="form-group  col-md-5">
                <label>Nombre</label>
                    <select class="form-control" wire:model='user_id' required="required">
                        <option value=""></option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->humanNames->last()->fullName }} </option>
                        @endforeach
                    </select>
                    </fieldset>
                    @error('user_id') <span class="error">{{ $message }}</span> @enderror
              

                <fieldset class="form-group  col-md-5">
                    <label>Función</label>
                    <select class="form-control" wire:model="job_type_id">
                        <option value=""></option>
                        @foreach($job_types as $jt)
                        <option value="{{ $jt->id }}">{{ $jt->name }}</option>
                        @endforeach
                    </select>
                    </fieldset>
                    @error('job_type_id') <span class="error">{{ $message }}</span> @enderror
             
                <fieldset class="form-group  col-md-2 mt-4">
                    <button wire:click="store()" class="btn btn-primary button mt-1">Guardar</button>
                </fieldset>
            </div>
        </tr>
    </table>
</div>
