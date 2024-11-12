<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Topping as Toppings;


class Topping extends Controller
{
    public function index(Request $req)
    {

        $topping = Toppings::query();

        if(!empty($req->search))
        {

            $keyword = $req->search;

            $topping->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', '%' .$keyword. '%');

            });

        }

        $topping->latest();
        $result = $topping->paginate(5);


        return view(

            'admin.topping.index',
            [
                'topping' => $result,
            ]

        );
    }

    public function add()
    {
        return view('admin.topping.add');
    }

    public function insert(Request $req)
    {
        $req->validate([
            'topping_name' => 'required',

        ], [
            'topping_name.required' => '*โปรดกรอกชื่อสินค้า',
        ]);


        $create = Toppings::create(
            [
                'name' => $req->topping_name,
            ]
        );

        if(!empty($create))
        {
            // alert()->success('แจ้งเตือน','เพิ่มข้อมูลสำเร็จ');
            return redirect()->route('admin.topping.index');

        }else{
            // alert()->error('แจ้งเตือน','เพิ่มข้อมูลไม่สำเร็จ');
            return redirect()->route('admin.topping.add');
        }


    }

    public function edit($id=null)
    {
        $topping = Toppings::find($id);

        if(!empty($topping->id)){

            return view(

                'admin.topping.edit',
                [
                    'topping' => $topping,

                ]
            );
        }else{
            return redirect()->route('admin.topping.index');
        }


    }

    public function update(Request $req, $id)
    {

        $topping = Toppings::find($id);

        if(empty($topping->id))
        {
            // alert()->error('แจ้งเตือน', 'ผิดพลาดไม่สามารถแก้ไขได้, โปรดลองใหม่อีกครั้ง');
            return redirect()->route('admin.topping.index');
        }

        $req->validate([
            'topping_name' => 'required',
        ], [
            'topping_name.required' => '*โปรดกรอกชื่อสินค้า',
        ]);

        $update = $topping->update(
            [
                'name' => $req->topping_name,
            ]
        );

        if(!empty($update))
        {
            // alert()->success('แจ้งเตือน','แก้ไขรายการสินค้าสำเร็จ');
            return redirect()->route('admin.topping.index');
        }else{
            // alert()->error('แจ้งเตือน','แก้ไขการสินค้าไม่สำเร็จ');
            return redirect()->route('admin.topping.edit');
        }

    }

    public function delete($id=null)
    {

        $topping = Toppings::find($id);

        if(!empty($topping->id))
        {
            $topping->delete();
            // alert()->success('แจ้งเตือน','ลบรายการสินค้าสำเร็จ');
            return redirect()->route('admin.topping.index');
        }else{
            // alert()->error('แจ้งเตือน','ลบรายการสินค้าไม่สำเร็จ');
            return redirect()->route('admin.topping.index');
            }



    }

}
