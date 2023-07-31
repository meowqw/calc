<?php

namespace App\Services\Api\Coefficient;

use App\Models\Coefficient\Coefficient;
use Illuminate\Database\Eloquent\Collection;

class CoefficientService
{
    /**
     * Получить список коэфициентов
     *
     * @return Collection|array
     */
    public function getCoefficientList(): Collection|array
    {
        return Coefficient::all();
    }
}
