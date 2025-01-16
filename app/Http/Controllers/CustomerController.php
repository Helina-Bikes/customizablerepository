<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Department;

class CustomerController extends Controller
{
    public function showRegisterForm() {
        $departments = Department::all();
        return view('customer.register',compact('departments'));
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phoneno'=>'required',
            'password' => 'required|confirmed|min:6',
            'department_id' => 'required|exists:departments,id',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phoneno'=>$validated[ 'phoneno'],
            'password' => Hash::make($validated['password']),
            'department_id' => $validated['department_id'],
            'role' => 'customer', // Assuming roles are managed
        ]);

        Auth::login($user);

        return redirect()->route('customer.login')->with('success', 'Registration successful!');
    }

    public function showLoginForm() {
        return view('customer.login');
    }

   /* public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('customer.products')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('customer.login')->with('success', 'Logged out successfully!');
    }
*/
   /* public function listProducts(Request $request) {
        $departmentId = $request->get('department_id', auth()->user()->department_id); 
        $products = Product::where('department_id', $departmentId)->get();
        return view('customer.products', compact('products'));
    }

    public function searchProducts(Request $request) {
        $query = $request->validate([
            'query' => 'required|string',
        ]);

        $products = Product::where('name', 'like', "%{$query['query']}%")->get();
        return view('customer.products', compact('products'));
    }*/
/*
    public function addToCart(Request $request) {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:rent,sale',
        ]);

        $cart = Cart::create([
            'customer_id' => auth()->id(),
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'type' => $validated['type'], 
        ]);

        return redirect()->route('customer.cart')->with('success', 'Product added to cart!');
    }

    public function viewCart() {
        $cartItems = Cart::where('customer_id', auth()->id())->with('product')->get();
        return view('customer.cart', compact('cartItems'));
    }
        */

    /* public function checkout(Request $request) {
        $cartItems = Cart::where('customer_id', auth()->id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('customer.cart')->with('error', 'Your cart is empty.');
        }

        foreach ($cartItems as $item) {
            Order::create([
                'customer_id' => $item->customer_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'type' => $item->type,
                'status' => 'Pending', 
            ]);
        }

        Cart::where('customer_id', auth()->id())->delete();

        return redirect()->route('customer.products')->with('success', 'Order placed successfully!');
    }
        */
   
    
}
