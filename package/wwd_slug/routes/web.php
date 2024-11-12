<?php


use Illuminate\Support\Facades\Route;
use wwd\slug\Http\Controllers\SlugController;

Route::get('/slug-generate', [SlugController::class, 'index']);
