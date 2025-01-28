<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

// Alias the Spatie Role model
use Spatie\Permission\Models\Role ;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function _construct(){
        $this->middleware('permission:Delete Roles',['only'=>['destroy']]);
        $this->middleware('permission:Add Roles',['only'=>['create','store','addPermissionToRole','givePermissionToRole']]);
        $this->middleware('permission:Edit Roles',['only'=>['Edit','Update']]);
    
    }
    public function create()
    {
   
        return view('role.create');
    }

    public function index()
    {

    $roles = Role::where('name', '!=', 'System Owner')->get();
    return view('role.index', [
        'roles'=>$roles
    ]);
    }
    

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name',
            ],
            'roledesc' => [
                'string',
                'unique:roles,roledesc', // Corrected table name
            ],
        ]);
        // Create the Role
        $role = Role::create([
            'name' => $request->name,
            'roledesc' => $request->roledesc,   // Assuming you have a 'roledesc' field in the roles table
        ]);
    
       
        return redirect('roles')->with('status', 'Role created successfully.');
    }
    
    public function destroy($roleId)
    {
    $role=Role::find($roleId);
    $role->delete();
    return redirect('roles')->with('status', 'Role deleted successfully.');
    }
public function edit(Role $role)
{
    return view('role.edit',[
        'role'=>$role
    ]);
}
public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $role->id
            ],
            'description' => [
                'nullable', // Optional if the description can be left blank
                'string',
                'unique:roles,roledesc,' . $role->id
            ],
        ]);
        // Update role details
        $role->update([
            'name' => $request->name,
             'roledesc'=>$request->roledesc,
        ]);

        // Sync permissions
      
        //$role->permissions()->sync($request->permissions);

        return redirect('roles')->with('status', 'Role updated successfully.');
    }

    public function addPermissionToRole($roleId){
        $permissions= Permission::get();
        $role= Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                            ->where('role_has_permissions.role_id',$role->id)
                            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                            ->all();
        return view('role.add-permission',[
            'role'=>$role,
            'permissions'=>$permissions,
            'rolePermissions'=>$rolePermissions
        ]);

    }
    public function givePermissionToRole(Request $request,$roleId)
    {
     $request->validate([
        'permission'=>'required'

     ]);
     $role=Role::findOrFail($roleId);
     $role->syncPermissions($request->permission);
     return redirect()->back()->with('status','Permission added to role');

    }


}
