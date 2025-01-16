<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Show the form for creating a new department
    public function create()
    {
        return view('department.create');
    }

    // Store the newly created department in the database
    public function store(Request $request)
    {
        $request->validate([
            'departmentname' => 'required|string|max:255',
            'departmentdesc' => 'required|string',
        ]);

        // Create a new department
        Department::create([
            'departmentname' => $request->departmentname,
            'departmentdesc' => $request->departmentdesc,
        ]);

        // Redirect to department list
        return redirect()->route('department.index');
    }

    // Display a listing of the departments
    public function index()
    {
        $department = Department::all();
        return view('department.index', compact('department'));
    }
}

