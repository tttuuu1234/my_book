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

    /**
     * Select用のCategory取得
     *
     * @return collection
     */
    public function getCategoryList();

}