<?php

namespace App\Http\Controllers\Api\Coefficient;

use App\Http\Controllers\Controller;
use App\Http\Resources\Coefficient\CoefficientResource;
use App\Services\Api\Coefficient\CoefficientService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CoefficientController extends Controller
{
    /**
     * Получить список коэфициентов
     *
     * @param CoefficientService $coefficientService
     * @return AnonymousResourceCollection
     */
    public function index(CoefficientService $coefficientService): AnonymousResourceCollection
    {
        $data = $coefficientService->getCoefficientList();
        return CoefficientResource::collection($data);
    }
}
