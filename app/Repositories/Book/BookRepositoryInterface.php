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

    /**
     * 本の登録
     *
     * @param array $inputs
     */
    public function registerBooks($inputs);

    /**
     * DBから登録した本を取得
     *
     * @return void
     */
    public function getBooks();
}