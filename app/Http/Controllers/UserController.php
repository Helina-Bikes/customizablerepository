<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Department;

class UserController extends Controller
{



    public function _construct(){
        $this->middleware('permission:Delete Users',['only'=>['destroy']]);
        $this->middleware('permission:Add Users',['only'=>['create','store']]);
        $this->middleware('permission:Edit Users',['only'=>['Edit','Update']]);
        $this->middleware('permission:View Users',['only'=>['index']]);
    
    }
    // Fetch all users with roles
    public function index()
{
   $users=User::get();

    return view('users.index',[
        'users'=>$users

    ]);
}
    

    // Show form to create a new user
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all(); // Fetch available roles
        $departments = Department::pluck('departmentname','id')->all(); // Fetch all departments
        return view('users.create', [
            'roles' => $roles,
            'departments' => $departments
        ]);
    }
    

    // Store a new user with a role
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:20|confirmed',
            'orgname' => 'required|string|max:255',
            'department_id' => 'required|exists:department,id',
            'roles' => 'required', // Validate that 'role_id' is an array
            // Ensure role_id is valid
        ]);
    
        // Create the user
       // $authUser = Auth::user();
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'orgname' => $request->orgname,
            'department_id' => $request->department_id,
            
        ]);
        $user->syncRoles($request->roles); 
    
        // Redirect with success message
        return redirect('/users')->with('status', 'User created successfully with role and department.');
    }
    
    
    

    // Show form to edit an existing user
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id')->all();
        $departments = Department::pluck('departmentname', 'id')->all();

        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
            'departments' => $departments
        ]);
    }

    // Update the user and assign the selected role
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'orgname' => 'required|string|max:255',
            'department_id' => 'required|exists:department,id',
            'role_ids' => 'required|array',
            'role_ids.*' => 'exists:roles,id', // Ensure every selected role exists
        ]);
        

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'orgname' => $request->orgname,
            'department_id' => $request->department_id,
        ]);
        
        // Sync roles with the user
        $user->roles()->sync($request->role_ids);
        
        // Redirect with success message
        return redirect()->route('users.index')->with('status', 'User updated successfully.');
    }
    // Delete a user
    public function destroy($userId)
{
    // Fetch the user by ID
    $user = User::findOrFail($userId); // This will throw a 404 error if the user is not found

    // Delete the user
    $user->delete();

    // Redirect to the users index page with a success message
    return redirect()->route('users.index')->with('status', 'User deleted successfully!');
}
    
}
