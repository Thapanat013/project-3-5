<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Customer extends Controller
{
    public function index()
    {
        return view('admin.customer.index');
    }
    
}
