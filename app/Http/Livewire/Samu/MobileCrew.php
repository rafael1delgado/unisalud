<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\User;
use App\Models\Samu\JobType;
use App\Models\Samu\MobileCrew as MobileCrewModel;

class MobileCrew extends Component
{
    //public $mobil;
    public $users;
    public $pivot;

    public $user_id;
    public $job_type_id;

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
        debug('hola');
        $this->validate();

        $shift_user = MobileCrewModel::create([
            'mobiles_in_service_id' => $this->pivot->id,
            'user_id'               => $this->user_id,
            'job_type_id'           => $this->job_type_id
        ]);
       
        redirect()->to(route('samu.mobileinservice.index'));
    }

    public function delete(MobileCrewModel $mobileCrew)
    {
        $mobileCrew->delete();
    }

    public function render()
    {
        $this->users        = User::Permission('SAMU')->get();
        $this->job_types    = JobType::all();
        return view('livewire.samu.mobile-crew');
    }
}
