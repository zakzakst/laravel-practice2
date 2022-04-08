<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index($id = -1) {
        $msg = 'get people records.';
        $first = DB::table('people')->first();
        $last = DB::table('people')->orderBy('id', 'desc')->first();
        $result = [$first, $last];
        
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
