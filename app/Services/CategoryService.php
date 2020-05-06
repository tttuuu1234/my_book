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
        return $this->category_rep->getCategories();
    }

    public function getCategoryList()
    {
        return $this->category_rep->getCategoryList();
    }
}