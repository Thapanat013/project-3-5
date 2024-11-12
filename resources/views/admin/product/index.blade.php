@extends('layouts.back-end')
@section('search.target', route('admin.product.index'))
@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">รายการสินค้า</h1>

        <a href="{{ route('admin.product.add') }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50"></span>
            <span class="text">เพิ่มข้อมูล</span>
        </a>
        <p></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">รายการสินค้า</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อสินค้า</th>
                                <th>ประเภทสินค้า</th>
                                <th>ราคา</th>
                                <th>รูปภาพสินค้า</th>
                                <th>รายละเอียดสินค้า</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$products->isEmpty())
                                @foreach ($products as $key => $item)
                                    <tr>
                                        <td>{{ $products->firstItem() + $key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if (!empty($item->category->name))
                                                {{ $item->category->name }}
                                            @else
                                                <span class="text-danger">ไม่ระบุ</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ asset($item->image) }}" data-lightbox="{{ $item->id }}"
                                                data-title="{{ $item->name }}">
                                                <img src="{{ asset($item->image) }}" width="100px" height="80px"
                                                    alt="" />
                                            </a>
                                        </td>
                                        <td>{{ $item->detail }}</td>
                                        <td>
                                            <form action="{{ route('admin.product.edit', $item->id) }}" method="get">
                                                <button type="submit" class="btn btn-warning">แก้ไข</button>
                                            </form>
                                        </td>
                                        <td>
                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-danger"
                                                onclick="deleteProduct({{ $item->id }})">
                                                ลบ
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center text-danger fw-bolder h5">
                                        <span class="bx bx-block"></span>
                                        ไม่มีข้อมูล
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination-container">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Show SweetAlert if the session has a success or error message
        @if (session('alert.success'))
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ!',
                text: '{{ session('alert.success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @elseif (session('alert.error'))
            Swal.fire({
                icon: 'error',
                title: 'ผิดพลาด!',
                text: '{{ session('alert.error') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        function deleteProduct(id) {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: 'คุณต้องการลบสินค้านี้หรือไม่?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ลบเลย!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete route after confirmation
                    window.location.href = '/admin/product/delete/' + id;
                }
            })
        }
    </script>


@endsection
