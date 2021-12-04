<div>
@if($shift->status == true)
<div class="form-row">
    <div class="col-6">
        <select class="form-control" wire:model='user_id' required="required">
            <option value=""></option>
            @foreach($users as $key => $user)
            <option value="{{ $key }}">{{ $user }} </option>
            @endforeach
        </select>
        @error('user_id') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="col-5">
        <select class="form-control"  wire:model="job_type_id">
            <option value=""></option>
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
       
    
@foreach($shift_users as $su)
<div class="form-row m-1">
    <div class="col-6">
        <li>
            {{ $su->user->officialFullName }}
        </li>
        
    </div>
    <div class="col-5">
        {{ $su->jobType->name }}
    </div>
    <div class="col-1">
        @if($su->shift->status == true)
        <button class="btn btn-danger mx-2" wire:click="delete({{ $su }})"><i class="fas fa-trash"></i></button>
        @endif
    </div>
</div>
@endforeach
</div>