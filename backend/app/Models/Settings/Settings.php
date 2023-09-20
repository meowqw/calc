<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $value
 * @property int $code
 */
class Settings extends Model
{
    use HasFactory;

    const
        CODE_LOGISTIC_PRICE = 'logistic',
        CODE_START_PRICE = 'start',
        CODE_PERIMETER_PRICE = 'perimeter',
        CODE_CUTTING_PRICE = 'cutting',
        CODE_PRICE_HOLE = 'hole';

    const
        CODE_LOGISTIC_PRICE_NAME = 'Логистика',
        CODE_START_PRICE_NAME = 'Начальная цена',
        CODE_CUTTING_PRICE_NAME = 'Цена Резка за 1 м2',
        CODE_PRICE_HOLE_NAME = 'Цена Резка за 1 Отверстие';

    const CODE_NAMES = [
        self::CODE_LOGISTIC_PRICE => self::CODE_LOGISTIC_PRICE_NAME,
        self::CODE_START_PRICE => self::CODE_START_PRICE_NAME,
        self::CODE_CUTTING_PRICE => self::CODE_CUTTING_PRICE_NAME,
        self::CODE_PRICE_HOLE => self::CODE_PRICE_HOLE_NAME,
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Settings
     */
    public function setValue(string $value): Settings
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Settings
     */
    public function setCode(string $code): Settings
    {
        $this->code = $code;
        return $this;
    }


}
