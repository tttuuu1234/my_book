<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryService
{
    public function getCategories()
    {
        $category = new CategoryRepository;
        $categories = $category->getCategories();
        return $categories;
    }
}