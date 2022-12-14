<?php

use Illuminate\Support\Facades\Route;
use Modules\Inventory\Http\Controllers\InvBoController;
use Modules\Inventory\Http\Controllers\InvItemController;
use Modules\Inventory\Http\Controllers\InvPoController;
use Modules\Inventory\Http\Controllers\InvReceiveController;
use Modules\Inventory\Http\Controllers\InvSalesController;
use Modules\Inventory\Http\Controllers\InvStockController;
use Modules\Inventory\Http\Controllers\InvSupplierController;

Route::prefix('inventory')->name('inventory.')->group(function () {
    Route::prefix('master')->name('master.')->group(function () {
        Route::prefix('supplier')->name('supplier.')->group(function () {
            Route::get('/', [InvSupplierController::class, 'index'])->name('index');
            Route::get('/show_form', [InvSupplierController::class, 'show_form'])->name('show_form');
            Route::get('/show_table', [InvSupplierController::class, 'show_table'])->name('show_table');
            Route::post('/store', [InvSupplierController::class, 'store'])->name('store');
            Route::put('/update', [InvSupplierController::class, 'update'])->name('update');
            Route::delete('/delete', [InvSupplierController::class, 'delete'])->name('delete');
        });
        Route::prefix('item')->name('item.')->group(function () {
            Route::get('/', [InvItemController::class, 'index'])->name('index');
            Route::get('/show_form', [InvItemController::class, 'show_form'])->name('show_form');
            Route::get('/show_table', [InvItemController::class, 'show_table'])->name('show_table');
            Route::post('/store', [InvItemController::class, 'store'])->name('store');
            Route::put('/update', [InvItemController::class, 'update'])->name('update');
            Route::delete('/delete', [InvItemController::class, 'delete'])->name('delete');
        });
        Route::prefix('stock')->name('stock.')->group(function () {
            Route::get('/', [InvStockController::class, 'index'])->name('index');
            Route::get('/show_form', [InvStockController::class, 'show_form'])->name('show_form');
            Route::get('/show_table', [InvStockController::class, 'show_table'])->name('show_table');
            Route::post('/adjusment', [InvStockController::class, 'adjusment'])->name('adjusment');
        });
    });
    Route::prefix('po')->name('po.')->group(function () {
        Route::get('/', [InvPoController::class, 'index'])->name('index');
        Route::get('/create', [InvPoController::class, 'create'])->name('create');
        Route::post('/store', [InvPoController::class, 'store'])->name('store');
        Route::get('/{inv_po}/detail', [InvPoController::class, 'show'])->name('detail');
        Route::get('/{inv_po}/edit', [InvPoController::class, 'edit'])->name('edit');
        Route::put('/{inv_po}/update', [InvPoController::class, 'update'])->name('update');
        Route::delete('/{inv_po}/delete', [InvPoController::class, 'delete'])->name('delete');
    });
    Route::prefix('bo')->name('bo.')->group(function () {
        Route::get('/', [InvBoController::class, 'index'])->name('index');
        Route::get('/create', [InvBoController::class, 'create'])->name('create');
        Route::post('/store', [InvBoController::class, 'store'])->name('store');
        Route::get('/{inv_bo}/detail', [InvBoController::class, 'show'])->name('detail');
        Route::get('/{inv_bo}/edit', [InvBoController::class, 'edit'])->name('edit');
        Route::put('/{inv_bo}/update', [InvBoController::class, 'update'])->name('update');
        Route::delete('/{inv_bo}/delete', [InvBoController::class, 'delete'])->name('delete');
    });
    Route::prefix('receive')->name('receive.')->group(function () {
        Route::get('/', [InvReceiveController::class, 'index'])->name('index');
        Route::get('/create', [InvReceiveController::class, 'create'])->name('create');
        Route::post('/store', [InvReceiveController::class, 'store'])->name('store');
        Route::get('/{inv_receive}/detail', [InvReceiveController::class, 'show'])->name('detail');
        Route::get('/{inv_receive}/edit', [InvReceiveController::class, 'edit'])->name('edit');
        Route::put('/{inv_receive}/update', [InvReceiveController::class, 'update'])->name('update');
        Route::delete('/{inv_receive}/delete', [InvReceiveController::class, 'delete'])->name('delete');
    });
    Route::prefix('sales')->name('sales.')->group(function () {
        Route::get('/', [InvSalesController::class, 'index'])->name('index');
        Route::get('/create', [InvSalesController::class, 'create'])->name('create');
        Route::post('/store', [InvSalesController::class, 'store'])->name('store');
        Route::get('/{inv_sales}/detail', [InvSalesController::class, 'show'])->name('detail');
        Route::get('/{inv_sales}/edit', [InvSalesController::class, 'edit'])->name('edit');
        Route::put('/{inv_sales}/update', [InvSalesController::class, 'update'])->name('update');
        Route::delete('/{inv_sales}/delete', [InvSalesController::class, 'delete'])->name('delete');
    });
});
