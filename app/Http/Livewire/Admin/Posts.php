<?php

namespace App\Http\Livewire\Admin;

use App\Events\PostStatus;
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

            // $posts =  Post::has('users')->get();

           $posts =  Post::whereHas('users', function($q) {
                $q->where('user_id', Auth::user()->id);
                 // in this scope, `$q` refers to the MediaProfile object, not the User.
            })->Where('posts.title', 'LIKE', '%' . $this->search . '%')->latest('id') ->where('status', 'LIKE', '%' . $this->status . '%')->paginate(15);
           
        }
        
        return view('livewire.admin.posts', compact('posts'));
    }

    public function state($id) {

        $post = Post::find($id);
       

        switch ($post->status) {
            case 1:
                $post->update([
                    'status' => 2
                ]);
                toast('Publicación enviada a revisión','success');
                event(new PostStatus($post)); 
                break;
            case 2:
    
                $post->update([
                    'status' => 3
                ]);
                toast('Publicación aprobada','success');
                event(new PostStatus($post));
                break;
            case 3:

                $post->update([
                    'status' => 4
                ]);
                toast('Publicación publicada','success');
                event(new PostStatus($post));
            default:
                toast('Error vuelva a Intentarlo','error');
       
        }
    }
}
