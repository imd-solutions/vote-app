<?php


use Illuminate\Support\Facades\Route;

Route::get('/{any1?}/{any2?}', function () {
    return view('app');
})->where('any*', '.*');