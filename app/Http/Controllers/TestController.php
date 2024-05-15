<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return view('testAxios');
    }

    public function testPost(Request $request)
    {
        return $request;
    }
}
