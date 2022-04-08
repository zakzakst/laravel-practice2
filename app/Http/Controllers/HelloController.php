<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index($id = -1) {
        $data = ['msg' => '', 'data' => []];
        $msg = 'get: ';
        $result = [];
        DB::table('people')->chunkById(2, function($items) use (&$msg, &$result) {
            foreach($items as $item) {
                $msg .= $item->id . ' ';
                $result += array_merge($result, [$item]);
                break;
            }
            return true;
        });
        
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
