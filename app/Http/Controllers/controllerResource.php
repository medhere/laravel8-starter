<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class controllerResource extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}


			//accessed in Route::resource
			// Route::resource('users', Nameofcontroller::class);
			// 	add custom
			// 	public function getThis($id)
				//accessed in Route::get|post
			// 	Route::get('/users/extra', [Nameofcontroller::class, 'getThis']);
