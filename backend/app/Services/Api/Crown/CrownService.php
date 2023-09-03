<?php

namespace App\Services\Api\Crown;

use App\Models\Crown\Crown;
use App\Models\TwoCalcCrown\TwoCalcCrown;
use Illuminate\Database\Eloquent\Collection;

class CrownService
{
    /**
     * Получить список коронок
     *
     * @return Collection|array
     */
    public function getCrownList(): Collection|array
    {
        return Crown::query()->where('code', Crown::CODE_ONE_CALC)->get();
    }

    /**
     * Получить коронку для 2 калькудятора
     *
     * @return object
     */
    public function getCrownTwoCalc(): object
    {
        return Crown::query()->where('code', Crown::CODE_TWO_CALC)->first();
    }
}
