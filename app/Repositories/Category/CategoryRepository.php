<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Category取得
     *
     * @return collection
     */
    public function getCategories()
    {
        $category = new Category();
        $categories = $category->all();
        return $categories;
    }
}