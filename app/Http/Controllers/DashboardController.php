<?php

namespace App\Http\Controllers;
// In your controller
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
public function index()
{
    // Get the logged-in user's ID
    $departmentId = Auth::user()->department_id;
    
    // Fetch recently added products for the logged-in user
    $recentProducts = Product::where('department_id', $departmentId)
                                ->latest()
                                ->limit(5)
                                ->get();

    // Fetch recently registered users (You can filter based on your criteria)
    $recentUsers = User::latest()
                       ->where('department_id', $departmentId) // Exclude the logged-in user if necessary
                       ->limit(5)
                       ->get();
    
    // Return the view with data
    return view('admin.dashboard', compact('recentProducts', 'recentUsers'));
}
}
