<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = Auth::user();

        $orders = $user->orders()->latest()->paginate();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function store(Request $request, Order $order)
    {
        $data = $this->validate($request, [
            'goods_id' => 'required|integer',
            'buy_number' => 'required|integer|min:1',
        ]);
        $user = Auth::user();
        $goods = Goods::findOrFail($data['goods_id']);

        DB::transaction(function() use($data, $order, $user, $goods) {
            //判断库存
            if($data['buy_number'] > $goods['stock']) {
                abort(500, '您购买的商品库存不足');
            }

            $order->goods_id = $goods->id;
            $order->goods_snapshot = $goods->toArray();
            $order->total_buy_number = $data['buy_number'];
            $order->total_price = bcmul($goods->price, $data['buy_number'], 2);
            $order->user()->associate($user);
            $order->save();

            //减去库存
            Goods::query()->whereKey($goods->id)->decrement('stock', $data['buy_number']);
        });

        return view('orders.success', compact('order'));
    }
}
