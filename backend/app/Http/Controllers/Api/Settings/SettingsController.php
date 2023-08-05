<?php

namespace App\Http\Controllers\Api\Settings;

use App\Http\Controllers\Controller;
use App\Http\Resources\Settings\SettingsResource;
use App\Services\Api\Settings\SettingsService;

class SettingsController extends Controller
{
    /**
     * Получить список материалов
     *
     * @param SettingsService $settingsService
     * @return SettingsResource
     */
    public function index(SettingsService $settingsService): SettingsResource
    {
        $data = $settingsService->getSettings();
        return new SettingsResource($data);
    }
}
