<?php

namespace App\Http\Resources\Crown;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CrownMaterialsResource extends JsonResource
{
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
            'name' => $this->resource->name,
            'cost' => $this->resource->pivot->cost,
        ];
    }
}
