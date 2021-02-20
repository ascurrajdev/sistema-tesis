<?php
namespace App\Repositories\Users;

use App\Models\User;

class IUsersRepositoryImpl implements IUsersRepository{

    public function getAllUsers(){
        return User::withCount('agendamientos')->paginate(25);
    }
    public function getAllUsersCount(){
        return (User::all())->count();
    }
}