<?php

namespace App\Http\Controllers\Admin;

use App\Events\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest('id')->pluck('name', 'id');
        $users = User::latest('id')->pluck('name', 'id');
        return view('admin.posts.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'file' => 'required|max:1024|mimes:jpeg,png,jpg|dimensions:max_width=800,max_height=600',
        ]);
        if(Auth::user()->hasrole([1,2])) {
            $request->validate([
                'user_id' => 'required',
                'publicationDate' => 'required',
            ]);
        }


        $post =  new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->body = $request->body;
     
        $post->status = 1;
        if(Auth::user()->hasrole([1,2])) {
            $post->user_id = $request->user_id;
            $post->publicationDate = $request->publicationDate;
        } else {
            $post->user_id = Auth::user()->id;
            $post->publicationDate = null;
        }
        $post->category_id = $request->category_id;

        if($post->save()) {

            $archivo = $request->file('file');
            $fileExtension = $archivo->getClientOriginalExtension();
            $filename = date("Ymd-hisa.").$fileExtension;
            $path = public_path('/post/');
            $archivo->move($path,$filename);

            $post->image()->create([
                'url' => 'post/'.$filename,
            ]);

            event(new PostStatus($post)); 
        }
        return redirect()->route('admin.posts.index')->with('info', 'Publicación creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $msg = '';

        if($post->status == 1) {
            $post->status = 2;
            $post->update();
            event(new PostStatus($post));
            $msg = 'aprobada';
        }
        if($post->status == 2) {
            $post->status = 3;
            $post->update();
            $msg = 'publicada';
        }

        event(new PostStatus($post));
        return redirect()->back()->with('info', 'Publicación '.$msg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::latest('id')->pluck('name', 'id');
        $users = User::latest('id')->pluck('name', 'id');
        return view('admin.posts.edit', compact('post', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'file' => 'max:1024|mimes:jpeg,png,jpg|dimensions:max_width=800,max_height=600',
        ]);
        if(Auth::user()->hasrole([1,2])) {
            $request->validate([
                'user_id' => 'required',
                'publicationDate' => 'required',
            ]);
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->body = $request->body;
        
        $post->status = 1;
        if(Auth::user()->hasrole([1,2])) {
            $post->user_id = $request->user_id;
            
        } else {
            $post->user_id = Auth::user()->id;
        }
        $post->publicationDate = $request->publicationDate;
        $post->category_id = $request->category_id;

        if($post->update()) {

            if($request->file('file')) {
                $archivo = $request->file('file');
                $fileExtension = $archivo->getClientOriginalExtension();
                $filename = date("Ymd-hisa.").$fileExtension;
                $path = public_path('/post/');
                $archivo->move($path,$filename);

                $post->image()->update([
                    'url' => 'post/'.$filename,
                ]);
            }
        }

        return redirect()->route('admin.posts.index')->with('info', 'Publicación actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('info', 'Publicación eliminada');

    }
}
