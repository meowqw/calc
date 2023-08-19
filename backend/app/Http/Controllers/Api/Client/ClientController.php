<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\Client\ClientPhoneResource;
use App\Http\Resources\Client\ClientResource;
use App\Services\Api\Client\ClientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Получить список клиентов
     *
     * @param ClientService $service
     * @return AnonymousResourceCollection
     */
    public function index(ClientService $service): AnonymousResourceCollection
    {
        $data = $service->getClientList();
        return ClientResource::collection($data);
    }

    /**
     * Поиск телефона
     *
     * @param string $phone
     * @param ClientService $service
     * @return AnonymousResourceCollection
     */
    public function getPhone(string $phone, ClientService $service): AnonymousResourceCollection
    {
        return ClientPhoneResource::collection($service->getPhone($phone));
    }

    /**
     * получить клинета
     *
     * @param int $id
     * @param ClientService $service
     * @return ClientResource
     */
    public function show(int $id, ClientService $service): ClientResource
    {
        return new ClientResource($service->getClient($id));
    }

    /**
     * Удаление заказа
     *
     * @param int $id
     * @param ClientService $service
     * @return JsonResponse
     */
    public function destroy(int $id, ClientService $service): JsonResponse
    {
        return response()->json([
            'result' =>  $service->deleteClient($id)
        ]);
    }
}
