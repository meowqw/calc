<?php

namespace App\Services\Api\Crown;

use App\Models\Crown\Crown;
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
        return Crown::all();
    }
}
