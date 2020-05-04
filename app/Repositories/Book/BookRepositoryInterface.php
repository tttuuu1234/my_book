<?php

namespace App\Repositories\Book;

interface BookRepositoryInterface
{
    /**
     * google書籍検索api : キーワードに該当する本を取得
     *
     * @param string $searchword
     * @param integer $page
     * @return void
     */
    public function googleSearchBooks($searchWord, $page);
}