@extends('layouts.app')

@section('title', '我的订单列表')

@section('content')
<div class="container">
    <ul class="list-group list-group-flush"> 
        @foreach($orders as $order)
        <li class="list-group-item">
            <div class="mb-2">
                订单号：{{ $order->order_sn}}
            </div>
            <div class="mb-2">
                商品：
                <a href="{{ route('goods.show', $order->goods_id) }}">
                    <img width="64" src="{{ $order->goods_snapshot['image'] }}" alt="{{ $order->goods_snapshot['name'] }}">
                    {{ $order->goods_snapshot['name'] }}
                </a>
            </div>
            <div class="mb-2">
                购买数量：{{ $order->total_buy_number }}
            </div>
            <div class="mb-2">
                总价格：&yen; {{ $order->total_price }}
            </div>
            <div>
                <a class="btn btn-sm btn-primary" href="{{ route('orders.show', $order) }}" role="button">订单详情</a>
            </div>
        </li>
        @endforeach
    </ul>

    <div class="my-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection