<?php

namespace App\Repositories;

use App\Contracts\AuthorRepositoryInterface;
use App\Models\Author;
use App\Models\Book;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function store(array $data): Author
    {   
        return Author::create($data);
    }
}