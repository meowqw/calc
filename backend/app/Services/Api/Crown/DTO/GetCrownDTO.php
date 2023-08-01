<?php

namespace App\Services\Api\Crown\DTO;

class GetCrownDTO
{
    /** @var ?string */
    private ?string $name = null;

    /** @var ?int */
    private ?int $cost = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getCost(): ?int
    {
        return $this->cost;
    }

    /**
     * @param int|null $cost
     */
    public function setCost(?int $cost): void
    {
        $this->cost = $cost;
    }
}
