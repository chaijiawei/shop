@extends('layouts.app')

@section('title', '商品列表')

@section('content')
<div class="container">
    <ul class="list-group list-group-flush">
        @foreach($goodsList as $goods)
        <li class="list-group-item">
            <a href="{{ route('goods.show', $goods) }}">
                <img class="mb-2" width="64" src="{{ $goods->image }}" alt="{{ $goods->name }}"> <h4>{{ $goods->name }}</h4>
                <div>
                    &yen; {{ $goods->price }}
                </div>
                <div>
                    库存：{{ $goods->stock }}
                </div>
            </a>
        </li>
        @endforeach
    </ul>

    <div class="my-4">
       {{ $goodsList->links() }} 
    </div>
</div>
@endsection