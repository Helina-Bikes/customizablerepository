<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SystemOwnerDashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\CheckSystemOwnerRole;

Route::resource('permissions', PermissionController::class);
Route::middleware(['auth'])->group(function () {
  // System Owner Dashboard
  Route::get('/systemowner-dashboard', [SystemOwnerDashboardController::class, 'index'])
      ->middleware('checksystemowner')
      ->name('systemowner.dashboard');

  // Admin Dashboard
  Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');    
});
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
Route::resource('department', App\Http\Controllers\DepartmentController::class);
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
  
  

  

