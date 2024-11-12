@extends('layouts.back-end')
@section('search.target',route('admin.product.add'))
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">เพิ่มรายการสินค้า</h1>
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
                    <form action="{{ route('admin.product.insert') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label for="products_name">
                                ชื่อสินค้า
                                @error('products_name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </label>
                            <input class="form-control {{ $errors->has('products_name') ? 'is-invalid' : null }}"
                                   id="products_name"
                                   type="text"
                                   placeholder="กรอกชื่อสินค้า"
                                   name="products_name"
                            />

                        </div>

                        <div class="mb-3">
                            <label for="products_price">
                                ราคาสินค้า
                                @error('products_price')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </label>
                            <input class="form-control {{ $errors->has('products_price') ? 'is-invalid' : null }}"
                                id="products_price"
                                type="text"
                                name="products_price"
                                placeholder="กรอกราคาสินค้า"
                                min="0" max="99999999"
                                onkeypress="validate(event)"
                            />

                        </div>

                        <div class="mb-3">
                            <label for="category_id">
                                ประเภทสินค้า
                                @error('products_category')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </label>

                            <select class="form-control {{ $errors->has('products_category') ? 'is-invalid' : null }}"
                                    id="category_id"
                                    name="products_category"
                            >

                            <option value="" selected>
                                ==== โปรดเลือกประเภทสินค้า ====
                            </option>
                            @foreach ($category as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                            </select>
                        </div>


                        <div class="mb-0">
                            <label for="products_detail">
                                รายละเอียดสินค้า
                                @error('products_detail')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </label>
                            <textarea class="form-control {{ $errors->has('products_detail') ? 'is-invalid' : null }}"
                                      id="products_detail"
                                      rows="3"
                                      name="products_detail"
                                      placeholder="รายละเอียด"
                            ></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="products_image">
                                รูปภาพสินค้า
                                @error('products_image')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </label>
                            <br>
                            <input class="{{ $errors->has('products_image') ? 'is-invalid' : null }}"
                                   type="file"
                                   id="products_image"
                                   name="products_image"
                            />
                        </div>

                        <br>
                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                        <a type="button" href="{{route('admin.product.index')}}" class="btn btn-danger">ยกเลิก</a>
                    </form>
                </div>
                <!-- Card Body -->

            </div>
        </div>


    </div>

    <!-- Content Row -->


</div>
@endsection
