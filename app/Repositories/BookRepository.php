<?php

namespace App\Repositories;
use App\Contracts\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookRepository implements BookRepositoryInterface
{
    
    public function all(): Collection
    {
        return Book::with(['authors'])->get();
    }

    public function store(array $data): Book
    {
        $book = Book::create($data);
        $book->authors()->attach($data['author_ids']);
        return $book;
    }

    public function update(array $data, Book $book)
    {
        $book->update($data);
        $book->authors()->sync($data['author_ids']);
        return $book->fresh();
    }

    public function destroy(Book $book) 
    {
        return $book->delete();
    }
}