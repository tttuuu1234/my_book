<?php

namespace App\Services;

use App\Repositories\Book\BookRepositoryInterface;
use function GuzzleHttp\json_decode;

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

        return $books;
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