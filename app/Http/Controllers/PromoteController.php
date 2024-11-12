<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Category;

class PromoteController extends Controller
{

    public function index()
    {
        return view(
            'promote',
            [
                'products' => Products::all(),
                'category' => Category::all(),
            ]
        );
    }

}
