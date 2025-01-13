<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;

Route::resource('groups', GroupController::class);

