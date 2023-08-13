<?php

namespace App\Http\Controllers\Api\Logistic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Logistic\LogisticRequest;
use App\Services\Api\Logistic\LogisticService;

class LogisticController extends Controller
{
    /**
     * Рассчет цены на логистику
     *
     * @param LogisticRequest $request
     * @param LogisticService $logisticService
     * @return void
     */
    public function calculatePrice(LogisticRequest $request, LogisticService $logisticService): void
    {
        $request->validated();

        $price = $logisticService->calculatePrice(
            $request->getLocationName(),
            $request->getCoords()
        );

    }
}
