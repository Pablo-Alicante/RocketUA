<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CartController extends Controller
{
    public function cart()
    {
        return response()->json(['carrito' => 'carrito']);
    }

    public function cartId($id)
    {
        $carrito = Cart::find($id);

        return response()->json($carrito);
    }

    public function cartIdProduct($id)
    {
        return response()->json(['carrito' => 'carritoIdProduct']);
    }

    public function cartIdProductAdd($id)
    {
        return response()->json(['carrito' => 'carritoIdProductAdd']);
    }

    public function cartIdProductDelete($id, $id_line)
    {
        return response()->json(['carrito' => 'carritoIdProductDelete']);
    }

    public function cartIdCoupon($id)
    {
        return response()->json(['carrito' => 'carritoIdCoupon']);
    }

    public function cartIdCouponDelete($id)
    {
        return response()->json(['carrito' => 'carritoIdCouponDelete']);
    }
}
