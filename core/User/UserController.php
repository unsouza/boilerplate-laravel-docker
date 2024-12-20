<?php

namespace Core\User;

use Illuminate\Http\Request;
use Core\User\Cases\CreateUser;
use Core\User\Cases\UpdateUser;
use App\Http\Controllers\Controller;
use Core\User\DTOs\UserDTO;

class UserController extends Controller
{
    public function store(Request $request, CreateUser $case)
    {
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

    public function update(Request $request, UpdateUser $case)
    {
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
