<?php

namespace Core\User\Controllers;

use Core\DTOs\UserDTO;
use Illuminate\Http\Request;
use Core\User\Cases\CreateUser;
use App\Http\Controllers\Controller;
use Core\User\Cases\UpdateUser;

class UserController extends Controller
{
    public function store(Request $request, CreateUser $case){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $payload = new UserDTO(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
        );

        return $case->execute($payload);
    }

    public function update(Request $request, UpdateUser $case){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $payload = new UserDTO(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
        );

        return $case->execute($request->id, $payload);
    }      
}