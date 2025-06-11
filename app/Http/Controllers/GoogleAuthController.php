<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GoogleAuthController extends Controller
{
    // Ini yang berisi return Socialite::driver...
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Ini untuk handle callback setelah login berhasil
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Contoh: cari atau buat user berdasarkan email
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            ['name' => $googleUser->getName()]
        );

        Auth::login($user);

        return redirect('/dashboard/admin'); // Arahkan ke dashboard atau halaman utama
    }
}

