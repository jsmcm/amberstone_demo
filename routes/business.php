<?php

use App\Http\Controllers\BusinessController;
use App\Http\Middleware\ensureUserHasRole;
use App\Models\Business;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::middleware('auth')->middleware(ensureUserHasRole::class, ":Purchasing Manager")->group(function () {

Route::get('businesses', [BusinessController::class, "index"])->name('businesses');
// });
