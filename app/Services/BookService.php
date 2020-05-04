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
}