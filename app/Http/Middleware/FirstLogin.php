<?php

namespace App\Http\Middleware;

use Closure;
use App\Professor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class FirstLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->first_login == 0
            && !is_null(Auth::user()->details())) {
    		$professor = Auth::user()->getRelatedInfo();
            return redirect(route('firstlogin', $professor));
        }
        
        return $next($request);
    }
}
