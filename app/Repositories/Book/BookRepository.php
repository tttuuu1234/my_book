<?php

namespace App\Repositories\Book;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

class BookRepository implements BookRepositoryInterface
{
    /**
     * google書籍検索api:キーワードに該当する本を取得
     *
     * @param string $searchWord
     * @return void
     */
    public function googleSearchBooks($searchWord)
    {
        $client = new Client();
        $googleUrl = 'https://www.googleapis.com/books/v1/volumes?';
        $page = 0;

        $searchResults = $client->request('GET', $googleUrl, [
            'query' => [
                'maxResults' => 30,
                'startIndex' => $page,
                'q' => 'intitle:' . $searchWord
            ]
        ]);

        $books = $searchResults->getBody()->getContents();
        $books = json_decode($books, true);

        return $books;
    }
}