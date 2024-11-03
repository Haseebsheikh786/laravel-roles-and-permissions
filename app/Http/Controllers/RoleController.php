<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
{
    return [
        new Middleware('permission:view roles', only: ['index']),
        new Middleware('permission:edit roles', only: ['edit']),
        new Middleware('permission:create roles', only: ['create']),
        new Middleware('permission:delete roles', only: ['destory']),
    ];
}
    public function index()
    {
        $roles = Role::orderBy("name", "ASC")->paginate(10);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissons = Permission::orderBy("name", "ASC")->get();
        return view("roles.create", [
            'permissions' => $permissons
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name|max:255',
        ]);
        $role = Role::create(['name' => $request->name]);
        if (!empty($request->permission)) {
            foreach ($request->permission as $name) {
                $role->givePermissionTo($name);
            }
        }

        return redirect()->route('roles.index')->with('success', 'role created successfully.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissons = Permission::orderBy("name", "ASC")->get();
        return view('roles.edit', [
            "role" => $role,
            "permissions" => $permissons,
            "hasPermissions" => $hasPermissions,
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name,' . $role->id . '|max:255',
        ]);

        $role->update(['name' => $request->name]);

        if (!empty($request->permission)) {
            $role->syncPermissions($request->permission);
        } else {
            $role->syncPermissions([]); // Remove all permissions if none selected
        }

        return redirect()->route('roles.index')->with('success', 'role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'role deleted successfully.');
    }
}
