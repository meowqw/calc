<?php

namespace App\Services\Api\Logistic;

class LogisticService
{
    public function calculatePrice(string $locationName, array $coords)
    {
        dd($locationName, $coords);

        return 1;
    }
}
