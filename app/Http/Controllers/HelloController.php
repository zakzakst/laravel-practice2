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
        $url = Storage::disk('public')->url($this->fname);
        $size = Storage::disk('public')->size($this->fname);
        $modified = Storage::disk('public')->lastModified($this->fname);
        
        $modified_time = date('y-m-d H:i:s', $modified);
        $sample_keys = ['url', 'size', 'modified'];
        $sample_meta = [$url, $size, $modified_time];

        $result = '<table><tr><th>' . implode('</th><th>', $sample_keys) . '</th></tr>';
        $result .= '<tr><td>' . implode('</td><td>', $sample_meta) . '</td></tr></table>';

        $sample_data = Storage::disk('public')->get($this->fname);

        $data = [
            'msg' => $result,
            'data' => explode(PHP_EOL, $sample_data),
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request) {
        $ext = '.' . $request->file('file')->extension();
        Storage::disk('local')->putFileAs('files', $request->file('file'), 'uploaded' . $ext);
        return redirect()->route('hello');
    }
}
