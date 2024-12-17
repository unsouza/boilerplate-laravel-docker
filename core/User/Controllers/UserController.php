<?php

namespace Core\User\Controllers;

use App\Http\Controllers\Controller;
use Core\DTOs\UserDTO;
use Core\User\Cases\CreateUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request, CreateUser $case){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        
        $payload = new UserDTO(
            name: $data['name'],
            email: $data['email'],
        );

        return $case->execute($payload);
    }
}