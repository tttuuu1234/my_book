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
        $books = BookService::searchBooks($inputs['searchWord']);

        return $books;
    }
}
