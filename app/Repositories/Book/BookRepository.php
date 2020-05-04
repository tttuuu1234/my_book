<?php

namespace App\Repositories\Book;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;
use Illuminate\Support\Facades\Log;

class BookRepository implements BookRepositoryInterface
{
    /**
     * google書籍検索api:キーワードに該当する本を取得
     *
     * @param string $searchWord
     * @param integer $page
     * @return void
     */
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

        Log::debug('グーグルApi' . var_export($books, true));

        return $books;
    }
}