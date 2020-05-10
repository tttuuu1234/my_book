<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use BookService;

class BookController extends Controller
{
    public function searchBooks(Request $request)
    {
        $inputs = $request->all();
        if (array_key_exists('page', $inputs)) {
            $books = BookService::searchBooks($inputs['searchWord'], $inputs['page']);
        } else {
            $books = BookService::searchBooks($inputs['searchWord']);
        }

        return $books;
    }

    public function registerBooks(Request $request)
    {
        $inputs = $request->all();
        BookService::registerBooks($inputs['params']);
    }

    public function getBooks()
    {
        return BookService::getBooks();
    }

    // public function getCategoryMatchBooks(Request $request)
    // {
    //     $inputs = $request->all();

    //     return BookService::getCategoryMatchBooks(intval($inputs['category_id']));
    // }
}
