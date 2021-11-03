<div>
    <h6>Tripulacion</h6>
    @foreach($pivot->crew as $tripulant)
        <li>Nombre: {{ $tripulant->humanNames->last()->fullName }} 
            Función: {{ $tripulant->pivot->job_type_id }}</li>
    @endforeach

    <select wire:model='user_id' required="required">
        <option value=""></option>
        @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->humanNames->last()->fullName }} </option>
        @endforeach
    </select>
    @error('user_id') <span class="error">{{ $message }}</span> @enderror

    <select wire:model="job_type_id">
        <option value=""></option>
        @foreach($job_types as $jt)
        <option value="{{ $jt->id }}">{{ $jt->name }}</option>
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
