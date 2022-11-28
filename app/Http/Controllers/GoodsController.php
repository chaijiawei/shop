<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $goodsList = Goods::latest()->paginate();

        return view('goods.index', compact('goodsList'));
    }

    public function show(Goods $goods)
    {
        return view('goods.show', compact('goods'));
    }
}
