<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;

class CategoryIndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.categories.index');
    }
}
