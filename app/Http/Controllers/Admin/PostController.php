<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:dashboard')->only('index'); 
        $this->middleware('can:Ver publicaciones')->only('index', 'show');   
        $this->middleware('can:Editar publicaciones')->only('edit', 'update');   
        $this->middleware('can:Crear publicaciones')->only('create', 'store');   
        $this->middleware('can:Eliminar publicaciones')->only('delete');   
    }
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
            'file' => 'required|max:1024|mimes:jpeg,png,jpg|dimensions:max_width=800,max_height=600|dimensions:min_width=640,min_height=480',
            'fileII' => 'max:1024|mimes:jpeg,png,jpg|dimensions:max_width=800,max_height=600|dimensions:min_width=640,min_height=480',
            'fileIII' => 'max:1024|mimes:jpeg,png,jpg|dimensions:max_width=800,max_height=600|dimensions:min_width=640,min_height=480',
        ]);
        if(Auth::user()->roles()->first()->id == 1 || Auth::user()->roles()->first()->id == 2) {
            $request->validate([
                'users' => 'required',
                'publicationDate' => 'required',
            ]);
        }

     

       
        $post =  new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->body = $request->body;
        
        
        if(Auth::user()->roles()->first()->id == 1 || Auth::user()->roles()->first()->id == 2) {
            $post->publicationDate = $request->publicationDate;
         
        } 
        if(Auth::user()->hasrole([3])) {
            $post->publicationDate = null;
          
        } 

        $post->status = $request->status;

     
      

        $post->category_id = $request->category_id;

        if($post->save()) {
            if(Auth::user()->roles()->first()->id == 1 || Auth::user()->roles()->first()->id == 2) {
                $post->users()->attach($request->users);
            } else {
                $post->users()->attach(Auth::user()->id);
                $post->users()->attach($request->users);
            }
           
            $fullUrl1 = NULL;
            $fullUrl2 = NULL;
            $fullUrl3 = NULL;

            //img principal
            if($request->file) {
                $archivo = $request->file('file');
                $fileExtension = $archivo->getClientOriginalExtension();
                $filename = date("Ymd-hisa.").$fileExtension;
                $path = public_path('/post/');
                $archivo->move($path,'1'.$filename);

                $fullUrl1 = 'post/'.'1'.$filename;
            }

            //img dos
            if($request->fileII) {
                $archivoII = $request->file('fileII');
                $fileExtensionII = $archivoII->getClientOriginalExtension();
                $filenameII = date("Ymd-hisa.").$fileExtensionII;
                $pathII = public_path('/post/');
                $archivoII->move($pathII,'2'.$filenameII);

                $fullUrl2 = 'post/'.'2'.$filenameII;
            }
      

            //img tres
            if($request->file('fileIII')) {
            
                $archivoIII = $request->file('fileIII');
                $fileExtensionIII = $archivoIII->getClientOriginalExtension();
                $filenameIII = date("Ymd-hisa.").$fileExtensionIII;
                $pathIII = public_path('/post/');
                $archivoIII->move($pathIII,'3'.$filenameIII);

                $fullUrl3 = 'post/'.'3'.$filenameIII;
            } 
            //dd($fullUrl1,$fullUrl2,$fullUrl3);
            $post->image()->create([
                'url' => $fullUrl1,
                'urlII' => $fullUrl2,
                'urlIII' => $fullUrl3,
            ]);

           
        }
        return redirect()->route('admin.posts.index')->with('success', 'Publicación creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
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
            'file' => 'max:1024|mimes:jpeg,png,jpg|dimensions:max_width=800,max_height=600|dimensions:min_width=640,min_height=480',
            'fileII' => 'max:1024|mimes:jpeg,png,jpg|dimensions:max_width=800,max_height=600|dimensions:min_width=640,min_height=480',
            'fileIII' => 'max:1024|mimes:jpeg,png,jpg|dimensions:max_width=800,max_height=600|dimensions:min_width=640,min_height=480',
        ]);
        if(Auth::user()->roles()->first()->id == 1 || Auth::user()->roles()->first()->id == 2) {
            $request->validate([
          
                'publicationDate' => 'required',
            ]);
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->body = $request->body;
        

        $post->publicationDate = $request->publicationDate;
        $post->category_id = $request->category_id;

        if($post->update()) {

            //img principal
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
            //img dos
            if($request->file('fileII')) {
            
                $archivoII = $request->file('fileII');
                $fileExtensionII = $archivoII->getClientOriginalExtension();
                $filenameII = date("Ymd-hisa.").$fileExtensionII;
                $pathII = public_path('/post/');
                $archivoII->move($pathII,$filenameII);

                $post->image()->update([
                    'urlII' => 'post/'.$filenameII,
                ]);
            }
            //img tres
            if($request->file('fileIII')) {
            
                $archivoIII = $request->file('fileIII');
                $fileExtensionIII = $archivoIII->getClientOriginalExtension();
                $filenameIII = date("Ymd-hisa.").$fileExtensionIII;
                $pathIII = public_path('/post/');
                $archivoIII->move($pathIII,$filenameIII);

                $post->image()->update([
                    'urlIII' => 'post/'.$filenameIII,
                ]);
            }
        }

        return redirect()->route('admin.posts.index')->with('success', 'Publicación actualizada');
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
        return redirect()->back()->with('success', 'Publicación eliminada');

    }
}
