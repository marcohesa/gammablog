<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
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

        // if(Cache::has('posts')) {
        //     $posts = Cache::get('posts');
        // } else {
            $posts = Post::where('status', 4)
            ->where('title', 'LIKE', '%' . $this->search . '%')
            ->latest('publicationDate')->paginate(4);
        //     Cache::put('posts', $posts);
        // }
     

        return view('livewire.posts', compact('posts'));
       
    } 
}
