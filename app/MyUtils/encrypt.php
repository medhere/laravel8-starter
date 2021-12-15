<?php
		//key configuration in config/app.php set APP_KEY

		//Encrypt
		use Illuminate\Support\Facades\Crypt;
        use Illuminate\Contracts\Encryption\DecryptException;
			$request->user()->fill([
				'token' => Crypt::encryptString($request->token),
			])->save();

		//Decrypting
        try {
			$decrypted = Crypt::decryptString($encryptedValue);
		} catch (DecryptException $e) {
			//
		}			
			
