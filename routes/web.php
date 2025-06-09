<?php

use App\Livewire\AddServices;
use App\Livewire\AddSpareParts;
use App\Livewire\DashboarAdmin;
use App\Livewire\EditServices;
use App\Livewire\Orders;
use App\Livewire\Services;
use App\Livewire\SpareParts;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/admin', DashboarAdmin::class)->name('dashboard.admin');
Route::get('/dashboard/admin/orders', Orders::class)->name('orders');
Route::get('/dashboard/admin/spareparts', SpareParts::class)->name('spareparts');
Route::get('/dashboard/admin/services', Services::class)->name('services');

Route::get('/add/spareparts', AddSpareParts::class);
Route::get('/add/services', AddServices::class);
Route::get('/edit/{id}/services', EditServices::class);



