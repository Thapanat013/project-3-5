<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Products;
use App\Models\OrderItem;  // เพิ่มบรรทัดนี้

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);  // ดึงข้อมูลตะกร้าจาก session
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        // ดึงข้อมูลสินค้าจากฐานข้อมูล
        $product = Products::find($product_id);

        // ตรวจสอบหากพบสินค้า
        if ($product) {
            // ตรวจสอบว่ามีสินค้าในตะกร้าอยู่แล้วหรือไม่
            if (isset($cart[$product_id])) {
                $cart[$product_id]['quantity'] += $quantity;
            } else {
                $cart[$product_id] = [
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'product' => $product,  // เพิ่มข้อมูลสินค้าเต็มๆ
                ];
            }

            // บันทึกข้อมูลตะกร้าใน session
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'เพิ่มสินค้าลงตะกร้าสำเร็จ');
        } else {
            return redirect()->back()->with('error', 'ไม่พบสินค้าที่คุณต้องการ');
        }
    }

    public function showCategories()
    {
        $categories = Category::with('product')->get();  // ดึงข้อมูลหมวดหมู่พร้อมสินค้า
        return view('your-view', compact('categories'));
    }


    public function index()
    {
        // ดึงข้อมูลหมวดหมู่สินค้าทั้งหมด
        $categories = Category::all();

        // ดึงข้อมูลสินค้าทั้งหมด
        $products = Products::all();

        // ดึงคำสั่งซื้อทั้งหมด
        $orders = Order::all();

        // ส่งตัวแปรทั้งหมดไปยังวิว
        return view('order', compact('categories', 'products', 'orders'));


        $orders = Order::with('items.product')->get();  // ดึงข้อมูลคำสั่งซื้อพร้อมรายการสินค้าและสินค้า

        // ส่งข้อมูลไปยัง view
        return view('admin.order.index', compact('orders'));
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);  // ดึงข้อมูลตะกร้าจาก session หรือให้เป็น array ว่างถ้าไม่มี
        return view('cart.index', compact('cart'));
    }

    public function remove($id)
    {
        $orders = Order::findOrFail($id);

        // ตรวจสอบว่าคำสั่งซื้อเป็นของผู้ใช้ปัจจุบัน
        if ($orders->user_id == auth()->id()) {
            $orders->delete();
        }

        return redirect()->route('order.cart')->with('success', 'ลบสินค้าออกจากตะกร้าสำเร็จ!');
    }

    public function confirm(Request $request)
    {
        // ตรวจสอบตะกร้าสินค้าใน session
        $cart = session()->get('cart');

        // ตรวจสอบหากตะกร้าว่าง
        if (empty($cart)) {
            return redirect()->back()->with('error', 'ตะกร้าของคุณว่าง');
        }

        // สร้างคำสั่งซื้อใหม่
        $order = new Order();
        $order->order_ref = strtoupper(uniqid());  // สร้างรหัสออเดอร์แบบสุ่ม
        $order->token = bin2hex(random_bytes(16));  // สร้าง token สำหรับการชำระเงิน
        $order->total_price = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));  // คำนวณราคารวม
        $order->status = 1;  // สถานะคำสั่งซื้อ (1 = รอการชำระ)
        $order->save();

        // บันทึกข้อมูลสินค้าในตะกร้า
        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->product_name = $item['product']->name; // ใช้ชื่อสินค้า
            $orderItem->save();
        }

        // ลบข้อมูลจากตะกร้าใน session
        session()->forget('cart');

        // ส่งกลับไปที่หน้าแสดงผล
        return redirect()->route('order.index')->with('success', 'คำสั่งซื้อของคุณถูกบันทึกเรียบร้อย');
    }
}
