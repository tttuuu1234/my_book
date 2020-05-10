<?php

namespace App\Services;

use App\Repositories\Book\BookRepositoryInterface;

class BookService
{
    private $book_rep;

    public function __construct(BookRepositoryInterface $book_rep)
    {
        $this->book_rep = $book_rep;
    }

    public function searchBooks($searchWord, $page = 0)
    {
        if ($page != 0) {
            $page = $page - 1;
        }

        $books = $this->book_rep->googleSearchBooks($searchWord, $page);

        $totalItems = $books['totalItems'];
        $googleBooks['totalItems'] = $totalItems;

        foreach ($books['items'] as $book) {
            // 取得した本にimageLinksキーがあるか確認し、存在しなければno_image画像のパスを追加
            if (!array_key_exists('imageLinks', $book['volumeInfo'])) {
                $book['volumeInfo']['imageLinks']['thumbnail'] = '/storage/m_e_others_500.jpg';
            }
            // front側で本を表示させるために、itemsキーの直下に配列を追加
            $googleBooks['items'][] = $book;
        }

        return $googleBooks;
    }

    public function registerBooks($inputs)
    {
        $this->book_rep->registerBooks($inputs);
    }

    public function getBooks()
    {
        return $this->book_rep->getBooks();
    }

    public function getCategoryMatchBooks($categoryId)
    {
        if ($categoryId === 1) {
            return $this->book_rep->getBooks();
        }
        return $this->book_rep->getCategoryMatchBooks($categoryId);
    }
}