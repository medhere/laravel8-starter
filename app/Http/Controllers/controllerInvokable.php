<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class controllerInvokable extends Controller
{
    public function __invoke(Request $request, Response $response)
    {
        return 'invoke';
    }
}
