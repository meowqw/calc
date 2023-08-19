<?php

namespace App\Services\Api\Client;

use App\Models\Client\Client;
use App\Services\Api\Order\DTO\CreateOrderDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Mockery\Exception;

class ClientService
{
    /**
     * Создание клиента
     *
     * @param CreateOrderDTO $createOrderDTO
     * @return int
     */
    public function createClient(CreateOrderDTO $createOrderDTO): int
    {
        /** @var Client $client */
        $client = Client::query()
            ->firstOrCreate(
                ['phone' => $createOrderDTO->getPhone()],
                [
                    'email' => $createOrderDTO->getEmail(),
                    'full_name' => $createOrderDTO->getFullName()]
            )->first();

        return $client->getId();
    }

    /**
     * Получить список клиентов
     *
     * @return Collection|array
     */
    public function getClientList(): Collection|array
    {
        return Client::query()->with('order')->get();
    }

    /**
     * оплучить списко телефонов
     *
     * @param string $phone
     * @return Collection|Builder[]
     */
    public function getPhone(string $phone): Collection|array
    {
        return Client::query()->where('phone', 'like', "%$phone%")->get();
    }

    /**
     * Получить коиента по id
     *
     * @param int $id
     * @return Client
     */
    public function getClient(int $id): Client
    {
        $client = Client::query()->find($id);

        if (is_null($client)) {
            throw new Exception('Клиента с таким id нет');
        }
        return $client->first();
    }

    /**
     * Удалить клиента
     *
     * @param int $id
     * @return bool|mixed|null
     */
    public function deleteClient(int $id): mixed
    {
        $client = Client::query()->find($id);

        if (is_null($client)) {
            throw new Exception('Клиента с таким id нет');
        }
        return $client->delete();
    }
}
