<?php

    /*
        config/database.php	OR .env
			normal
				'mysql' => [
					'driver' => 'mysql', 'database' => 'database', 'prefix' => '',
					'username' => 'root', 'password' => '',
					'charset' => 'utf8mb4',	'collation' => 'utf8mb4_unicode_ci'
				]
			using URL( url (or corresponding DATABASE_URL environment variable))
				driver://username:password@host:port/database?options
				mysql://root:password@127.0.0.1/forge?charset=UTF-8
					can set up multiple dbs
		php artisan db mysql
    */
		use Illuminate\Support\Facades\DB;
			$users1 = DB::connection('mysql1');
			$users1->statement('');
			$users2 = DB::connection('mysql2')->statement('');
			
			//$users = DB::select|insert|update|delete|statement('query id = ?', [1]);	// symbol binding for sql injection
			//$users = DB::select|insert|update|delete|statement('query id = :id', ['id' => 1]);	//named binding for sql injection
					// foreach ($users as $user) {	}		

		//Query Builder					
		$users2 = DB::connection('mysql2')->table('')->get();	

		$users = DB::table('tablename')
			->get()		//foreach ($users as $user) {}, foreach ($users as $name => $user) {}
			->first()	//$user->email;	//1 row
			->value('email')			//1 col
			->chunk(100, function ($users) { })	//return false; to stop chucking
			->chunkById(100, function ($users) { }) 
			->distinct()->get()
			->inRandomOrder()->get()	//get random order
			->where('user','>=','value')->get()
			->whereDate('created_at', '2016-12-31')->get()
			->offset(10)->limit(5)->get() //SAME AS ->skip(10)->take(5)->get()	//used for pagination			
			->insert(['email' => 'kayla@example.com' , 'votes' => '0'])
			->where('id', 1)->update(['votes' => 1])
			->where('votes', '>', 100)->delete()

					//Use upsert for multiple, updateOrInsert for 1 recor
			->upsert([
				['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99]], //insert
				['departure', 'destination'], // if in table
				['price']	// fields that should be updated if record exists
				)	
			->updateOrInsert(
				['name' => 'John'],	//where
				['votes' => '2']	//update this or insert all with where
			);
		$users = DB::raw('Select * from tablename where user = ?',['data']);