<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSystemOwnerRole
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has the "System Owner" role
        if (Auth::check() && Auth::user()->hasRole('System Owner')) {
            return $next($request); // Allow the request to proceed
        }

        // If not a System Owner, redirect to a different page, e.g., the admin dashboard
        return redirect()->route('admin.dashboard'); // Redirect to the admin dashboard or any other page
    }
}
