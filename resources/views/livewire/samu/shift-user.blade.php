<div>
@if($shift->status == true)
<div class="form-row">
    <div class="col-6">
        <select class="form-control" wire:model='user_id' required="required">
            <option value="">Selecciona un usuario</option>
            @foreach($users as $user => $id)
            <!-- TODO: #62 Pasar a mayúscula @AquaroTorres --> 
            <option value="{{ $id }}">{{ strtoupper($user) }}</option>
            @endforeach
        </select>
        @error('user_id') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="col-5">
        <select class="form-control"  wire:model="job_type_id">
            <option value="">Selecciona un tipo de trabajador</option>
            @foreach($job_types as $jt)
            <option value="{{ $jt->id }}">{{ $jt->name }}</option>
            @endforeach
        </select>
        @error('job_type_id') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="col-1">
        <button class="btn btn-success" wire:click="store()"><i class="fas fa-plus"></i></button>
    </div>
</div>
@endif
       
    
@foreach($shift->users as $user)
<div class="form-row m-1">
    <div class="col-6 nowrap">
        <li>
            @if($shift->status == true)
            <button class="btn btn-danger btn-sm" wire:click="delete({{$user->pivot->id}})"><i class="fas fa-trash"></i></button>
            @endif
            {{ $user->officialFullName }}
        </li>
    </div>
    <div class="col-5">
        {{ $user->pivot->jobType->name }}
    </div>
    <div class="col-1">

    </div>
</div>
@endforeach
</div>