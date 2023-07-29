<?php

namespace App\Http\Resources\Coefficient;

use App\Models\Coefficient\Coefficient;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoefficientResource extends JsonResource
{
    /** @var Coefficient */
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
            'value' => $this->resource->getValue(),
            'startPrice' => $this->resource->getStartPrice()
        ];
    }
}
