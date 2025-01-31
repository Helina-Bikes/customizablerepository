<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

use Illuminate\Auth\Events\Registered;
use App\Models\Department; 
use App\Models\Role; 

class AuthController extends Controller
{
    public function Login(){
        return view("auth.login");
    }
    public function LoginPost(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);
    
        $credentials = $request->only("email", "password");
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Check user role and redirect accordingly
            if ($user->hasRole('System Owner')) {
                return redirect()->route("systemowner.dashboard"); // Redirect owners
            } elseif ($user->hasRole('Admin')) {  // Changed from else to elseif
                return redirect()->route("admin.dashboard"); // Redirect admins
            } else {
                return redirect()->route("admin.dashboard"); // Redirect other users
            }
        }
    
        // If login fails, return error message
        return back()->withErrors(["email" => "Invalid credentials"]);
    }
    
    public function Register(){
        $departments = Department::all();
        $roles = Role::all();
        return view("auth.register",compact('departments', 'roles'));
    }
    public function RegisterPost(Request $request)
{
    // Validate incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'orgname' => 'required|string|max:255',
        'department_id' => 'required|integer',
    ]);

    // Create the user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'orgname' => $request->orgname,
        'department_id' => $request->department_id,
    ]);

    // Assign the "Super Admin" role to the user
    $superAdminRole = Role::where('name', 'Super Admin')->first();
    if ($superAdminRole) {
        DB::table('model_has_roles')->insert([
            'role_id' => $superAdminRole->id,
            'model_type' => User::class,
            'model_id' => $user->id,
        ]);
    }

    // Redirect with a success message
    session()->flash('success', 'User registered successfully as Super Admin!');
    return redirect()->route('login');
}

    
    public function index()
    {
        return view('admin.dashboard');
    }
    // public function otherRolesDashboard(){
    //    return view('otherroles.dashboard');
    // }
    public function settings()
    {
        return view('auth.settings'); 
    }
    public function update(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Profile picture validation
    ]);

    $user = auth()->user();
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    

    // Handle file upload for profile picture if present
    if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        session()->put('profile_picture', $path);
    }

    $user->save(); // Save the updated user info

    // Redirect back with a success message
    return redirect()->route('profile.settings')->with('success', 'Profile updated successfully');
}




    // Show activity log
    public function activityLog()
    {
        return view('Auth.activity-log'); // Ensure this view exists
    }

    // Handle logout
    public function logout()
    {
        Auth::logout(); // Log the user out
        session()->flash('success', 'You have been logged out successfully.');

        return redirect('/login'); // Redirect to login page after logout
    }

}
