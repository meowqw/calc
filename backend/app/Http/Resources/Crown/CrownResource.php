<?php

namespace App\Http\Resources\Crown;

use App\Models\Crown\Crown;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CrownResource extends JsonResource
{
    /** @var Crown */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->getId(),
            'name' => $this->resource->getName(),
        ];
    }
}
