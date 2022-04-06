<?php

namespace App\Http\Controllers;
// use App\MyClasses\MyService;

class HelloController extends Controller
{
    public function index(int $id = -1) {
        $myservice = app()->makeWith('App\MyClasses\MyService', ['id' => $id]);
        $data = [
            'msg' => $myservice->say(),
            'data' => $myservice->alldata(),
        ];
        return view('hello.index', $data);
    }
}
