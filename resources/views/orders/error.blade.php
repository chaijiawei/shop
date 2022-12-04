@extends('layouts.app')

@section('title', '订单错误')

@section('content')
<div class="container">
    <div class="alert alert-danger" role="alert">
        <strong>订单发生错误了：</strong> 
        {{ $msg }}

    </div>
    <a class="btn btn-primary" href="{{ url()->previous() }}">返回</a>
    
</div>
@endsection