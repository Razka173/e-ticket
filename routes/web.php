<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Admin\CheckController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\TicketController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [GuestController::class, 'index'])->name('guest');
Route::post('/', [GuestController::class, 'store'])->name('guest.registration');
Route::get('/registered', [GuestController::class, 'registered'])->name('guest.registered');

Route::middleware(['auth'])->group(function () {
  Route::get('/admin/check-in', [CheckController::class, 'index'])->name('admin.check');
  Route::post('/admin/check-in', [CheckController::class, 'checkIn'])->name('admin.check.validate');
  Route::post('/admin/ticket/search', [CheckController::class, 'search'])->name('admin.ticket.search');
  Route::get('/admin/ticket', [TicketController::class, 'index'])->name('admin.ticket.index');
  Route::delete('admin/ticket/delete', [TicketController::class, 'destroy'])->name('admin.ticket.destroy');

  Route::get('admin/ticket/{ticket}/edit/', [TicketController::class, 'edit'])->name('admin.ticket.edit');
  Route::match(['put', 'patch'], 'admin/ticket/{ticket}', [TicketController::class, 'update'])->name('admin.ticket.update');
});
