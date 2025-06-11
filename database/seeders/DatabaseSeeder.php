<?php

namespace Database\Seeders;

use App\Models\Services;
use App\Models\SpareParts;
use App\Models\User;
use App\Models\Workshops;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ========== USERS ==========
        $users = [];
        for ($i = 1; $i <= 10; $i++) {
            $users[] = User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password123'),
                'phone_number' => '0812345678' . $i,
                'address' => 'Jl. User No. ' . $i,
                'role' => 'user',
                'coin' => rand(0, 10),
            ]);
        }

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
        ]);
        // ========== WORKSHOPS ==========
        $workshopNames = [
            'Bengkel Prima Motor',
            'Bengkel Jaya Abadi',
            'Auto Care Center',
            'Mekanik Mandiri',
            'Servis Mobil Hebat',
            'Bengkel Fajar Motor',
            'Gina Auto Servis',
            'Hendra Otomotif',
            'Intan Mobil',
            'Joko Auto Clinic',
        ];

        $workshops = [];

        foreach ($workshopNames as $i => $name) {
            $workshops[] = Workshops::create([
                'user_id' => $users[$i]->id,
                'name' => $name,
                'description' => 'Kami menyediakan layanan servis dan perawatan kendaraan terpercaya.',
                'address' => 'Jl. Bengkel No. ' . ($i + 1),
                'phone_number' => '0823456789' . ($i + 1),
            ]);
        }

        // ========== SPAREPARTS ==========
        for ($i = 0; $i < 10; $i++) {
            SpareParts::create([
                'name' => 'Sparepart ' . ($i + 1),
                'description' => 'Sparepart berkualitas tinggi untuk kendaraan Anda.',
                'price' => rand(50, 500),
                'stock' => rand(10, 100),
                'workshop_id' => $workshops[$i]->id,
            ]);
        }

        // ========== SERVICES ==========
        for ($i = 0; $i < 10; $i++) {
            Services::create([
                'workshop_id' => $workshops[$i]->id,
                'name' => 'Service ' . ($i + 1),
                'description' => 'Layanan perawatan dan perbaikan kendaraan.',
                'price' => rand(100, 300),
                'duration' => rand(30, 90), // in minutes
            ]);
        }
    }
}
