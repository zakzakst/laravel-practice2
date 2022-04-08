<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index($id = -1) {
        $data = ['msg' => '', 'data' => []];
        $msg = 'get: ';
        $result = [];
        $count = 0;
        DB::table('people')
            ->chunkById(3, function($items) use (&$msg, &$result, &$id, &$count)
        {
            if ($count == $id) {
                foreach($items as $item) {
                    $msg .= $item->id . ' ';
                    $result += array_merge($result, [$item]);
                }
                return false;
            }
            $count++;
            return true;
        });
        
        $data = [
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
}
