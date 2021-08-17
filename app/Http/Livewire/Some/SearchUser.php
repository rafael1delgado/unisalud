<?php

namespace App\Http\Livewire\Some;

use App\Models\User;
use Livewire\Component;

class SearchUser extends Component
{
    public $searchText;
    public $users;
    public $selectedUser;


//    public function mount()
//    {
//        $this->users = null;
//    }

    public function search()
    {
        $usersByName = User::getUsersByName($this->searchText)->get();
        $usersByIdentifier = User::getUsersByIdentifier($this->searchText)->get();

        $allUsers = $usersByName->merge($usersByIdentifier);
        $this->users = $allUsers;
    }

    public function selectUser($userId)
    {
         $this->emit('userSelected', $userId);
//         $this->dispatchBrowserEvent('closeModal');
//         $this->dispatchBrowserEvent('userSelected');
    }

    public function render()
    {
        return view('livewire.some.search-user');
    }
}
