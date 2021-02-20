<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UsersController extends Controller
{
    private $userService;
    public function __construct(){
        $this->userService = resolve(UserService::class);
    }
    public function index(){
        return view("usuarios.index",[
            "usuarios" => $this->userService->getAll()
        ]);
    }

}
