<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();  // Get the logged-in user
        $departmentId = $user->department_id; // Get the user's department

        // Fetch department-specific data for products, users, and categories
        $totalProducts = Product::where('department_id', $departmentId)->count();
        $totalUsers = User::where('department_id', $departmentId)->count();
        $totalCategories = Category::where('department_id', $departmentId)->count();

        // Fetch recent products and users for the logged-in user's department
        $recentProducts = Product::where('department_id', $departmentId)
                                  ->latest()
                                  ->limit(5)
                                  ->get();

        $recentUsers = User::where('department_id', $departmentId)
                           ->latest()
                           ->limit(5)
                           ->get();
        
        // Return the view with the variables
        return view('admin.dashboard', compact('totalProducts', 'totalUsers', 'totalCategories', 'recentProducts', 'recentUsers'));
    }
}
