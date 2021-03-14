<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class NextPosts extends Component
{
    public function render()
    {
        $nextPosts = Post::where('status', 2)->latest('id')
        ->take(15)->get();
        return view('livewire.next-posts', compact('nextPosts'));
    }
}
