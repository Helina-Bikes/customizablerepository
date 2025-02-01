<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function _construct(){
        $this->middleware('permission:Delete Permission',['only'=>['destroy']]);
        $this->middleware('permission:Add Permission',['only'=>['create','store']]);
        $this->middleware('permission:Edit Permission',['only'=>['Edit','Update']]);
    
    }
    public function index(){

        $permissions=Permission::get();
        return view('permission.index',[
        'permissions'=>$permissions

    ]);
    }
    public function create(){
        return view('permission.create');
    }
   public function store(Request $request)
   {
    $request->validate([
        'name' => [
            'required',
            'string',
            'unique:permissions,name',
        ],
        'description' => [
            'string',
            'unique:permissions,description', // Corrected table name
        ],
    ]);

    Permission::create([
        'name'=>$request->name,
        'description'=>$request->description
    
    ]);
    return redirect('permissions')->with('status','Permission Created Successfully');
   }
       
    public function edit(Permission $permission){
        return view('permission.edit', [
            'permission' => $permission
        ]);
        
    }
    public function update(Request $request, Permission $permission) {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,' . $permission->id
            ],
            'description' => [
                'nullable', // Optional if the description can be left blank
                'string',
                'unique:permissions,description,' . $permission->id
            ],
        ]);
    
        // Update the permission instance
        $permission->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
    
        return redirect('permissions')->with('status', 'Permission Updated Successfully');
    }
    
    public function destroy($permissionId) {
        $permission = Permission::find($permissionId);    
        $permission->delete();
        return redirect('permissions')->with('status', 'Permission Deleted Successfully');
    }
    
}
