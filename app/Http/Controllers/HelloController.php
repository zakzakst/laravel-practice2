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

    public function index() {
        $dir = '/';
        $all = Storage::disk('local')->allfiles($dir);

        $data = [
            'msg' => 'DIR: ' . $dir,
            'data' => $all,
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request) {
        $ext = '.' . $request->file('file')->extension();
        Storage::disk('local')->putFileAs('files', $request->file('file'), 'uploaded' . $ext);
        return redirect()->route('hello');
    }
}
