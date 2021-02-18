<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller{
    
    public function callbackSocial($driver,Request $request){
        $user = Socialite::driver("{$driver}")->user();
        $authSelected = session("auth");
        if($request->session()->exists('token_user')){
            $request->session()->forget('token_user');
        }
        session(array("token_user"=>$user->token));
        return redirect("/{$authSelected}/{$driver}/callback");
    }
}