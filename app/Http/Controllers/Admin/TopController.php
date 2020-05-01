<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $userInfo = [
            'name' => 'つばさ',
            'age' => '24'
        ];
        return $userInfo;
    }
}
