<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Sweety extends Controller
{
    public function index()
    {
        return view('admin.sweety.index');
    }

    public function add()
    {
        return view('admin.sweety.add');
    }

    public function edit()
    {
        return view('admin.sweety.edit');
    }

}
