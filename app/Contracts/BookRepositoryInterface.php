<?php

namespace App\Contracts;

use App\Models\Book;

interface BookRepositoryInterface
{
   public function all();
   public function store(array $data): Book;

}
