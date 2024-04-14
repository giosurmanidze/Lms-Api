<?php

namespace App\Contracts;

use App\Models\Author;

interface AuthorRepositoryInterface
{
    public function store(array $data): Author;
}
