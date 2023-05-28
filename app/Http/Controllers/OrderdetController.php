<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderdetController extends Controller
{

    public function index(Order $order)
    {
        $orderProducts = $order->products;
        return view('orderdets.index',compact('order', 'orderProducts'));
    }
    public function create(Order $order)
    {
        $orderProducts = $order->products;
        return view('orderdets.create', ['order' => $order, 'orderProducts' => $orderProducts]);
    }
    public function store(Request $request, Order $order)
    {
        foreach ($request->orderProducts as $product) {
            $order->products()->attach($product['product_id'],
                ['quantity' => $product['quantity']]);
        }

        return redirect()->route('orderdets.index', compact('order'))
        ->with('success','Product created successfully.');

    }

}
