<?php

namespace App\Models\Coefficient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property string $name;
 * @property float $value;
 * @property int $start_price;
 */
class Coefficient extends Model
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
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value): void
    {
        $this->value = $value;
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
}
