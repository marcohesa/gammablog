<?php

namespace App\Http\Controllers\Admin;

use App\Events\PasswordUser;
use App\Events\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Institution;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:dashboard')->only('index'); 
        $this->middleware('can:Ver usuarios')->only('index');   
        $this->middleware('can:Editar usuarios')->only('edit', 'update');   
        $this->middleware('can:Crear usuarios')->only('create', 'store');   
        $this->middleware('can:Eliminar usuarios')->only('delete');   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = Institution::latest('id')->pluck('name', 'id');
        return view('admin.users.create', compact('institutions'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $user =  new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->institution_id = $request->institution_id;
        $user->description = $request->description;
        $user->estudies = $request->estudies;
        $user->password = bcrypt('blog-ig@mma');

        $user->save();

        event(new PasswordUser($user)); 
        return redirect()->route('admin.users.index')->with('success', 'Usuario creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $institutions = Institution::latest('id')->pluck('name', 'id');
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required',
        ]);
        $user->roles()->sync($request->roles);
        event(new UserStatus($user)); 

        $suscribers = Subscriber::where('email', $user->email)->first();
    

        if($suscribers == NULL || $suscribers == '') {
            $suscriber =  new Subscriber;
            $suscriber->email = $user->email;
            $suscriber->save();
        } 

        return redirect()->route('admin.users.index')->with('success', 'Rol asignado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado');
    }
}
