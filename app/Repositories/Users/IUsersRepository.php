<?php
namespace App\Repositories\Users;

interface IUsersRepository{

    public function getAllUsers();
    public function getAllUsersCount();
}