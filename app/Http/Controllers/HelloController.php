<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index() {
        $result = DB::table('people')->get();
        $data = [
            'msg' => 'Database access.',
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
