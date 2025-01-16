<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Show the form for creating a new category
    public function create()
    {
        
        return view('categories.create');
    }

    // Store the newly created category in the database
    public function store(Request $request)
    {
        $request->validate([
            'catname' => 'required|string|max:255',
            'catdescription' => 'required|string',
            'department_id' => 'required|exists:department,id',
        ]);

    
        $category = new Category();
        $category->catname = $request->catname;
        $category->catdescription = $request->catdescription;
        $category->department_id = Auth::user()->department_id; 
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }
    // Display a listing of the categories
    public function index()
    {
       
        $userDepartmentId = Auth::user()->department_id;
    
        // Retrieve categories based on the department ID and join with the departments table
        $categories = Category::where('department_id', $userDepartmentId)
            ->join('department', 'categories.department_id', '=', 'department.id')
            ->select('categories.*', 'department.departmentname')
            ->get();
    
      
        return view('categories.index', ['categories' => $categories]);
    }
    public function edit($id)
{
   
    $category = Category::findOrFail($id);

    // Pass the category to the edit view
    return view('categories.edit', compact('category'));
}
public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'catname' => 'required|string|max:255',
        'catdescription' => 'required|string',
    ]);

    // Find the category by ID
    $category = Category::findOrFail($id);

    // Update the category's details
    $category->catname = $request->catname;
    $category->catdescription = $request->catdescription;
    $category->save();

    // Redirect to the category list with a success message
    return redirect()->route('category.index')->with('success', 'Category updated successfully!');
}
public function destroy($id)
{
    // Find the category by ID
    $category = Category::findOrFail($id);

    // Delete the category
    $category->delete();

    // Redirect with success message
    return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
}


    
}
