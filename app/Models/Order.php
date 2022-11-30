<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'goods_snapshot',
        'total_price',
        'total_buy_number',
        'goods_id',
    ];

    protected $casts = [
        'goods_snapshot' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function(Order $order) {
            $order->order_sn = Order::generateOrderSn();
        });    
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateOrderSn()
    {
        $maxTryTimes = 10;
        $tryTimes = 0;
        do {
            $orderSn = date('YmdHis') . str_pad(random_int(1, 999999), 6, 0, STR_PAD_LEFT);
            $tryTimes++;
        } while(self::where('order_sn', $orderSn)->exists() && $tryTimes <= $maxTryTimes);

        if($tryTimes > $maxTryTimes) {
            abort(500, '订单号生成失败');
        }

        return $orderSn;
    }
}
