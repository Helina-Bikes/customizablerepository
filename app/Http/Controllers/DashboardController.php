<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the logged-in user's department ID
        $departmentId = Auth::user()->department_id;
        
        // Fetch recently added products for the logged-in user's department
        $recentProducts = Product::where('department_id', $departmentId)
                                  ->latest()
                                  ->limit(5)
                                  ->get();

        // Fetch recently registered users (filtered by department)
        $recentUsers = User::latest()
                           ->where('department_id', $departmentId)
                           ->limit(5)
                           ->get();
        
        // Return the view with the variables
        return view('admin.dashboard', compact('recentProducts', 'recentUsers'));
    }
}
