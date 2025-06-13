<?php

use App\Http\Controllers\GoogleAuthController;
use App\Livewire\AddServices;
use App\Livewire\AddSpareParts;
use App\Livewire\DashboarAdmin;
use App\Livewire\EditServices;
use App\Livewire\EditSpareParts;
use App\Livewire\Orders;
use App\Livewire\Services;
use App\Livewire\ShowService;
use App\Livewire\ShowSpareParts;
use App\Livewire\SpareParts;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return redirect()->route('login');
});

Route::get('/dashboard/admin', DashboarAdmin::class)->name('dashboard.admin');
Route::get('/dashboard/admin/orders', Orders::class)->name('orders');
Route::get('/dashboard/admin/spareparts', SpareParts::class)->name('spareparts');
Route::get('/dashboard/admin/services', Services::class)->name('services');

Route::get('/add/spareparts', AddSpareParts::class);
Route::get('/add/services', AddServices::class);
Route::get('/edit/{id}/services', EditServices::class);
Route::get('/edit/{id}/spareparts', EditSpareParts::class);
Route::get('/dashboard/admin/services/{services_id}/show', ShowService::class)->name('admin.services.show');
Route::get('/dashboard/admin/spareparts/{spareparts_id}/show', ShowSpareParts::class)->name('admin.spareparts.show');

Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);





