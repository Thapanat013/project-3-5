<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // นำเข้า Model ของ Product
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // ฟังก์ชันสำหรับเพิ่มสินค้าในตะกร้า
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        // รับข้อมูลจาก session

        $cart = session()->get('cart', []);
        $cart[$productId] = [
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $price,
        ];

        session()->put('cart', $cart);

        // เพิ่มหรืออัปเดตข้อมูลสินค้าในตะกร้า
        $cart[$productId] = [
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $price,
        ];

        // บันทึกข้อมูลตะกร้าลงใน session
        session()->put('cart', $cart);

        return response()->json(['message' => 'Product added to cart']);
    }

    // ฟังก์ชันสำหรับลบสินค้าออกจากตะกร้า
    public function removeFromCart($productId)
    {
        // ดึงตะกร้าสินค้าจาก session
        $cart = session()->get('cart', []);

        // ตรวจสอบการมีสินค้านี้ในตะกร้า
        if (isset($cart[$productId])) {
            // ลบสินค้านี้ออกจากตะกร้า
            unset($cart[$productId]);

            // อัพเดต session ด้วยตะกร้าใหม่
            session()->put('cart', $cart);
        }

        // หากตะกร้าสินค้าหมดแล้ว ลบข้อมูลทั้งหมดใน session
        if (empty($cart)) {
            session()->forget('cart');
        }

        // กลับไปที่หน้าตะกร้าหรือหน้าที่คุณต้องการ
        return redirect()->route('cart.view')->with('success', 'สินค้าถูกลบออกจากตะกร้าแล้ว');
    }

    // ฟังก์ชันสำหรับเก็บข้อมูลสินค้าในตะกร้า
    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        // เอาข้อมูลสินค้าเข้าในตะกร้า
        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            // ถ้ามีสินค้าซ้ำในตะกร้า, เพิ่มจำนวน
            $cart[$product_id]['quantity'] += $quantity;
        } else {
            // ถ้ายังไม่มีสินค้านั้นในตะกร้า, เพิ่มเข้าไปใหม่
            $cart[$product_id] = [
                'quantity' => $quantity,
                'price' => $price,
                'product_id' => $product_id,
            ];
        }

        session()->put('cart', $cart);

        // Redirect กลับไปที่หน้าเดิม
        return redirect()->route('category.index')->with('success', 'สินค้าถูกเพิ่มลงในตะกร้าแล้ว');
    }

    // ฟังก์ชันสำหรับลบสินค้าออกจากตะกร้า
    public function show()
    {
        $cart = session()->get('cart', []);  // ดึงข้อมูลตะกร้าจาก session
        return view('cart.index', compact('cart'));  // ส่งข้อมูลไปยังหน้าตะกร้า
    }

    // ฟังก์ชันลบสินค้าออกจากตะกร้า
    public function remove($key)
    {
        // ดึงข้อมูลตะกร้าจาก session
        $cart = session()->get('cart', []);

        // ถ้ามีสินค้าในตะกร้า
        if (isset($cart[$key])) {
            // ลบสินค้าตาม key ที่ส่งมา
            unset($cart[$key]);

            // อัพเดต session
            session()->put('cart', $cart);

            // ส่งข้อความสำเร็จแล้วกลับไปหน้าก่อนหน้า
            return back()->with('success', 'สินค้าถูกลบออกจากตะกร้าแล้ว');
        }

        // ถ้าไม่มีสินค้า
        return back()->with('error', 'ไม่พบสินค้าที่จะลบ');
    }
}
