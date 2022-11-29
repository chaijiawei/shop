<?php

namespace Database\Seeders;

use App\Models\Goods;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $allGoods = Goods::all();

        Order::factory()
        ->count(100)
        ->sequence(function() use($user, $allGoods) {
            $goods = $allGoods->random();
            $buyNumber = random_int(1, 9);
            return [
                'user_id' => $user->id,
                'goods_id' => $goods->id,
                'goods_snapshot' => $goods->toArray(),
                'total_price' => bcmul($goods->price, $buyNumber, 2), 
                'total_buy_number' => $buyNumber,
            ];
        })
        ->create();
    }
}
