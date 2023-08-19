<?php

namespace App\Http\Resources\Order;

use App\Models\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /** @var Order $resource */
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->getId(),
            'address' => $this->resource->getAddress(),
            'note' => $this->resource->getNote(),
            'date' => $this->resource->getDate(),
            'time' => $this->resource->getTime()
        ];
    }
}
