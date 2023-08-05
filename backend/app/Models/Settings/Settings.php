<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $start_price
 * @property int $logistic_price
 */
class Settings extends Model
{
    use HasFactory;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getStartPrice(): int
    {
        return $this->start_price;
    }

    /**
     * @param int $startPrice
     */
    public function setStartPrice(int $startPrice): void
    {
        $this->start_price = $startPrice;
    }

    /**
     * @return int
     */
    public function getLogisticPrice(): int
    {
        return $this->logistic_price;
    }

    /**
     * @param int $logisticPrice
     */
    public function setLogisticPrice(int $logisticPrice): void
    {
        $this->logistic_price = $logisticPrice;
    }
}
