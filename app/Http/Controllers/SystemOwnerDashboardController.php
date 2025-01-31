<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class SystemOwnerDashboardController extends Controller
{
    public function index()
    {
      
        // Fetch the recent products (you can adjust the number as needed)
        $recentProducts = Product::latest()->take(5)->get();  // Adjust the number as needed

        // Fetch recent users (you can adjust the number as needed)
        $recentUsers = User::latest()->take(5)->get();  // Adjust the number as needed

        // Return the view with the required data
        return view('systemowner.dashboard', compact('recentProducts', 'recentUsers'));
    }
}
