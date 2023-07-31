<?php

namespace App\Services\Api\ExtraWork;

use App\Models\ExtraWork\ExtraWork;
use Illuminate\Database\Eloquent\Collection;

class ExtraWorkService
{
    /**
     * Получить список доп работ
     *
     * @return Collection|array
     */
    public function getExtraWorkList(): Collection|array
    {
        return ExtraWork::all();
    }
}
