<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\admin\InvoiceController;
use App\Http\Controllers\admin\UserController;
use App\Http\Middleware\AdminMiddleware;

// Admin Only

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    // Users

    Route::get('/users/create/{users_id}', [UserController::class, 'create']);
    Route::put('/users/update/{users_id}', [UserController::class, 'update']);
    Route::get('/users/delete/{users_id}', [UserController::class, 'destroy']);

    // Customers

    Route::get('/customers/create', [CustomerController::class, 'create']);
    Route::get('/customers/edit/{customers_id}', [CustomerController::class, 'edit']);
    Route::put('/customers/update/{customers_id}', [CustomerController::class, 'update']);
    Route::post('/customers/add', [CustomerController::class, 'store']);
    Route::get('/customers/delete/{customers_id}', [CustomerController::class, 'destroy']);

    // Products

    Route::get('/products/create', [ProductController::class, 'create']);                 // Go to the form page
    Route::get('/products/edit/{products_id}', [ProductController::class, 'edit']);       //Go to the edit page
    Route::put('/products/update/{products_id}', [ProductController::class, 'update']);   // Update the database
    Route::post('/products/add', [ProductController::class, 'store']);                    // Add to the database
    Route::get('/products/delete/{products_id}', [ProductController::class, 'destroy']);   // Delete From the database

    // invoices

    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'delete'])->name('invoices.delete');
});


// Admin + Staff

Route::prefix('admin')->middleware(['auth', 'role:admin,staff'])->group(function () {

    // Admin Dashboard

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Users

    Route::get('/users/view', [UserController::class, 'index']);

    // Customers

    Route::get('/customers/view', [CustomerController::class, 'index']);

    // Products

    Route::get('/products/view', [ProductController::class, 'index']);                    // Go to the view page

    // Invoice

    Route::get('/invoices/create', [InvoiceController::class, 'index']); // Create Invoices
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/invoices', [InvoiceController::class, 'list'])->name('invoices.list');
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('/invoices/{invoice}/pdf', [InvoiceController::class, 'exportPdf'])->name('invoices.pdf');
});
