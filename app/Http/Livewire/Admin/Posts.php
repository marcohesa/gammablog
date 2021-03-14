<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{

    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $status;

    public function updatingSearch() {
        $this->resetPage();
    }

    public function updatingStatus() {
        $this->resetPage();
    }

    public function render()
    {
        //Borrador
        if(Auth::user()->hasrole([1,2])) {
            $posts = Post::where('title', 'LIKE', '%' . $this->search . '%')
            ->where('status', 'LIKE', '%' . $this->status . '%')->latest('id')->paginate(15);
        } else {
            $posts = Post::where('user_id',Auth::user()->id)
            ->where('title', 'LIKE', '%' . $this->search . '%')
            ->where('status', 'LIKE', '%' . $this->status . '%')->latest('id')->paginate(15);
        }
        
        return view('livewire.admin.posts', compact('posts'));
    }
}
