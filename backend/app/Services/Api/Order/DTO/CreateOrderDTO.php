<?php

namespace App\Services\Api\Order\DTO;

class CreateOrderDTO
{
    /** @var string $phone */
    private string $phone;

    /** @var string $email */
    private string $email;

    /** @var string|null $fullName */
    private string|null $fullName;

    /** @var string|null $address */
    private string|null $address;

    /** @var string $date */
    private string $date;

    /** @var string $time */
    private string $time;

    /** @var string|null $note */
    private string|null $note;

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return CreateOrderDTO
     */
    public function setPhone(string $phone): CreateOrderDTO
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string|null $fullName
     * @return CreateOrderDTO
     */
    public function setFullName(?string $fullName): CreateOrderDTO
    {
        $this->fullName = $fullName;
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
     * @return CreateOrderDTO
     */
    public function setAddress(?string $address): CreateOrderDTO
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
     * @return CreateOrderDTO
     */
    public function setDate(string $date): CreateOrderDTO
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
     * @return CreateOrderDTO
     */
    public function setTime(string $time): CreateOrderDTO
    {
        $this->time = $time;
        return $this;
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
     * @return CreateOrderDTO
     */
    public function setNote(?string $note): CreateOrderDTO
    {
        $this->note = $note;
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
     * @return CreateOrderDTO
     */
    public function setEmail(?string $email): CreateOrderDTO
    {
        $this->email = $email;
        return $this;
    }
}
