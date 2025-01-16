<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Department;


class ProductController extends Controller
{
    public function index()
    {
        // Fetch the department_id of the authenticated user
        $userDepartmentId = Auth::user()->department_id;
    
        // Query the products that belong to the user's department
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('department', 'products.department_id', '=', 'department.id')
            ->select('products.*', 'categories.catname', 'department.departmentname')
            ->where('products.department_id', '=', $userDepartmentId) // Filter by department_id
            ->get();

        
           
    
        // Pass the filtered products to the view
        return view('product.index', [
            'products' => $products,
            
        ]);
    }
    

    public function create()
    {
        $departmentId = Auth::user()->department_id;

        // Retrieve only the categories belonging to the user's department
        $categories = Category::where('department_id', $departmentId)->get();

        return view('product.create', compact('categories'));
    }
    public function store(Request $request)
{
    $request->validate([
        'productname' => 'required',
        'productdesc' => 'required',
        'productquantity' => 'required|integer',
        'priceperunit' => 'nullable|numeric',
        'rentalperunit' => 'nullable|numeric',
        'status' => 'required',
        'expdate' => 'required|date',
        'category_id' => 'required|exists:categories,id',
        'department_id' => 'required|exists:department,id',
    ]);

    Product::create([
        'productname' => $request->productname,
        'productdesc' => $request->productdesc,
        'productquantity' => $request->productquantity,
        'priceperunit' => $request->priceperunit ?? 0,
        'rentalperunit' => $request->rentalperunit ?? 0,
        'status' => $request->status,
        'expdate' => $request->expdate,
        'category_id' => $request->category_id,
        'department_id' => $request->department_id,
    ]);


    return redirect()->route('product.index')->with('success', 'Product created successfully.');

}


public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all(); 
    $departments = Department::all(); 

    return view('product.edit', compact('product', 'categories', 'departments'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'productname' => 'required|string|max:255',
        'productdesc' => 'required|string|max:500',
        'productquantity' => 'required|integer',
        'priceperunit' => 'required|numeric',
        'rentalperunit' => 'nullable|numeric',
        'status' => 'required|string|max:255',
        'expdate' => 'nullable|date',
        'category_id' => 'required|exists:categories,id',
        'department_id' => 'required|exists:department,id',
    ]);

    $product = Product::findOrFail($id);
    $product->update([
        'productname' => $request->productname,
        'productdesc' => $request->productdesc,
        'productquantity' => $request->productquantity,
        'priceperunit' => $request->priceperunit,
        'rentalperunit' => $request->rentalperunit,
        'status' => $request->status,
        'expdate' => $request->expdate,
        'category_id' => $request->category_id,
        'department_id' => $request->department_id,
    ]);

    return redirect()->route('product.index')->with('success', 'Product updated successfully!');
}


public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('product.index')->with('status', 'Product deleted successfully!');
}
}