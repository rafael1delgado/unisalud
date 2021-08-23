<?php

namespace App\Http\Livewire\Absence;

use App\Models\MedicalProgrammer\Contract;
use App\Models\Organization;
use App\Models\Practitioner;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class AsignUserInputsForm extends Component
{

    public $run;
    public $dv;
    public $user;
    public $user_id;
    public $name;
    public $fathers_family;
    public $mothers_family;
    public $sex;
    public $age;
    public $months;
    public $contracts = [];
    public $contract_id;
    public $law;
    public $organizations = [];
    public $organization_id;
    public $practitioners = [];
    public $practitioner_id;

    public function searchUser()
    {
        $this->reset(['dv', 'user', 'user_id', 'name', 'fathers_family', 'mothers_family', 'sex', 'age', 'months', 'contracts', 'contract_id', 'law', 'organizations', 'organization_id', 'practitioners', 'practitioner_id']);
        $this->user = User::getUserByRun($this->run);
        $this->validate(['user' => 'required'], ['user.required' => 'No existe usuario.']);
        $this->setDv();
        $this->user_id = $this->user->id;
        $this->name = $this->user->officialName;
        $this->fathers_family = $this->user->officialFathersFamily;
        $this->mothers_family = $this->user->officialMothersFamily;
        $this->sex = $this->user->sex;
        $this->age = Carbon::parse($this->user->birthday)->age;
        $this->months = Carbon::parse($this->user->birthday)->diff(\Carbon\Carbon::now())->format('%m');
        $this->contracts = $this->user->contracts;
        $this->law = $this->contracts->count() > 0 ? $this->contracts->first()->law : '';
        $this->organizations = Organization::whereHas('practitioners', function (Builder $query) {
                                                $query->where('user_id', $this->user_id);
                                            })->get();

        $this->practitioners = $this->organizations->count() > 0 ? Practitioner::where('user_id', $this->user_id)->where('organization_id', $this->organizations->first()->id)->get() : [];
    }

    public function setDv()
    {
        $run = intval($this->run);
        $s = 1;
        for ($m = 0; $run != 0; $run /= 10)
            $s = ($s + $run % 10 * (9 - $m++ % 6)) % 11;
        $this->dv = chr($s ? $s + 47 : 75);
    }

    public function updatedContractId($contract_id)
    {
        $this->law = Contract::find($contract_id)->law;
    }

    public function updatedOrganizationId($organization_id)
    {
        $this->practitioners = Practitioner::where('user_id', $this->user_id)->where('organization_id', $organization_id)->get();
        // $this->practitioner_id = $this->practitioners->count() > 0 ? $this->practitioners->first()->id : '';
    }

    public function render()
    {
        return view('livewire.absence.asign-user-inputs-form');
    }


}
