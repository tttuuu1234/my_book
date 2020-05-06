<?php

namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Category取得
     *
     * @return collection
     */
    public function getCategories()
    {
        return $this->category->all();

    }

    public function getCategoryList()
    {
        return $this->category->where('id','<>', 1)->get();
    }
}