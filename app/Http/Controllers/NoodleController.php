<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noodle;

class NoodleController extends Controller
{
    public function store(Request $request)
    {
        // ตรวจสอบและ validate ข้อมูล
        $request->validate([
            'table_number' => 'required',
            'amount' => 'required',
            'noodle_type' => 'required',
            'protein' => 'required',
            'soup' => 'required',
            'extra' => 'required',
            'comments' => 'nullable',
        ],
        [
            'table_number.required' => 'โปรดกรอกเลขโต๊ะ',
            'amount.required' => 'โปรดกรอกจำนวน/ชาม',
            'noodle_type.required' => 'โปรดกรอกประเภทเส้น',
            'protein.required' => 'โปรดกรอกเนื้อสัตว์',
            'soup.required' => 'โปรดกรอกพิเศษ-ธรรมดา',
            'extra.required' => 'โปรดกรอกซุป',
            'comments.nullable' => 'nullable',
        ]
    );

        // บันทึกข้อมูลลงในตาราง noodles
        $create = Noodle::create([
            'table_number' => $request->table_number,
            'amount' => $request->amount,
            'noodle_type' => $request->noodle_type,
            'protein' => $request->protein,
            'soup' => $request->soup,
            'extra' => $request->extra,

        ]);

        if(!empty($create))
        {
            return redirect() ->route('welcome');
        }else{
            return redirect() ->route('welcome');

        }
    }
}

