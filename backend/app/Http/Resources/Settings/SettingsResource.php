<?php

namespace App\Http\Resources\Settings;

use App\Models\Settings\Settings;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
{
    /** @var Settings */
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
            'startPrice' => 6000,
            'logisticPrice' => 1000
        ];
    }
}
