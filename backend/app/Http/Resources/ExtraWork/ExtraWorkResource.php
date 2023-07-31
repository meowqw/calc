<?php

namespace App\Http\Resources\ExtraWork;

use App\Models\ExtraWork\ExtraWork;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExtraWorkResource extends JsonResource
{
    /** @var ExtraWork */
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
            'cost' => $this->resource->getCost()
        ];
    }
}
