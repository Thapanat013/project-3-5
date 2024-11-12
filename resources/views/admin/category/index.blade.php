@extends('layouts.back-end')
@section('search.target', route('admin.category.index'))
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ประเภทสินค้า</h1>

    <a href="{{ route('admin.category.add') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50"></span>
        <span class="text">เพิ่มข้อมูล</span>
    </a>
    <p></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ประเภทสินค้า</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ชื่อประเภทสินค้า</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$category->isEmpty())
                            @foreach ($category as $key => $item)
                                <tr>
                                    <td>{{ $category->firstItem() + $key }}</td> <!-- ใช้ firstItem เพื่อแสดงเลข ID ตามหน้าปัจจุบัน -->
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <form action="{{ route('admin.category.edit', $item->id) }}" method="get">
                                            <button type="submit" class="btn btn-warning">แก้ไข</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a type="button" type="button" class="btn btn-danger" href="{{ route('admin.category.delete', $item->id) }}">
                                            ลบ
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center text-danger fw-bolder h5">
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
                {{ $category->links() }} <!-- ใช้ Laravel pagination -->
            </div>
        </div>
    </div>

</div>
@endsection
