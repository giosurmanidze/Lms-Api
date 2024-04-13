<?php

namespace App\Repositories;
use App\Contracts\BookRepositoryInterface;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    
    public function all()
    {
        return Book::with(['authors'])->get();
    }

    public function store(array $data): Book
    {
        return Book::create($data);
    }
}