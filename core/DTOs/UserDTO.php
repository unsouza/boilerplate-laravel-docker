<?php

namespace Core\DTOs;

class UserDTO {
    function __construct(
    public string $name,
    public string $email,
    public ?string $password = null
    ) {}
}