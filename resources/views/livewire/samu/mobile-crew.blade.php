<div>
    <h6>Tripulacion</h6>
    @foreach($pivot->crew as $tripulant)
        <li>Nombre: {{ $tripulant->humanNames->last()->fullName }} Función: {{ $tripulant->pivot->job_type_id }}</li>
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
    </select>
    @error('job_type_id') <span class="error">{{ $message }}</span> @enderror


    <button wire:click="store()">Guardar</button>
</div>
