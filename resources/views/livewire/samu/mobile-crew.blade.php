
   
            <div class="form-row"> 
                
                    <select class="col-md-5 ml-4 " wire:model='user_id' required="required">
                        <option value=""></option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->humanNames->last()->fullName }} </option>
                        @endforeach
                    </select>
                    @error('user_id') <span class="error">{{ $message }}</span> @enderror
                

                    <select class="col-md-5 ml-4 " wire:model="job_type_id">
                        <option value=""></option>
                        @foreach($job_types as $jt)
                        <option value="{{ $jt->id }}">{{ $jt->name }}</option>
                        @endforeach
                    </select>
                    @error('job_type_id') <span class="error">{{ $message }}</span> @enderror    
            


                
                    <button wire:click="store()" class="btn btn-sm btn-success ml-4 " ><i class="fas fa-plus"></i></button>
                

            </div>
            <div class="table-responsive col-md-12 mt-3">
     <table class="table table-sm table-bordered table-striped small">
        <tr class="text-center table-success">
            <th colspan="2">TRIPULACIÓN</th>
        </tr>
        <tr class="text-center">
            <th>Nombre</th>
            <th>Función</th>
        </tr>
        @foreach($mobileInService->crew as $tripulant)
        <tr>
     
        <td> {{ $tripulant->humanNames->last()->fullName }} </td>
        <td> {{ $tripulant->pivot->jobType->name }}</td>
      
        </tr>
        @endforeach
        <tr>
    </table>
</div>