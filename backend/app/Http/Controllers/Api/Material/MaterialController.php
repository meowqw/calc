<?php

namespace App\Http\Controllers\Api\Material;

use App\Http\Controllers\Controller;
use App\Http\Resources\Material\MaterialResource;
use App\Services\Api\Material\MaterialService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MaterialController extends Controller
{
    /**
     * Получить список материалов
     *
     * @param MaterialService $materialService
     * @return AnonymousResourceCollection
     */
    public function index(MaterialService $materialService): AnonymousResourceCollection
    {
        $data = $materialService->getMaterialList();
        return MaterialResource::collection($data);
    }
}
