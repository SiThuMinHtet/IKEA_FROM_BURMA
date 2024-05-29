<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class   AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(auth('admin')->user());
        if (auth('admin')->check()) {
            // dd(auth('admin')->user()->role);
            if (auth('admin')->user()->role->name == 'Admin' || auth('admin')->user()->role->name == 'Staff' ||  auth('admin')->user()->role->name == 'Manager') {
                return $next($request);
            }
        }
        return redirect('/admin/login/')->with('error', 'You don\'t have Customer Access!');
    }
}
