<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProveedorLogin;
use App\Models\Empleado;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Log;
use Cache;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        Auth::logout();
        return redirect()
                        ->route('register')
                        ->with(array('register'=>"Registro Exitoso, por favor compruebe su correo para activar la cuenta !"));
    }

    public function showFormAdmin(){
        return view('auth.admin.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => "https://ui-avatars.com/api/?name=".$data['name']."&rounded=true&size=32",
        ]);
    }

    public function registerWithProveedorRedirect($proveedor,Request $request){
        if($request->session()->exists("auth")){
            $request->session()->forget("auth");
        }
        session(array("auth"=>"register"));
        return Socialite::driver("{$proveedor}")->redirect();
    }

    public function registerWithProveedorCallback($proveedor){
        $user = Socialite::driver("{$proveedor}")->userFromToken(session("token_user"));
        if($this->existsUser($user)){
            return redirect()
                            ->route('register')
                            ->withErrors(array("register"=>"El usuario ya existe"));
        }
        $userModel = User::create(array(
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "password" => Hash::make($user->getId()),
            "proveedor_login_id" => ProveedorLogin::firstWhere("nombre",'=',$proveedor)->id,
            'avatar' => $user->getAvatar(),
        ));
        $userModel->email_verified_at = now();
        Auth::login($userModel,$remember = true);
        Cache::flush();
        return redirect()
                        ->route('home');
        // return redirect()
        //                 ->route('register')
        //                 ->with(array("register"=>"Para completar el proceso de registro por favor revise su email"));
    }

    public function registerEmpleado(Request $request){
        Validator::make($request->all(),[
            'nombre' => ['string','required'],
            'email' => ['string','unique:empleados','email'],
            'password' => ['string','min:8','confirmed'],
            'telefono' => ['string','required']
        ])->validate();
        
       $empleado = Empleado::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'role_id' => 1,
            'avatar' => "https://ui-avatars.com/api/?name={$request->nombre}"
       ]); 
        return $empleado;
    }

    private function existsUser($user){
        return User::firstWhere("email","=",$user->getEmail()) ? true : false;
    }
}
