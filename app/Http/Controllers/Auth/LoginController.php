<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\ActivationService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    //protected $redirectTo = '/posts';
    protected $activationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->activationService = $activationService;
    }
    
    //public function authenticate()
    //{
    //    if(Auth::attempt(['email'=>$email,'password'=>$password])){
    //        $user = User::where('email',$email)->first();
    //        if(!$user->activated){
    //            $this->activationService->sendActivationMail($user);
    //            Auth::logout();
    //            return redirect('/login')->with('status','Check your email address, we sent you an activation link!');
    //        }
    //        
    //        return redirect('/posts');
    //    }
    //}
    //
    //public function logout(){
    //    Auth::logout();
    //    return redirect('/login');
    //}
}
