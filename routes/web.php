<?php

use App\Livewire\DashboarAdmin;
use App\Livewire\Services;
use App\Livewire\Workshops;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/admin', DashboarAdmin::class);
Route::get('/dashboard/admin/workshops', Workshops::class);
Route::get('/dashboard/admin/services', Services::class);



