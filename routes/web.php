<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;


Route::get('/', function () {
    return view('index');
});

Route::view('/1', 'new', ['name' => 'Taylor', 'type'=> 'Male']);

Route::get('/2/{id?}', function (Request $request, Response $response, $id=null) {
    return 'lol'.$id;
});

Route::view('/3', 'viewcomponent',['name' => 'Mike']);

Route::view('/4', 'new', ['name' => 'Taylor', 'type'=> 'Male']);

Route::view('/5', 'new', ['name' => 'Taylor', 'type'=> 'Male']);
