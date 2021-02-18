<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Cache;
use Hash;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:empleados')->except('logout');
    }

    protected function redirectTo(){
        if(Auth::guard('empleados')->check()){
            return '/admin/home';
        }
        return '/home';
    }

    public function showLoginAdmin(Request $request){
        return view('auth.admin.login');
    }
    
    public function loginProveedorRedirect($proveedor,Request $request){
        if($request->session()->exists('auth')){
            $request->session()->forget('auth');
        }
        session(array("auth"=>"login"));
        return Socialite::driver("{$proveedor}")->redirect();
    }
    
    public function handleLoginAdmin(Request $request){
        if(Auth::guard('empleados')->attempt($request->only(['email','password']))){
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }
        return redirect("admin/login")
                ->withErrors([
                    'email' => __('auth.failed')
                ]);
    }

    public function loginProveedorCallback($proveedor){
        $user = Socialite::driver("{$proveedor}")->userFromToken(session("token_user"));
        $userModel = User::with('proveedor')->firstWhere('email','=',$user->getEmail());
        if($userModel){
            if($this->isAuthorized($userModel,$proveedor)){
                Auth::login($userModel,$remember = true);
                return redirect()
                                ->route('home');
            }
        }
        Cache::flush();
        return redirect()
                    ->route('login')
                    ->withErrors(array(
                        "email" => __('auth.failed')
                    ));
    }

    private function isAuthorized($userModel,$proveedor){
        return (strcmp(strtolower($userModel->proveedor->nombre),strtolower($proveedor)) == 0);
    }
}
