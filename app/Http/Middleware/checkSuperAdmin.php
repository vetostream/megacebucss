<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $user;

    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if(!$user) return redirect('home');
        if($user->user_type_id != 4 ) return redirect('home');

        return $next($request);
    }
}
