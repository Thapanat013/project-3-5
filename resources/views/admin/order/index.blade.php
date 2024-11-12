@extends('layouts.back-end')
@section('search,target', route('admin.order.index'))
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">คำสั่งซื้อ</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                คำสั่งซื้อ
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>หมายเลขออเดอร์</th>
                            <th>ชื่อสินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            <th>ราคารวม</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($orders && $orders->isNotEmpty())
                            @foreach ($orders as $order)
                                @if ($order->items && $order->items->isNotEmpty())
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>{{ $order->order_ref }}</td>
                                            <td>{{ $item->product ? $item->product->name : 'ไม่พบสินค้า' }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->price, 2) }} บาท</td>
                                            <td>{{ number_format($item->price * $item->quantity, 2) }} บาท</td>
                                            <td>
                                                <button class="btn-status" onclick="toggleStatus(this)">ยังไม่สำเร็จ</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">ไม่พบข้อมูลสินค้าในคำสั่งซื้อ</td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">ไม่พบคำสั่งซื้อ</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
    // ฟังก์ชันที่จะทำงานเมื่อคลิกปุ่ม
    function toggleStatus(button) {
        // ถ้าปุ่มมีคลาส 'btn-success' ให้เปลี่ยนข้อความเป็น "ยังไม่สำเร็จ" และลบคลาส 'btn-success'
        if (button.classList.contains("btn-success")) {
            button.textContent = "ยังไม่สำเร็จ";
            button.classList.remove("btn-success");
        } else {
            // ถ้าปุ่มยังไม่มีคลาส 'btn-success' ให้เปลี่ยนข้อความเป็น "สำเร็จแล้ว" และเพิ่มคลาส 'btn-success'
            button.textContent = "สำเร็จแล้ว";
            button.classList.add("btn-success");
        }
    }
</script>

<style>
    /* สไตล์ปุ่มเริ่มต้น */
    .btn-status {
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: red;
        /* สีแดง */
        transition: background-color 0.3s ease;
        /* การเปลี่ยนสีอย่างนุ่มนวล */
    }

    /* เมื่อคลิกแล้วเปลี่ยนเป็นสีเขียว */
    .btn-success {
        background-color: green;
    }
</style>

@endsection
