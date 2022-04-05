<?php

namespace App\Http\Controllers;
use App\MyClasses\MyService;

class HelloController extends Controller
{
    public function index(MyService $myservice) {
        $data = [
            'msg' => $myservice->say(),
            'data' => $myservice->data(),
        ];
        return view('hello.index', $data);
    }
}
