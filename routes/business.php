<?php

use App\Http\Controllers\BusinessController;
use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


// Requires Any Logged In User
Route::middleware('auth')->group(function () {
    Route::get('businesses', [BusinessController::class, "index"])->name('businesses');
});

// Requires Purchasing Manager or Above
Route::middleware('auth')->middleware(EnsureUserHasRole::class.":Purchasing Manager")->group(function () {
    //
});

// Requires System Administrator
Route::middleware('auth')->middleware(EnsureUserHasRole::class.":System Administrator")->group(function () {
    Route::get("businesses/create", [BusinessController::class, "create"])->name("businesses.create");
    Route::post("businesses", [BusinessController::class, "store"])->name("businesses.store");

    Route::get("businesses/edit", [BusinessController::class, "edit"])->name("businesses.edit");
    Route::put("businesses/{business}", [BusinessController::class, "update"])->name("businesses.update");

    Route::delete("businesses/{business}", [BusinessController::class, "destroy"])->name("businesses.destroy");

    Route::get("businesses/{business}", [BusinessController::class, "show"])->name("businesses.show");
});
