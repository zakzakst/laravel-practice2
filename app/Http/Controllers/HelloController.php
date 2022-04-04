<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $fname;

    public function __construct() {
        $this->fname = 'hello.txt';
    }

    public function index(Request $request) {
        $sample_msg = Storage::disk('public')->url($this->fname);
        $sample_data = Storage::disk('public')->get($this->fname);
        $data = [
            'msg' => $sample_msg,
            'data' => explode(PHP_EOL, $sample_data),
        ];
        return view('hello.index', $data);
    }

    public function other($msg) {
        Storage::disk('public')->prepend($this->fname, $msg);
        return redirect()->route('hello');
    }
}
