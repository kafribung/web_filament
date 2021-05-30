<?php

use App\Models\Customer;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

Route::get('/', function() {
    return redirect('/admin');
});

Route::get('debugging', function(){
    $data = Customer::with('category')->get();
    dd($data);
});
