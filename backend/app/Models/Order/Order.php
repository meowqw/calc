<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property string|null $note;
 * @property string|null $address;
 * @property string $date;
 * @property string $time;
 * @property int $client_id;
 *
 */
class Order extends Model
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
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     * @return Order
     */
    public function setNote(?string $note): Order
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return Order
     */
    public function setAddress(?string $address): Order
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return Order
     */
    public function setDate(string $date): Order
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     * @return Order
     */
    public function setTime(string $time): Order
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    /**
     * @param int $clientId
     * @return Order
     */
    public function setClientId(int $clientId): Order
    {
        $this->client_id = $clientId;
        return $this;
    }


}
