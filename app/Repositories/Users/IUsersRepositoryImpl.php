<?php
namespace App\Repositories\Users;

use App\Models\User;

class IUsersRepositoryImpl implements IUsersRepository{

    public function getAllUsersCount(){
        return (User::all())->count();
    }
}