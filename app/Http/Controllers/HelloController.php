<?php

namespace App\Http\Controllers;
use App\Facades\MyService;
use Illuminate\Http\Request;
use App\Person;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        Person::get(['*'])->searchable();
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
        $input = $request->input('find');
        $msg = 'search: ' . $input;
        $result = Person::search($input)->get();
        $data = [
            'input' => $input,
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }

    // public function save($id, $name)
    // {
    //     $record = Person::find($id);
    //     $record->name = $name;
    //     $record->save();
    //     return redirect()->route('hello');
    // }

    public function other(){
        $person = new Person();
        $person->all_data = ['aaa', 'bbb@ccc', 99];
        $person->save();
        return redirect()->route('hello');
    }

    public function json($id = -1) {
        if($id == -1) {
            return Person::get()->toJson();
        } else {
            return Person::find($id)->toJson();
        }
    }
}
