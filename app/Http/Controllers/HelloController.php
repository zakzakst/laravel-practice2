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
            $form = $request->only(['name', 'mail', 'tel']);
            $keys = array_keys($form);
            $values = array_values($form);
            $msg = old('name') . ', ' . old('mail') . ', ' . old('tel');
            $data = [
                'msg' => $msg,
                'keys' => $keys,
                'values' => $values,
            ];
            $request->flash();
            return view('hello.index', $data);
        }
        $data = [
            'msg' => $msg,
            'keys' => $keys,
            'values' => $values,
        ];
        $request->flash();
        return view('hello.index', $data);
    }

    public function other(Request $request) {
        $ext = '.' . $request->file('file')->extension();
        Storage::disk('local')->putFileAs('files', $request->file('file'), 'uploaded' . $ext);
        return redirect()->route('hello');
    }
}
