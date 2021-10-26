<div>
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

    <table>
        <tr>
            <th>Función</th>
            <th>Funcionario</th>
            <th></th>
        </tr>
        @foreach($shift_users as $su)
        <tr>
            <td>{{ $su->jobType->name }}</td>
            <td>{{ $su->user->humanNames->last()->fullName }}</td>
            <td>
                <button wire:click="delete({{ $su }})">Eliminar</button>
            </td>
        </tr>
        @endforeach
    </table>
</div>
