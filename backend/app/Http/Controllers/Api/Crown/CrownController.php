<?php

namespace App\Http\Controllers\Api\Crown;

use App\Http\Controllers\Controller;
use App\Http\Resources\Crown\CrownResource;
use App\Services\Api\Crown\CrownService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CrownController extends Controller
{
    /**
     * Получить список коронок
     *
     * @param CrownService $crownService
     * @return AnonymousResourceCollection
     */
    public function index(CrownService $crownService): AnonymousResourceCollection
    {
        $data = $crownService->getCrownList();
        return CrownResource::collection($data);
    }
}
