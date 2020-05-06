<?php

namespace App\Repositories\Book;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;
use Illuminate\Support\Facades\Log;
use App\Models\{Book, Category};

class BookRepository implements BookRepositoryInterface
{
    private $book;
    private $category;

    public function __construct(Book $book, Category $category)
    {
        $this->book = $book;
        $this->category = $category;
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
                'image_url' => $volumeInfo['imageLinks']['thumbnail'],
                'link_url' => $volumeInfo['infoLink']
            ]);
        }
    }

    public function getBooks()
    {
        return $this->book->get();
    }

    public function getCategoryMatchBooks($categoryId)
    {
        return $this->category->find($categoryId)->books()->get();
    }

}