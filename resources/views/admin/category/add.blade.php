@extends('layouts.back-end')
@section('search.target',route('admin.category.add'))
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">เพิ่มประเภทสินค้า</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>



    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-">
                    <form action="{{ route('admin.category.insert') }}"
                          method="post"
                          enctype="multipart/form-data"
                    >

                        @csrf


                        <div class="mb-3">
                            <label for="category_name">
                                ชื่อประเภทสินค้า
                                @error('category_name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </label>
                            <input class="form-control {{ $errors->has('category_name') ? 'is-invalid' : null }}"
                                   id="category_name"
                                   type="text"
                                   placeholder="กรอกชื่อประเภทสินค้า"
                                   name="category_name"
                            />

                        </div>

                        <br>
                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                        <a type="button" href="{{route('admin.category.index')}}" class="btn btn-danger">ยกเลิก</a>
                    </form>
                </div>
                <!-- Card Body -->

            </div>
        </div>


    </div>

    <!-- Content Row -->


</div>
@endsection
