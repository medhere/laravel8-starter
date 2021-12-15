<?php
	
    // use in routes and controllers
    use Illuminate\Support\Facades\Validator;		
    use Illuminate\Validation\Rules\Password;
		//Validator::make($object, $rules)->; Or ->validate()		

		$validated = $request->validate([ 
				'title' => 'required|unique:posts|max:255', 
				'body' => ['required', 'max:20'],
				'author.name' => 'required',
				'person.*.email' => 'email|unique:users',
		]);
		$validated = $request->validateWithBag('post', [$rules]);	//store error msgs in named error bag
		Validator::make($request->all(), [$rules])->validate();
				// @foreach ($errors->all() as $error)	//@error('title', 'post') for error bag
				// 	<li>{{ $error }}</li>
				// @endforeach
	        
        if ($validated->fails()) {
            return redirect('post/create')->withErrors($validated)->withInput();
        }
	
		$validated = $request->validated();
		$validated = $request->safe()->only(['name', 'email']);
		$validated = $request->safe()->except(['name', 'email']);
		$validated = $request->safe()->all();
		$validated = $request->safe()->merge(['name' => 'Taylor Otwell']);	// add extra data	
		$errors = $validator->errors();
		$errors->all();		//as array
		$errors->get('email');	//as array
		$errors->has('email');
    
        /*
		Rules
			accepted|declined	//true,yes,on,1|false,no,off,0
			alpha
			alpha_dash	//may have alpha-numeric characters, as well as dashes and underscores.
			alpha_num
			integer
			confirmed 	//field and field_confirmation
			date
			file
			mimetypes:text/plain,...
			mimes:jpg,bmp,png
			email	//'email:rfc,dns,strict,spoof,filter'
			image
			boolean
			numeric
			string
			array	//'array',	//'array:username,locale',	//array with accepted keys
			bail

			nullable	//may be null.
			present		//present but can be empty.
			required	//present and not empty. 
			required_if:anotherfield,value,...		//field must be present and not empty if the anotherfield field is equal to any value.
			same:field
			exclude		//exclude field from the request data returned by the validate methods.
			exclude_if:anotherfield,value
			
			after:date|before:date	//|date|after:tomorrow	,|date|after:start_date
			between:min,max		//size between the given min and max. Strings, numerics, arrays, and files.
			different:field		//must have a different value than field.
			digits:value		//must have exact length of value
			dimensions		//'dimensions:min_width=100,min_height=200'		min_width, max_width, min_height, max_height, width, height, ratio(3/2,1.5)
			ends_with:foo,bar,...
			gt:field|gte:field	//>,>=field
			lt:field|lte:field	//<,<=field
			not_in|in:foo,bar,...	//not|included in values, explode array
			max:value|min:value	//<=value, >=value
			size:value	//'size:12'; 'integer|size:10'; 'array|size:5'; 'file|size:512';
			regex:pattern|not_regex:pattern
        */
			// 'password' => ['required', 'confirmed', Password::min(8)],
			
            Password::min(8)
			->letters()
			->mixedCase()
			->numbers()
			->symbols()
			->uncompromised()	//uses haveibeenpwned.com service
			->uncompromised(3);	// number of apearances
			