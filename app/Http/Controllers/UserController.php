<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
{
    return [
        new Middleware('permission:view users', only: ['index']),
        new Middleware('permission:edit users', only: ['edit']),
        new Middleware('permission:create users', only: ['create']),
        new Middleware('permission:delete users', only: ['destroy']),
    ];
}
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    
    public function create()
    {
        $roles = Role::orderBy("name", "ASC")->get();
        return view("users.create", [
            'roles' => $roles
        ]);
    }

    public function store(Request $request, )
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password before saving
        $user->save();
    
     $user->syncRoles($request->role);
    
     return redirect()->route('users.index')->with('success', 'user updated successfully.');
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
        public function destroy(User $user)
        {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'user deleted successfully.');
        }
}
