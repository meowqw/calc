<?php

namespace App\Services\Api\Settings;

use App\Models\Settings\Settings;
use Illuminate\Database\Eloquent\Collection;

class SettingsService
{
    /**
     * Получить натсройки
     *
     * @return Settings[]|Collection
     */
    public function getSettings(): Collection|array
    {
        return Settings::all();
    }

}
