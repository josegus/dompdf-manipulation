<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowInvoiceController;
use App\Http\Controllers\SendInvoiceController;
use App\Http\Controllers\DownloadInvoiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ShowInvoiceController::class);
Route::get('invoice/download', DownloadInvoiceController::class)->name('invoice.download');
Route::get('invoice/send', SendInvoiceController::class)->name('invoice.send');
