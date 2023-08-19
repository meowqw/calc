<?php

namespace App\Models\Client;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id;
 * @property string $phone;
 * @property string|null $full_name;
 * @property string|null $email;
 *
 * @property-read HasMany $order;
 */
class Client extends Model
{
    protected $guarded = ['id'];

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
     * @return Client
     */
    public function setId(int $id): Client
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Client
     */
    public function setPhone(string $phone): Client
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    /**
     * @param string|null $fullName
     * @return Client
     */
    public function setFullName(?string $fullName): Client
    {
        $this->full_name = $full_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Client
     */
    public function setEmail(?string $email): Client
    {
        $this->email = $email;
        return $this;
    }



    /**
     * @return HasMany
     */
    public function order(): HasMany
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }
}
