<?php

namespace App\Http\Resources\Crown;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CrownTwoCalcResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => 1,
            'size' => 130,
            'materials' => [
                [
                    "id" => 10,
                    "cost" => "36",
                    "name" => "Бетон"
                ],
                [
                    "id" => 12,
                    "cost" => "45",
                    "name" => "армированный бетон"
                ],
                [
                    "id" => 13,
                    "cost" => "22",
                    "name" => "Кирпич,Газоблок"
                ]
            ]
        ];
    }
}
