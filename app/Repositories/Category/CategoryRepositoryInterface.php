<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    /**
     * Category取得
     *
     * @return collection
     */
    public function getCategories();
}