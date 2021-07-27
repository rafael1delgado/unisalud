<?php

namespace App\Http\Livewire\medical_programmer;

use Livewire\Component;
use App\Models\User;
use App\Models\MedicalProgrammer\Contract;
use App\Models\MedicalProgrammer\UserSpecialty;

class SelectUserContSpec extends Component
{
    // public $contracts;
    // public $userSpecialties;
    //
    // public $user_id;
    // public $contract_id;
    //
    // public $var;
    //
    // public function render()
    // {
    //     // dd($this->user_id);
    //     $this->var = $this->user_id;
    //     return view('livewire.medical_programmer.select-user-cont-spec');
    // }

    /** Uso:
     * @livewire('search-select-user')
     *
     * Se puede definir el nombre del campo que almacenará el id de usuario
     * @livewire('search-select-user', ['selected_id' => 'responsable_id'])
     *
     * Si necesitas que aparezca precargado el usuario
     * @livewire('search-select-user', ['user' => $user])
     */
    public $query;
    public $users;
    /** Para cuando viene precargado */
    public $user;
    public $selectedName;
    public $selected_id = 'user_id';
    public $msg_too_many;

    public $contracts;
    public $userSpecialties;

    public function resetx()
    {
        $this->query = '';
        $this->users = [];
        $this->user = null;
    }

    public function mount()
    {
        if($this->user) {
            $this->setUser($this->user);
        }
    }

    public function setUser(User $user)
    {
        $this->resetx();
        $this->user = $user;
        $this->selectedName = $user->OfficialFullName;
    }

    public function updatedQuery()
    {
        $this->users = User::getUsersByName($this->query)->get();

        /** Más de 50 resultados  */
        if(count($this->users) >= 25)
        {
            $this->users = [];
            $this->msg_too_many = true;
        }
        else {
            $this->msg_too_many = false;
        }
    }

    public function render()
    {
        if ($this->user != null) {
          $this->contracts = Contract::where('user_id',$this->user->id)->get();
          $this->userSpecialties = UserSpecialty::where('user_id',$this->user->id)->get();
        }

        return view('livewire.medical_programmer.select-user-cont-spec');
    }
}
