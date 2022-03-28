<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {
        $data = [
            'msg' => 'this is sample message.',
        ];
        return view('hello.index', $data);
    }
}
