<?php

namespace App\Models\Crown;

use App\Models\Material\Material;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id;
 * @property string $name;
 *
 * @property-read BelongsToMany $materials
 */
class Crown extends Model
{
    use HasFactory;

    const
        CODE_ONE_CALC = 'one',
        CODE_TWO_CALC = 'two';

    const
        CODE_ONE_CALC_NAME = 'Бурение',
        CODE_TWO_CALC_NAME = 'Периметр';

    const CODE_NAMES = [
        self::CODE_ONE_CALC => self::CODE_ONE_CALC_NAME,
        self::CODE_TWO_CALC => self::CODE_TWO_CALC_NAME
    ];

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
     * @return BelongsToMany
     */
    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class)->withPivot('cost');
    }
}
