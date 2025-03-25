<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
class PostController extends Controller
{
    //
    public function index()
    {
        $role = Role::all();
        $permission = Permission::all();

        return view('posts.index' ,compact('role','permission'));

    }
        public function create()
    {
        return view('posts.create');
    }
        public function storeRole(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
        ]);

        Role::create($request->all());

        return back()->with('success','Role created successfully.');
    }   

    public function storePermission(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
        ]);

        Permission::create($request->all());

       return back()->with('success','Permission created successfully.');
    }

   
    public function assignPermission(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->givePermissionTo($request->permission);
        return back()->with('success','Permission assigned successfully.');
    }

    public function updateRole(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $role->update($request->all());
        return back()->with('success','Role updated successfully.');
    }

    public function updatePermission(Request $request)
    {
        $permission = Permission::findOrFail($request->permission_id);
        $permission->update($request->all());
        return back()->with('success','Permission updated successfully.');
    }

    public function deleteRole(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $role->delete();
        return back()->with('success','Role deleted successfully.');
    }

    public function deletePermission(Request $request)
    {
        $permission = Permission::findOrFail($request->permission_id);
        $permission->delete();
        return back()->with('success','Permission deleted successfully.');
    }
}
