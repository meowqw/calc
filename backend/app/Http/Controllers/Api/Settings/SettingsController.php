<?php

namespace App\Http\Controllers\Api\Settings;

use App\Http\Controllers\Controller;
use App\Http\Resources\Settings\SettingsResource;
use App\Services\Api\Settings\SettingsService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SettingsController extends Controller
{
    /**
     * Получить список материалов
     *
     * @param SettingsService $settingsService
     * @return AnonymousResourceCollection
     */
    public function index(SettingsService $settingsService): AnonymousResourceCollection
    {
        $data = $settingsService->getSettings();
        return SettingsResource::collection($data);
    }
}
