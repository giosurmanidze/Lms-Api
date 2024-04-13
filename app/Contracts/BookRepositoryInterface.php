<?php

namespace App\Contracts;

use App\Models\Book;

interface BookRepositoryInterface
{
   public function store(array $data): Book;

}
