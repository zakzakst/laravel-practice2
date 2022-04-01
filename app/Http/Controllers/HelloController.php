<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $fname;

    public function __construct() {
        $this->fname = 'sample.txt';
    }

    public function index(Request $request) {
        $sample_msg = $this->fname;
        $sample_data = Storage::get($this->fname);
        $data = [
            'msg' => $sample_msg,
            'data' => explode(PHP_EOL, $sample_data),
        ];
        return view('hello.index', $data);
    }

    public function other($msg) {
        $data = Storage::get($this->fname) . PHP_EOL . $msg;
        Storage::put($this->fname, $data);
        return redirect()->route('hello');
    }
}
