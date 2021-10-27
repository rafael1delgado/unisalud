      
    <div class="form-row"> 
          
       
            <select class="col-md-5 ml-4" wire:model='user_id' required="required">
                <option value=""></option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->humanNames->last()->fullName }} </option>
                @endforeach
            </select>
            @error('user_id') <span class="error">{{ $message }}</span> @enderror
        

            <select class="col-md-5 ml-4"  wire:model="job_type_id">
                <option value=""></option>
                @foreach($job_types as $jt)
                <option value="{{ $jt->id }}">{{ $jt->name }}</option>
                @endforeach
            </select>
            @error('job_type_id') <span class="error">{{ $message }}</span> @enderror
    
            <button class="btn btn-sm btn-success ml-4 " wire:click="store()"><i class="fas fa-plus"></i></button>
    
    </div>

    <div class="table-responsive col-md-12 mt-3">
     <table class="table table-sm table-bordered table-striped small">
        <tr class="text-center table-success">
            <th>FUNCIONARIO</th>
            <th>FUNCIÓN</th>
            <th>ELIMINAR</th>
        </tr>
        @foreach($shift_users as $su)
        <tr>
            <td>{{ $su->user->humanNames->last()->fullName }}</td>
            <td>{{ $su->jobType->name }}</td>
            <td class="text-center">
                <button class="btn btn-sm btn-danger mx-1" wire:click="delete({{ $su }})"><i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
 