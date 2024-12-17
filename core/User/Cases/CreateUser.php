<?php

namespace Core\User\Cases;

use Core\DTOs\UserDTO;
use Core\User\Entities\User;
use Illuminate\Support\Facades\Hash;

class CreateUser{
    public function execute(UserDTO $payload){
        $user = User::create([
            'name' => $payload->name,
            'email' => $payload->email,
        ]);

        return $user;
    }
}