<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Responsables\HomeAdminIndex;
use Auth;

class HomeAdminController extends Controller{

    public function __construct(){
        $this->middleware("auth:empleados");
    }

    public function index(Request $request){
        return new HomeAdminIndex();
    }
}
