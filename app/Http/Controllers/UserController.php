<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(string $id)
        {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name', 'ASC')->get();
        $hasRoles =$user->roles->pluck("id");
        return view('users.edit', [
        'user' => $user,
        'roles' => $roles,
        "hasRoles"=>$hasRoles,
        ]);
           }
        
           public function update(Request $request, string $id)
           {
               $user = User::findOrFail($id);
           
               $validator = Validator::make($request->all(), [
                   'name' => 'required|min:3',
                   'email' => 'required|email|unique:users,email,' . $id,
               ]);
           
               if ($validator->fails()) {
                   return response()->json(['errors' => $validator->errors()], 422);
               }
           
               $user->name = $request->name;
               $user->email = $request->email;
               $user->save();
           
            $user->syncRoles($request->role);
           
            return redirect()->route('users.index')->with('success', 'user updated successfully.');
        }
 
}
