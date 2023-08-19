<?php

namespace App\Http\Resources\Client;

use App\Http\Resources\Order\OrderResource;
use App\Models\Client\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /** @var Client $resource */
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
            'phone' => $this->resource->getPhone(),
            'email' => $this->resource->getEmail(),
            'fullName' => $this->resource->getFullName(),
            'orders' => OrderResource::collection($this->resource->order)
        ];
    }
}
