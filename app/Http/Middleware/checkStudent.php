<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkStudent
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
        
        if($user->user_type_id !== 2){
            return redirect()->back()->with('error','Only students are allowed to exhibit research');
        }
        
        return $next($request);
    }
}
