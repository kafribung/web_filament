<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

Route::get('/', function() {
    return redirect('/admin');
});
