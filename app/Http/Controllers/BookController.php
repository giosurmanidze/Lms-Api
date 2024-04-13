<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Contracts\BookRepositoryInterface;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    private BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function store(StoreBookRequest $request)
    {
        DB::beginTransaction();
        try{
             $book = $this->bookRepository->store($request->validated());

             DB::commit();
             return ApiResponseClass::sendResponse(new BookResource($book),'Book Create Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }
}
