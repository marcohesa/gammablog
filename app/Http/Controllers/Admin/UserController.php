<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
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
        $user->institution_id = $request->institution_id;
        $user->description = $request->description;
        $user->estudies = $request->estudies;
        $user->password = bcrypt('blog-ig@mma');
    

        $user->save();
        return redirect()->route('admin.users.index')->with('info', 'Usuario creado');
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


    public function profile(User $user) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'institution_id' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->institution_id = $request->institution_id;
        $user->description = $request->description;
        $user->estudies = $request->estudies;    
        $user->update();

        return redirect()->route('admin.users.index')->with('info', 'Perfil actualizado');
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
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('info', 'Rol asignado correctamente');
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

        return redirect()->route('admin.users.index')->with('info', 'Usuario eliminado');
    }
}
