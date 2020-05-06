<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CategoryService;

class CategoryController extends Controller
{
    public function getCategories()
    {
        return CategoryService::getCategories();
    }

    public function getCategoryList()
    {
        return CategoryService::getCategoryList();
    }
}
