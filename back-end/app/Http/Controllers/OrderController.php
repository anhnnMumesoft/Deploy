<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getAllOrders(Request $request)
    {
        $data = $request->only(['limit', 'offset', 'statusId']);
        $result = $this->orderService->getAllOrders($data);
        return response()->json($result);
    }
    public function getDetailOrderById(Request $request)
    {
        $result = $this->orderService->getDetailOrderById($request->id);
        return response()->json($result);
    }
    public function updateStatusOrder(Request $request)
    {
        $data = $request->all();
        $result = $this->orderService->updateStatusOrder($data);
        return response()->json($result);
    }
    public function paymentOrder(Request $request)
    {
        $data = $request->all();
        $result = $this->orderService->paymentOrder($data);
        return response()->json($result);
    }
    public function paymentOrderSuccess (Request $request)
    {
        $data = $request->all();
        $result = $this->orderService->executePayment($data);
        return response()->json($result);
    }
    public function getAllOrdersByUser(Request $request)
    {
        $userId = $request->userId; // Assuming you're getting the user ID from authenticated user
        $result = $this->orderService->getAllOrdersByUser($userId);
        return response()->json($result);
    }
    public function getAllOrdersByShipper(Request $request)
    {
        $data = $request->all();
        $response = $this->orderService->getAllOrdersByShipper($data);
        return response()->json($response);
    }
    public function paymentOrderVnpay(Request $request)
    {
        $response = $this->orderService->paymentOrderVnpay($request);
        return response()->json($response);
    }
    public function confirmOrderVnpay(Request $request)
    {
        $data = $request->all();
        $response = $this->orderService->confirmOrderVnpay($data);
        return response()->json($response);
    }
    public function paymentOrderVnpaySuccess(Request $request)
    {
        $data = $request->all();
        $response = $this->orderService->paymentOrderVnpaySuccess($data);
        return response()->json($response);
    }
    public function createNewOrder(Request $request)
    {
        $data = $request->all();
        $response = $this->orderService->createNewOrder($data);
        return response()->json($response);
    }

}
