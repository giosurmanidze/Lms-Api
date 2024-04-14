<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Contracts\AuthorRepositoryInterface;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Resources\AuthorResource;

class AuthorController extends Controller
{
    private AuthorRepositoryInterface $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function store(StoreAuthorRequest $request)
    {
        try{
            $author = $this->authorRepository->store($request->validated());
            return ApiResponseClass::sendResponse(new AuthorResource($author), "Author Create Successful", 201);
        }catch(\Exception $ex)
        {
            return ApiResponseClass::rollback($ex, $ex->getMessage());
        }
    }
}
