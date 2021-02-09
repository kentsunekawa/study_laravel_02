<?php

namespace App\Http\Controllers;
use App\Facades\MyService;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'msg'=> $request->hello,
            'data'=> $request->alldata,
        ];
        return view('hello.index', $data);
    }

}
