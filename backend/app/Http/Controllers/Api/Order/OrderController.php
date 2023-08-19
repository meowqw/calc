<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Services\Api\Order\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Добавить заказ
     *
     * @param CreateOrderRequest $request
     * @param OrderService $service
     * @return JsonResponse
     */
    public function store(CreateOrderRequest $request, OrderService $service): JsonResponse
    {
        return response()->json([
            'result' =>  $service->createOrder($request->getData())
        ]);

    }

    /**
     * Удаление заказа
     *
     * @param int $id
     * @param OrderService $service
     * @return JsonResponse
     */
    public function destroy(int $id, OrderService $service): JsonResponse
    {
        return response()->json([
            'result' =>  $service->deleteOrder($id)
        ]);
    }
}
