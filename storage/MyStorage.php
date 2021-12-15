<?php

// config/filesystems.php
use Illuminate\Support\Facades\Storage;

    Storage::disk('local')->files($directory);	//to select
        //storage/app/example.txt:
    Storage::put('example.txt', 'Contents');
    Storage::writeStream('path.jpg', $resource, $options = []);
    $contents = Storage::get('file.jpg');
    if (Storage::exists('file.jpg')) {}
    if (Storage::missing('file.jpg')) {}
    return Storage::download('file.jpg');
    $size = Storage::size('file.jpg');
    $path = Storage::path('file.jpg');
    Storage::copy('old/file.jpg', 'new/file.jpg');
    Storage::move('old/file.jpg', 'new/file.jpg');
    Storage::delete(['file.jpg', 'file2.jpg']);
    $files = Storage::files($directory);	//single dir
    $files = Storage::allFiles($directory);	//sub-dirs
    $directories = Storage::directories($directory);
    $directories = Storage::allDirectories($directory);
    Storage::makeDirectory($directory);
    Storage::deleteDirectory($directory);		//remove a directory and all of its files
