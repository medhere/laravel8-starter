<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

//use App\Http\Middleware\Nameofmiddleware;

class Mycontroller extends Controller
{

    public function __construct(){	
        $this->middleware([Nameofmiddleware::class]);
        $this->middleware([Nameofmiddleware::class])->only('index');
        $this->middleware([Nameofmiddleware::class])->except('store');
    }

    public function test(Request $request, Response $response)
    {
        return 'this is a test controller';
    }
}
