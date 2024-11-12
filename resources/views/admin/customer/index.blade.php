@extends('layouts.back-end')
@section('search.target',route('admin.customer.index'))
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->

     <!-- ใช่ชื่อตารางของตัวเอง -->
    <h1 class="h3 mb-2 text-gray-800">ข้อมูลลูกค้า</h1>

        <a href="#" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
            </span>
            <span class="text">เพิ่มข้อมูล</span>
        </a>
    <p></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ข้อมูลลูกค้า</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- ใส่ชื่อแต่ละคอลัมของตัวเอง -->
                            <th>ID</th>
                            <th>ชื่อ</th>
                            <th>อีเมล</th>
                            <th>อายุ</th>
                            <th></th>
                            <th>-</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <!-- ใส่ชื่อแต่ละคอลัมของตัวเอง -->
                            <th>ID</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </tfoot>


                    <tbody>
                        <tr>
                            <!-- ส่วนของข้อมูลของแต่ล่ะตาราง -->
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>
                                <button type="button" class="btn btn-warning">แก้ไข</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger">ลบ</button>
                            </td>
                        </tr>
                        <tr>
                            <!-- ส่วนของข้อมูลของแต่ล่ะตาราง -->
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>
                                <button type="button" class="btn btn-warning">แก้ไข</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger">ลบ</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
