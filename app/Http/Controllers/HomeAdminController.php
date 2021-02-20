<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Responsables\HomeAdminIndex;
use Auth;

class HomeAdminController extends Controller{

    public function index(Request $request){
        return new HomeAdminIndex();
    }
}
