<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('status', 3)
        ->where('title', 'LIKE', '%' . $this->search . '%')
        ->latest('id')->paginate(4);

        return view('livewire.posts', compact('posts'));
       
    } 
}
