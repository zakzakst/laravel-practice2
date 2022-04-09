<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Pagination\MyPaginator;

class HelloController extends Controller
{
    public function index(Request $request) {
        $msg = 'show people record.';
        $keys = Person::get()->modelKeys();
        $even = array_filter($keys, function($key) {
            return $key % 2 == 0;
        });
        $result = Person::get()->only($even);

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
