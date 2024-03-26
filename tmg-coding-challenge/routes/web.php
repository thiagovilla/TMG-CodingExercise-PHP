<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::match(array('GET', 'POST'), '/sample', function () {
    return view('sample');
});
