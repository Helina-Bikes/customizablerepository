<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class SystemOwnerDashboardController extends Controller
{
    public function __construct()
    {
        // Middleware to make sure only the System Owner can access this dashboard
        $this->middleware('role:System Owner');
    }

     public function index()
     {
    //     // If the user is a System Owner, show the dashboard for the whole system
        $departments = Department::all(); // You can list all departments or any relevant data
        return view('systemowner.dashboard', compact('departments'));
    }
   
}
