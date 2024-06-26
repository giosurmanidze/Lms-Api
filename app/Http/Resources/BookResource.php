<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'publication_date' => $this->publication_date,
            'quantity_available' => $this->quantity_available,
            'authors' => AuthorResource::collection($this->whenLoaded('authors'))
        ];
    }
}
