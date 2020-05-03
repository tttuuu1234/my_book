<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryService
{
    private $category_rep;

    public function __construct(CategoryRepositoryInterface $category_rep)
    {
        $this->category_rep = $category_rep;
    }

    public function getCategories()
    {
        $categories = $this->category_rep->getCategories();
        return $categories;
    }
}