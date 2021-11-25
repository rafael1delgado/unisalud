<div class="form-row"> 
    <div class="col-6">            
        <select class="form-control" wire:model='user_id' required="required">
            <option value=""></option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->humanNames->last()->fullName }} </option>
            @endforeach
        </select>
        @error('user_id') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="col-5">
        <select class="form-control" wire:model="job_type_id">
            <option value=""></option>
            @foreach($job_types as $jt)
            <option value="{{ $jt->id }}">{{ $jt->name }}</option>
            @endforeach
        </select>
        @error('job_type_id') <span class="error">{{ $message }}</span> @enderror    
    </div>
    <div class="col-1">
        <button wire:click="store()" class="btn btn-success"><i class="fas fa-plus"></i></button>
    </div>
</div>

@foreach($mobileInService->crew as $tripulant)
<div class="form-row m-1">
    <div class="col-6">
        <li>
            {{ $tripulant->humanNames->last()->fullName }}
        </li>
    </div>
    <div class="col-5">
        {{ $tripulant->pivot->jobType->name }}
    </div>
    <div class="col-1">
        <button class="btn btn-danger mx-2" wire:click="delete({{ $tripulant }})"><i class="fas fa-trash"></i></button>
    </div>
</div>
@endforeach
    
