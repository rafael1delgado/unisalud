<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\User;
use App\Models\Samu\JobType;
use App\Models\Samu\MobileInService;
use App\Models\Samu\MobileCrew as MobileCrewModel;

class MobileCrew extends Component
{
    //public $mobil;
    public $users;
    public $mobileInService;

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
     
        $this->validate();

        $mobileCrew = MobileCrewModel::create([
            'mobiles_in_service_id' => $this->mobileInService->id,
            'user_id'               => $this->user_id,
            'job_type_id'           => $this->job_type_id
        ]);
       
        redirect()->to(route('samu.mobileinservice.index'));
    }

    public function delete(MobileCrewModel $mobileCrew)
    {
        debug('aca');
        //$mobileCrew->delete();
    }

    public function render()
    {
        //$this->pivot      = MobileInService::where('id',$this->pivot->id)->get();
        $users              = User::Permission('SAMU')->get();
        foreach($users as $user) 
        {
            $this->users[$user->id] = $user->OfficialFullName;
        }
        sort($this->users);
        $this->job_types    = JobType::where('tripulant', true)->orderBy('name')->get();
        return view('livewire.samu.mobile-crew');
    }
}
