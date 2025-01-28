<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CustomerController;

Route::resource('permissions', PermissionController::class);
Route::middleware(['auth'])->group(function () {
  // System Owner Dashboard (only accessible by System Owner)
  Route::middleware(['check.systemowner'])->get('/systemowner-dashboard', [SystemOwnerDashboardController::class, 'index'])->name('systemowner.dashboard');
  
  // Admin Dashboard (accessible to all authenticated users)
  Route::get('/admin/dashboard', [AuthController::class, 'index'])->name('admin.dashboard');
});

// Route::prefix('users')->middleware('auth')->group(function () {
//   Route::get('create', [UserController::class, 'create'])->name('users.create');
//   Route::post('store', [UserController::class, 'store'])->name('users.store');
//   Route::get('index', [UserController::class, 'index'])->name('users.index'); 
//   Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
//   Route::put('update/{id}', [UserController::class, 'update'])->name('users.update');
//   Route::delete('{user}', [UserController::class, 'destroy'])->name('users.destroy');

// });
//  Route::prefix('roles')->middleware('auth')->group(function () {
//   Route::get('create', [RoleController::class, 'create'])->name('role.create');
//   Route::get('index',[RoleController::class,'index'])->name('role.index');
//   Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
//   Route::get('{role}/edit', [RoleController::class, 'edit'])->name('role.edit'); // Define the edit route
//   Route::put('{role}', [RoleController::class, 'update'])->name('role.update'); // Define the update route
//   Route::delete('{role}', [RoleController::class, 'destroy'])->name('role.destroy'); // Define the delete route
// });
Route::get("/login",[AuthController::class,"Login"])
   ->name("login");
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');   
Route::post("/login",[AuthController::class,"LoginPost"])
 ->name("login.post");
Route::get("/register",[AuthController::class,"Register"])
  ->name("register");


Route::post("/register",[AuthController::class,"RegisterPost"])
  ->name("register.post");

Route::get('/profile/settings', [AuthController::class, 'settings'])->name('profile.settings');
Route::put('/profile/update', [AuthController::class, 'update'])->name('profile.update');

Route::get('/activity/log', [AuthController::class, 'activityLog'])->name('activity.log');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

  
// Route::prefix('customer')->group(function () {
//   // Authentication routes
//   Route::get('/register', [CustomerController::class, 'showRegisterForm'])->name('customer.register');
//   Route::post('/register', [CustomerController::class, 'register'])->name('customer.registerr');
//   Route::get('/login', [CustomerController::class, 'showLoginForm'])->name('customer.login');
//   Route::post('/login', [CustomerController::class, 'login'])->name('customer.loginn');
//   Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');

  // Product and Order routes
  //Route::get('/products', [CustomerController::class, 'listProducts'])->name('customer.products');
 // Route::post('/products/search', [CustomerController::class, 'searchProducts'])->name('customer.products.search');
 // Route::post('/cart/add', [CustomerController::class, 'addToCart'])->name('customer.cart.add');
  //Route::get('/cart', [CustomerController::class, 'viewCart'])->name('customer.cart');
  //Route::post('/checkout', [CustomerController::class, 'checkout'])->name('customer.checkout');

//cart
//Route::post('/cart/add', [CartController::class, 'add'])->name('customer.cart.add');
//Route::get('/cart', [CartController::class, 'view'])->name('customer.cart');
//Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('customer.cart.remove');
//Route::get('/checkout', [CartController::class, 'checkout'])->name('customer.checkout');

// Route::prefix('department')->group(function () {
    //   Route::get('create', [DepartmentController::class, 'create'])->name('department.create');
    //   Route::post('store',[DepartmentController::class,'store'])->name('department.store');
    //   Route::get('index', [DepartmentController::class, 'index'])->name('department.index');
    // });

    Route::resource('product', App\Http\Controllers\ProductController::class);
    
  
    // Category routes

  Route::resource('category',App\Http\Controllers\CategoryController::class);
  
  Route::resource('permissions',App\Http\Controllers\PermissionController::class);
  Route::get('permissions/{permissionId}/delete',[App\Http\Controllers\PermissionController::class,'destroy']);

  
  Route::resource('roles',App\Http\Controllers\RoleController::class);
  Route::get('roles/{roleId}/delete',[App\Http\Controllers\RoleController::class,'destroy'])->
       middleware('permission:Delete Roles');
  Route::get('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class,'addPermissionToRole']);
  Route::put('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class,'givePermissionToRole']);
  
  Route::resource('users',App\Http\Controllers\UserController::class);
  
  

  

