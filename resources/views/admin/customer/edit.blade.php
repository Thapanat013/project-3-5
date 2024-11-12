@extends('layouts.back-end')
@section('search.target',route('admin.customer.edit'))
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">แก้ไขสินค้า</h1>
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
                    <form>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1">ชื่อสินค้า</label><input class="form-control" id="name" type="text" placeholder="กรอกชื่อสินค้า">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1">ประเภทสินค้า</label><select class="form-control" id="category_id">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1">ราคาสินค้า</label><input class="form-control" id="price" type="text" placeholder="กรอกราคาสินค้า">
                        </div>

                        <div class="mb-0">
                            <label for="exampleFormControlTextarea1">รายละเอียดสินค้า</label>
                            <textarea class="form-control" id="detail" rows="3"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>รูปภาพสินค้า    </label>
                            <br>
                            <input type="file" id="image">
                        </div>

                        <br>
                        <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
                        <button type="button" class="btn btn-danger">ยกเลิก</button>
                    </form>
                </div>
                <!-- Card Body -->

            </div>
        </div>


    </div>

    <!-- Content Row -->


</div>
@endsection
