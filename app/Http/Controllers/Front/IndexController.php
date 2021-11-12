<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getProducts()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return response()->json(['success' => true, 'products' => $products]);
    }

    public function store(Request $request)
    {
        $all = $request->all();
        $cart = json_decode($all['data'], true);
        $order = Order::create(['order_type' => 'debet', 'date' => date('Y-m-d')]);
        if ($order) {
            foreach ($cart['items'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'qty' => $item['quantity'],
                    'total' => $item['itemTotal'],
                ]);
                $totalQty = $item['qty'] - $item['quantity'];
                Product::where('id', $item['id'])->update(['qty' => $totalQty]);
            }
        }
        return response()->json(['success' => true, 'message' => 'Satış Tamamlandı']);
    }
}
