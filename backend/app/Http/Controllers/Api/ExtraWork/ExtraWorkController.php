<?php

namespace App\Http\Controllers\Api\ExtraWork;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExtraWork\ExtraWorkResource;
use App\Services\Api\ExtraWork\ExtraWorkService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ExtraWorkController extends Controller
{
    /**
     * Получить список доп работ
     *
     * @param ExtraWorkService $extraWorkService
     * @return AnonymousResourceCollection
     */
    public function index(ExtraWorkService $extraWorkService): AnonymousResourceCollection
    {
        $data = $extraWorkService->getExtraWorkList();
        return ExtraWorkResource::collection($data);
    }
}
