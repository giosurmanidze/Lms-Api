<?php

namespace App\Contracts;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

interface BookRepositoryInterface
{
   public function all(): Collection;
   public function store(array $data): Book;
   public function update(array $data, Book $book);
   public function destroy(Book $book);
}
