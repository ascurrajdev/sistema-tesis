<?php

namespace App\Services;

use App\Repositories\Users\IUsersRepository;

class UserService {

    private $userRepository;
    public function __construct(){
        $this->userRepository = resolve(IUsersRepository::class);
    }

    public function getAll(){
        return $this->userRepository->getAllUsers();    
    }

    public function getCount(){
        return $this->userRepository->getAllUsersCount();
    }
}