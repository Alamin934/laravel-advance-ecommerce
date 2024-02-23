<?php

namespace App\Http\Controllers\Admin;

use App\Models\{User,Role};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', ['users'=>$users,'roles'=>$roles]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  =>  'required|string|max:255',
            'email'  =>  'required|email|max:255|unique:users,email',
            'password'  =>  ['required',Password::min(6)],
            'roles' =>  'required|array',
        ]);

        $user = User::create([
            'name'  =>  $request->name,
            'email'  => $request->email,
            'password'  =>  $request->password,
        ]);
        $user->roles()->attach($request->roles);
        return response()->json(['status'=>'success']);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::with('roles')->findOrFail($id);
        $roles = Role::all();
        return response()->json(['status'=>'success', 'user'=>$user, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'update_name'  =>  'required|string|max:255',
            'update_email'  =>  'required|email|max:255',
            'update_password'  =>  ['nullable',Password::min(6)],
            'update_roles' =>  'nullable|array',
        ]);
        
        $user = User::findOrFail($request->update_id);
        
        $user->update([
            'name'  =>  $request->update_name,
            'email'  => $request->update_email,
        ]);
        $user->roles()->sync($request->update_roles);
        
        if($request->filled('password')){
            User::whereId($request->update_id)->update([
                'password' =>  $request->input('update_password'),
            ]);
        }

        return response()->json(['status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->roles()->detach();
        $user->delete();
        return response()->json(['status'=>'success']);
    }

}
