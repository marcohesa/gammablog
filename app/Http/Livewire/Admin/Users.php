<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch() {
        $this->resetPage();
    }


    public function render()
    {
        $users = User::latest('id')
        ->where('name', 'LIKE', '%' . $this->search . '%')
        ->latest('id')->paginate(15);
        return view('livewire.admin.users', compact('users'));
    }
}
