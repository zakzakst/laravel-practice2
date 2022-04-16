<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Pagination\MyPaginator;
use App\Events\PersonEvent;

class HelloController extends Controller
{
    public function index(Person $person = null) {
        if ($person != null) {
            MyJob::dispatch($person);
        }
        $msg = 'show people record.';
        $result = Person::get();
        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
    
    public function send(Request $request) {
        $id = $request->input('id');
        $person = Person::find($id);

        event(new PersonEvent($person));
        $data = [
            'input' => '',
            'msg' => 'id=' . $id,
            'data' => [$person],
        ];
        return view('hello.index', $data);
    }
}
