<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index($id = -1) {
        $msg = 'show page: ' . $id;
        $result = DB::table('people')
            ->paginate(3, ['*'], 'page', $id);
        
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
