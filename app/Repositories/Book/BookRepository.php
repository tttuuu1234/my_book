<?php

namespace App\Repositories\Book;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;
use Illuminate\Support\Facades\Log;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function googleSearchBooks($searchWord, $page)
    {
        $client = new Client();
        $googleUrl = 'https://www.googleapis.com/books/v1/volumes?';

        $searchResults = $client->request('GET', $googleUrl, [
            'query' => [
                'q' => 'intitle:' . $searchWord,
                'maxResults' => 30,
                'startIndex' => $page
            ]
        ]);

        $books = $searchResults->getBody()->getContents();
        $books = json_decode($books, true);

        return $books;
    }

    public function registerBooks($inputs)
    {
        foreach ($inputs['bookInfos'] as $bookInfo) {
            $volumeInfo = $bookInfo['volumeInfo'];
            $this->book->create([
                'category_id' => $inputs['category']['id'],
                'title' => $volumeInfo['title'],
                'image_url' => $volumeInfo['imageLinks']['thumbnail']
            ]);
        }
    }

    public function getBooks()
    {
        return $this->book->get();
    }

}