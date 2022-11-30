@extends('layouts.app')

@section('title', '订单成功提示页')

@section('content')
<div class="container">
    <h4>恭喜您，订单号：{{ $order->order_sn }} 已经成功下单</h4>
    <a href="{{ route('orders.show', $order) }}" class="btn btn-primary">查看订单详情</a>
</div>
@endsection