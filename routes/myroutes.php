<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

		Route::get('/user/{id?}', function (Request $request, Response $response, $id=null ) {
            // $request ==  request()
            
    		//Request
			        //http://example.com/foo/bar,
				$urlWithQueryString = $request->fullUrl();	//with query string
				$method = $request->method();
				// if ($request->isMethod('post')){}
				$value = $request->header('X-Header-Name', 'default');	//set as default str if empty
				$token = $request->bearerToken();
				$input = $request->all();  // as array
				$input = $request->input();	//associative array:
				$input = $request->input('name', 'Sally');
				$inputs = $request->input('products.*.name');		
				$name = $request->input('user.name');
				// $checkbox = $request->boolean('checkbox');		
				$input = $request->only('username', 'password');
				$input = $request->except('credit_card');
				if ($request->has(['name', 'email'])) { }
				if ($request->filled('name')) { }				
				$value = $request->cookie('name');
				$file = $request->file('filename');
				if ($request->hasfile('filename')) { }
				if ($request->file('filename')->isValid()) { }
				$path = $request->file('filename')->path();
				$extension = $request->file('filename')->extension();
				$name=	$request->file('filename')->hashName();
				$path = $request->file('filename')->storeAs('images/id', 'filename.jpg', 'local');	//accepts the path, filename, and disk name(optional)
				$path = Storage::putFileAs('images', $request->file('avatar'), 'photo.jpg');	//use a name


			//Response            // $response == response()			//without return
				return 'User '.$id;
				return response()->view('hello', ['name' => 'Abigail'], 200);
				return view('admin.profile',['name' => 'Abigail']);
                return response()->json([ 'name' => 'Abigail']);
				return response()->download('pathToFile', 'name');
				return response()->file('pathToFile');
				//->header('X-Header-One', 'Header Value');
					//Cookie
				return response('Hello World')->cookie(	'name', 'value', 60*60*24*7, '/path', 'domain', 'secure', 'httpOnly');
				return response('Hello World')->withoutCookie('name');
						// Disable Encryption:	app/Http/Middleware/EncryptCookies.php
						// 		protected $except = ['cookie_name',];
					// Redirect
				return back()->withInput();
				return redirect()->route('user.create');
				return redirect('home/dashboard');
				return redirect()->action([Nameofcontroller::class, 'index']);
				return redirect()->action([Nameofcontroller::class, 'profile'], ['id' => 1]);	//with route parameters
				return redirect()->away('https://www.google.com');
						
		});

        // use App\Http\Controllers\Nameofcontroller
        Route::post('/user', [Nameofcontroller::class, 'index']);
        Route::match(['get', 'post'], 'uri', function(Request $request, Response $response){});
		Route::redirect('/here', '/there');
        Route::fallback(function(Request $request, Response $response){});
		Route::prefix('admin')->group(function () {
			Route::get('uri', function () {});
				// "/admin/$uri"
		});	

		// use App\Http\Middleware\Nameofmiddleware;
		Route::get($uri,$callback)->middleware([Nameofmiddleware::class]);
		Route::middleware([Nameofmiddleware::class])->group(function () {
			Route::get('uri', function(){});
			Route::get('uri', function(){})->withoutMiddleware([Nameofmiddleware::class]);
		});

        // use App\Http\Controllers\Nameofcontroller --resource CRUD
        Route::resource('users', Nameofcontroller::class);
		Route::resource('users', nameofcontroller::class)->parameters(['users' => 'admin_user']);
		// Route::resources(['users' => Nameofcontroller1::class, 'admins' => Nameofcontroller2::class,])
		// ->missing(function (Request $request) {
        //     return redirect()->route('photos.index');
        // });		//missing is optional
		Route::resource('users', Nameofcontroller::class)->only(['index', 'show']);
		Route::resource('users', Nameofcontroller::class)->except(['create', 'store', 'update', 'destroy']);
		Route::apiResource('users', Nameofcontroller::class);