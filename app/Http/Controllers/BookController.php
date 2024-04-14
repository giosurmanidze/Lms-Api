<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Contracts\BookRepositoryInterface;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    private BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        $data = $this->bookRepository->all();

        return ApiResponseClass::sendResponse(BookResource::collection($data),'',200);
    }

    public function store(StoreBookRequest $request)
    {
        try{
             $book = $this->bookRepository->store($request->validated());
             return ApiResponseClass::sendResponse(new BookResource($book),'Book Create Successful',201);
        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex, $ex->getMessage());
        }
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        try{
             $book = $this->bookRepository->update($request->validated(), $book);
             return ApiResponseClass::sendResponse(new BookResource($book),'Book Update Successful',201);
        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex, $ex->getMessage());
        }
    }

    public function destroy(Book $book)
    {
        $this->bookRepository->destroy($book);

        return ApiResponseClass::sendResponse('',"Book delete Successful", 204);
    }
}
