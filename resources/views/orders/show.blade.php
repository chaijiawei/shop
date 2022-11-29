@extends('layouts.app')

@section('title', "订单 {$order->order_sn} 的详情")

@section('content')
<div class="container">
    <h4>订单号：{{ $order->order_sn }}</h4>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="mb-2">
                商品：
                <a href="{{ route('goods.show', $order->goods_id) }}">
                    <img width="64" src="{{ $order->goods_snapshot['image'] }}" alt="{{ $order->goods_snapshot['name'] }}">
                    {{ $order->goods_snapshot['name'] }}
                </a>
            </div>
            <div class="mb-2">
                商品价格：{{ $order->goods_snapshot['price'] }}
            </div>
            <div class="mb-2">
                购买数量：{{ $order->total_buy_number }}
            </div>
            <div class="mb-2">
                总价格：&yen; {{ $order->total_price }}
            </div>
        </li>
      </ul>
</div>
@endsection