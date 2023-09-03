<?php

namespace App\Services\Api\Settings;

use App\Models\Settings\Settings;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SettingsService
{
    /**
     * Получить натсройки
     *
     * @return object
     */
    public function getSettings(): object
    {
        return Settings::all();
    }

}
