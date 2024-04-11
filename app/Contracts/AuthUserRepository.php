<?php

namespace App\Contracts;

interface AuthUserRepository
{
    public function register(array $data);
}