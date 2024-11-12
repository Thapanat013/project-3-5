<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Kungpao</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('pro/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pro/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pro/css/elegant-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('pro/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('pro/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pro/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pro/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pro/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('pro/css/cart.css') }}">
</head>

<body>

    <!-- Header Section -->
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="header__logo">
                        <h2>กุ้งเผาเตาปูน</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 text-right">
                    <nav class="header__menu">
                        <ul>
                            <li class="active">
                                <a href="#cart" id="cart-btn" class="shop">
                                    <i class="fa fa-shopping-cart"></i> ตะกร้า
                                    <span
                                        class="badge badge-primary">{{ array_sum(array_column(session()->get('cart', []), 'quantity')) }}</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>


        </div>


    </header>
    <!-- Header End -->

    <!-- Main Section -->
    <main>

        <div id="cart" class="cart-overlay" style="display: none;">
            <h1>ตะกร้าสินค้าของคุณ</h1>
            <table>
                @php
                    $cart = session()->get('cart', []);
                @endphp

                @if (!empty($cart))
                    @foreach ($cart as $key => $item)
                        <tr>
                            <td>{{ $item['product'] ? $item['product']->name : 'ไม่พบสินค้า' }}</td>
                            <td>{{ $item['quantity'] ?? 'ไม่ระบุจำนวน' }}</td>
                            <td>{{ $item['price'] ?? 'ไม่ระบุราคา' }} บาท</td>
                            <td>
                                {{ isset($item['price'], $item['quantity']) ? $item['price'] * $item['quantity'] : 'ไม่สามารถคำนวณได้' }}
                                บาท
                            </td>
                            <td>
                                <!-- ปุ่มลบสินค้า -->
                                <form action="{{ route('cart.remove', $key) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">ลบ</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>ตะกร้าของคุณยังว่างอยู่</p>
                @endif
            </table>

            <p>ยอดรวมทั้งหมด:
                {{ !empty($cart) ? array_sum(array_map(fn($item) => ($item['price'] ?? 0) * ($item['quantity'] ?? 0), $cart)) : 0 }}
                บาท
            </p>

            <form id="confirm-order-form" action="{{ route('order.confirm') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <button type="button" id="confirm-order-button" class="btn btn-primary">ยืนยันการสั่งซื้อ</button>
        </div>


        <div class="container">
            <!-- Category Sections -->
            @foreach ($categories as $key => $data)
                @if ($data->product->isNotEmpty())
                    <div class="category-section">
                        <h2>{{ $data->name }}</h2>
                        <div class="row">
                            @foreach ($data->product as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="featured__item">
                                        <div class="featured__item__pic">
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                                class="img-fluid">
                                        </div>
                                        <div class="featured__item__text">
                                            <h6>{{ $product->name }}</h6>
                                            <p>{{ $product->detail }}</p>
                                            <h5>ราคา {{ $product->price }} บาท</h5>
                                        </div>
                                        <form action="{{ route('orders.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="number" name="quantity" value="1" min="1"
                                                required>
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <button type="submit" class="btn btn-cart">เพิ่มสินค้าลงตะกร้า</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                @endif
        </div>
        </div>
        @endforeach
        </div>
    </main>

    <!-- Script for Cart Display -->
    <script>
        document.getElementById('cart-btn').addEventListener('click', function(event) {
            event.preventDefault();
            const cart = document.getElementById('cart');
            cart.style.display = (cart.style.display === 'none' || cart.style.display === '') ? 'block' : 'none';
        });

        document.getElementById('confirm-order-button').addEventListener('click', function() {
            Swal.fire({
                title: 'ยืนยันการสั่งซื้อ?',
                text: "คุณต้องการสั่งซื้อสินค้าหรือไม่",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('confirm-order-form').submit();
                }
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'สำเร็จ!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'ตกลง'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'เกิดข้อผิดพลาด',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'ตกลง'
            });
        </script>
    @endif
</body>

</html>
