<?php

namespace App\Http\Controllers\Api\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\StoreRequestCart;
use App\Services\Cart\CartService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use ApiResponseTrait;

    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        try {
            $cartItems = $this->cartService->index();
            return $this->successResponse($cartItems);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function store(StoreRequestCart $request)
    {
        try {
            $data = $request->validated();
            $cartItem = $this->cartService->store($data);
            return $this->successResponse($cartItem);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $cartItem = $this->cartService->show($id);
            return $this->successResponse($cartItem);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $data = $request->all();
            $cartItem = $this->cartService->update($data, $id);
            return $this->successResponse($cartItem);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            $deleted = $this->cartService->delete($id);
            return $this->successResponse(['deleted' => $deleted]);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
