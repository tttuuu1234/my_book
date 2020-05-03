<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    /**
     * Category取得
     *
     * @return collection
     */
    public function getCategories();
}