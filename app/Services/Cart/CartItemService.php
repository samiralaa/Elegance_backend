<?php
namespace App\Services\Cart;
use App\Models\CartItem;
class CartItemService
{
    use CrudTrait;
    protected $model;
    public function __construct(CartItem $model) {
        $this->model = $model;
    }

    public function getCartItems($cartId)
    {
        return $this->model->where('cart_id', $cartId)->with('product')->get();
  
    }

    public function getAllCartToUser()
    {
        $user = auth()->user();
        return $user->carts()->with('cartItems.product')->get();
    }

    public function  addIitemToCart($data)
    {
        $cartItem = $this->model->create($data);
        return $cartItem;
    }
}
