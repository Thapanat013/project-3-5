<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category as cate_gory;


class Category extends Controller
{
    public function index()
    {

        $category = cate_gory::query();

        if(!empty($req->search))
        {

            $keyword = $req->search;

            $category->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', '%' .$keyword. '%');

            });

        }

        $result = $category->paginate(5);

        return view(
            'admin.category.index',
                [
                    'category' => $result,
                ]
        );
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $req)
    {
        $req->validate([
            'category_name' => 'required',
        ], [
            'category_name.required' => '*โปรดกรอกชื่อสินค้า',
        ]);


        $create = cate_gory::create(
            [
                'name' => $req->category_name,
            ]
        );

        if(!empty($create))
        {
            // alert()->success('แจ้งเตือน','เพิ่มข้อมูลสำเร็จ');
            return redirect()->route('admin.category.index');

        }else{
            // alert()->error('แจ้งเตือน','เพิ่มข้อมูลไม่สำเร็จ');
            return redirect()->route('admin.category.add');
        }


    }

    public function edit($id=null)
    {
        $category = cate_gory::find($id);

        if(!empty($category->id))

            return view(

                'admin.category.edit',
                [
                    'category' => $category,

                ]
            );
        else
        return redirect()->route('admin.category.index');


    }

    public function update(Request $req, $id)
    {

        $category = cate_gory::find($id);

        if(empty($category->id))
        {
            // alert()->error('แจ้งเตือน', 'ผิดพลาดไม่สามารถแก้ไขได้, โปรดลองใหม่อีกครั้ง');
            return redirect()->route('admin.category.index');
        }

        $req->validate([
            'category_name' => 'required',
        ], [
            'category_name.required' => '*โปรดกรอกชื่อสินค้า',
        ]);

        $update = $category->update(
            [
                'name' => $req->category_name,
            ]
        );

        if(!empty($update))
        {
            // alert()->success('แจ้งเตือน','แก้ไขรายการสินค้าสำเร็จ');
            return redirect()->route('admin.category.index');
        }else{
            // alert()->error('แจ้งเตือน','แก้ไขการสินค้าไม่สำเร็จ');
            return redirect()->route('admin.category.edit');
        }

    }

    public function delete($id=null)
    {

        $category = cate_gory::find($id);

        if(!empty($category->id))
        {
            $category->delete();
            // alert()->success('แจ้งเตือน','ลบรายการสินค้าสำเร็จ');
            return redirect()->route('admin.category.index');
        }else{
            // alert()->error('แจ้งเตือน','ลบรายการสินค้าไม่สำเร็จ');
            return redirect()->route('admin.category.index');
        }

    }


}
