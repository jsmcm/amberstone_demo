<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


// Requires Any Logged In User
Route::middleware('auth')->group(function () {

    Route::get("purchase-orders/distributors", [PurchaseOrderController::class, "index"])
        ->name("purchase-orders.distributors")
        ->defaults('entity', 'distributor');

    Route::get("purchase-orders/suppliers", [PurchaseOrderController::class, "index"])
        ->name("purchase-orders.suppliers")
        ->defaults('entity', 'supplier');

});


// Requires Purchasing Manager or Above
Route::middleware('auth')->middleware(EnsureUserHasRole::class.":Purchasing Manager")->group(function () {

    // CREATE FORM
    Route::get("purchase-orders/distributors/create", [PurchaseOrderController::class, "create"])
        ->name("purchase-orders.distributors.create")
        ->defaults('entity', 'distributor');

    Route::get("purchase-orders/suppliers/create", [PurchaseOrderController::class, "create"])
    ->name("purchase-orders.suppliers.create")
    ->defaults('entity', 'supplier');



    // STORE
    Route::post("purchase-orders", [PurchaseOrderController::class, "store"])->name("purchase-orders.store");


    // EDIT FORM
    Route::get("purchase-orders/distributors/edit", [PurchaseOrderController::class, "edit"])
        ->name("purchase-orders.distributors.edit")
        ->defaults('entity', 'distributor');

    Route::get("purchase-orders/suppliers/edit", [PurchaseOrderController::class, "edit"])
        ->name("purchase-orders.suppliers.edit")
        ->defaults('entity', 'supplier');



    // UOPDATE
    Route::put("purchase-orders/{purchase-order}", [PurchaseOrderController::class, "update"])->name("purchase-orders.update");



    Route::delete("purchase-orders/{purchase-order}", [PurchaseOrderController::class, "destroy"])->name("purchase-orders.destroy");

    Route::get("purchase-orders/{purchase-order}", [PurchaseOrderController::class, "show"])->name("purchase-orders.show");
    
});


// Requires System Administrator
Route::middleware('auth')->middleware(EnsureUserHasRole::class.":System Administrator")->group(function () {

});
