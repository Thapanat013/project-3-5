<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Order as Orders;
use App\Models\OrderItem;  // เพิ่มบรรทัดนี้


class Order extends Controller
{

    public function index()
    {

        $order = Orders::query();

        $order->latest();
        $result = $order->paginate(10);

        return view(
            'admin.order.index',
            [
                'orders' => $result,
            ]
        );

    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}




