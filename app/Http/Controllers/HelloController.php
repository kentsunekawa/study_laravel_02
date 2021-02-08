<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $fname;

    function __construct() {
        $this->fname = 'hello.txt';
    }

    public function index(Request $request, Response $response)
    {
        $name = $request->query('name');
        $mail = $request->query('mail');
        $tel = $request->query('tel');
        $msg = $request->query('msg');
        $keys = ['名前','メール','電話'];
        $values = [$name, $mail, $tel];
        $data = [
            'msg'=> $msg,
            'keys'=>$keys,
            'values'=>$values,
        ];
        $request->flash();

        return view('hello.index', $data);
    }

    public function other()
    {
        $data = [
            'name' => 'Taro',
            'mail' => 'taro@yamada',
            'tel' => '090-0000-0000',
        ];
        $query_str = http_build_query($data);
        var_dump($query_str);
        $data['msg'] = $query_str;
        return redirect()->route('hello', $data);
    }
}
