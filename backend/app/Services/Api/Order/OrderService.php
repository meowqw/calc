<?php

namespace App\Services\Api\Order;

use App\Models\Order\Order;
use App\Services\Api\Client\ClientService;
use App\Services\Api\Order\DTO\CreateOrderDTO;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class OrderService
{
    private ClientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Создание заказа
     *
     * @param CreateOrderDTO $createOrderDTO
     * @return bool
     */
    public function createOrder(CreateOrderDTO $createOrderDTO): bool
    {
        $clientId = $this->clientService->createClient($createOrderDTO);
        $order = new Order();
        $order
            ->setNote($createOrderDTO->getNote())
            ->setAddress($createOrderDTO->getAddress())
            ->setDate($createOrderDTO->getDate())
            ->setTime($createOrderDTO->getTime())
            ->setClientId($clientId);

        return $order->save();
    }

    /**
     * Удалить заказ
     *
     * @param int $id
     * @return bool|mixed|null
     */
    public function deleteOrder(int $id): mixed
    {
        $order = Order::query()->find($id);
        if (is_null($order)) {
            throw new Exception('Заказа несуществует');
        }
        return $order->delete();
    }
}
