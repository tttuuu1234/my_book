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

    public function searchBooks($searchWord)
    {
        $books = $this->book_rep->googleSearchBooks($searchWord);
        return $books;
    }
}