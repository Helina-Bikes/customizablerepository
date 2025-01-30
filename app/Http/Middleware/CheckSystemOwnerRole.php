<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckSystemOwnerRole
{
    public function handle(Request $request, Closure $next):Response
    {
        // Check if the authenticated user exists and has the 'System Owner' role
        if (Auth::check() && Auth::user()->hasRole('System Owner')) {
            
            return $next($request); // Allow request to continue
        }

        // If user doesn't have the role, redirect to the admin dashboard
        return redirect()->route('admin.dashboard');
    }
}

