<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function index()
    {
        return Order::paginate();
    }

    public function store(OrderStoreRequest $request)
    {
        return Order::create(
            $request->validated(),
        );
    }

    public function show(Order $order)
    {
        return $order;
    }

    public function update(OrderUpdateRequest $request, Order $order)
    {
        $order->update($request->validated());

        return $order;
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
