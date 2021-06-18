<?php

namespace App\Http\Livewire\Some;

use App\Models\User;
use Livewire\Component;

class SearchUser extends Component
{
    public $name;
    public $users;
    public $selectedUser;


//    public function mount()
//    {
//        $this->users = null;
//    }

    public function searchByName()
    {
        $this->users = User::getUsersByName($this->name)->get();
    }

    public function selectUser($userId)
    {
         $this->emit('userSelected', $userId);
//         $this->dispatchBrowserEvent('userSelected');
    }

    public function render()
    {
        return view('livewire.some.search-user');
    }
}
