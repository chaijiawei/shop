@extends('layouts.app')

@section('title', "{$goods->name} 详情页")

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $goods->image }}" class="img-fluid rounded-start" alt="{{ $goods->name }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $goods->name }}</h5>
                    <p class="card-text">
                        &yen; {{ $goods->price }}
                    </p>
                    <p class="card-text">
                        库存：{{ $goods->stock }}
                    </p>
                   
                    <div>
                        <button type="button" class="btn btn-success">立即购买</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#goods-content" type="button" role="tab" aria-selected="true">
                商品简介
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#goods-rate">商品评价</button>
        </li>
    </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="goods-content" role="tabpanel">
            {{ $goods->content }}
        </div>

        <div class="tab-pane" id="goods-rate">
            默认五星好评
        </div>
    </div>
</div>
@endsection
