<?php

namespace App\Services\Api\Material;

use App\Models\Material\Material;
use Illuminate\Database\Eloquent\Collection;

class MaterialService
{
    /**
     * Получить список материалов
     *
     * @return Collection|array
     */
    public function getMaterialList(): Collection|array
    {
        return Material::all();
    }
}
