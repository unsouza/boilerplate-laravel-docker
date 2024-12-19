<?php

namespace Core\User\Cases;

use Core\DTOs\UserDTO;
use Core\User\Entities\User;
use Illuminate\Support\Facades\Hash;

class UpdateUser{
    public function execute(int $id, UserDTO $payload){
        $user = User::findOrFail($id);

        $user->fill([
            'name' => $payload->name,
            'email' => $payload->email,
        ]);

        if($payload->password){
            $user->fill(['password' => Hash::make($payload->password)]);
        }
        
        $user->save();

        return ['user_updated' => true];
    }
}