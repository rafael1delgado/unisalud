<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\User;
use App\Models\Samu\ShiftUser as ShiftUserModel;
use App\Models\Samu\JobType;

class ShiftUser extends Component
{
    public $users;
    public $shift_users;
    public $job_types;
    
    public $user_id;
    public $job_type_id;
    public $shift_id;

    protected $rules = [
        'user_id'       => 'required',
        'job_type_id'   => 'required',
    ];

    protected $messages = [
        'user_id.required'      => 'Debe selecionar un usuario',
        'job_type_id.required'  => 'Debe seleccionar una función',
    ];

    public function store()
    {
        $this->validate();

        $shift_user = ShiftUserModel::create([
            'user_id'       => $this->user_id,
            'job_type_id'   => $this->job_type_id,
            'shift_id'      => $this->shift_id
        ]);

        redirect()->to(route('samu.shift.index'));
    }

    public function delete(ShiftUserModel $shiftUser)
    {
        $shiftUser->delete();
    }

    public function render()
    {
        $this->shift_users  = ShiftUserModel::where('shift_id',$this->shift_id)->get();
        $this->users        = User::Permission('SAMU')->get();
        $this->job_types    = JobType::all();
        return view('livewire.samu.shift-user');
    }
}
