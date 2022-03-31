<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    function __construct() {
        config([
            'sample.message' => '新しいメッセージ！',
        ]);
    }

    public function index(Request $request) {
        $sample_msg = env('SAMPLE_MESSAGE');
        $sample_data = array_map('trim', explode(',', env('SAMPLE_DATA')));
        // $sample_data = env('SAMPLE_DATA');
        // $sample_data = config('sample.data');
        $data = [
            'msg' => $sample_msg,
            'data' => $sample_data,
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request) {
        return redirect()->route('sample');
    }
}
