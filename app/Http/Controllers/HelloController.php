<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $fname;

    public function __construct() {
        $this->fname = 'hello.txt';
    }

    public function index(Request $request, Response $response) {
        $msg = 'please input text:';
        $keys = [];
        $values = [];

        if ($request->isMethod('post')) {
            $form = $request->all();
            $result = '<html><body>';
            foreach($form as $key => $value) {
                $result .= $key . ': ' . $value . '<br>';
            }
            $result .= '</body></html>';
            $response->setContent($result);
            return $response;
        }
        $data = [
            'msg' => $msg,
            'keys' => $keys,
            'values' => $values,
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request) {
        $ext = '.' . $request->file('file')->extension();
        Storage::disk('local')->putFileAs('files', $request->file('file'), 'uploaded' . $ext);
        return redirect()->route('hello');
    }
}
