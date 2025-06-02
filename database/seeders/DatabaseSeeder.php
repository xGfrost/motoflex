<?php

namespace Database\Seeders;

use App\Models\SpareParts;
use App\Models\User;
use App\Models\Workshops;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'John Doe',
        'email' => 'fadelakbar@gmail.com',
        'password'=> bcrypt('password123'),
        'phone_number' => '123-456-7890',
        'address' => '123 Main St, Springfield, USA',
        'role' => 'admin',
        'coin'=> 1,]);

        Workshops::create([
            'user_id' => 1,
            'name' => 'PT EMPAT BERUANG PERKASA ASWIN ARUNG ILMI FADEL AKBAR',
            'description' => 'We provide top-notch auto repair services in Springfield. Our experienced mechanics are here to help with all your vehicle needs.',
            'address' => '456 Elm St, Springfield, USA',
            'phone_number' => '987-654-3210',
        ]);

        SpareParts::create([
            'name' => 'Oil Filter',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere dolorum beatae ab nobis. Necessitatibus, nisi magnam. Atque eveniet numquam, id minus distinctio placeat modi dignissimos rerum aspernatur saepe voluptatum dolorum voluptas consequuntur facilis, aliquid corrupti asperiores, nihil nemo perferendis doloremque aliquam. Placeat aliquid harum neque qui officiis cum omnis nam, sit perspiciatis accusantium consequuntur veritatis aspernatur quis tempore esse architecto fugiat, ratione maiores minus cupiditate mollitia in dolorem amet. Possimus magnam vero sunt qui voluptatum excepturi, dolores fugiat quaerat fugit dicta, repudiandae ipsam voluptas et quos labore culpa nobis distinctio iusto debitis maxime quam, suscipit fuga eaque. Sequi quidem delectus temporibus dolore alias aspernatur voluptatum illum. Repellendus itaque officiis eos doloremque eius natus quia, quam nulla. Minus, numquam eligendi, sed rerum incidunt nulla rem, explicabo reiciendis fugiat voluptatum accusantium? Minima voluptate blanditiis aspernatur ex, rem atque minus nisi fuga tempore incidunt illum, itaque tempora architecto pariatur assumenda perspiciatis, corrupti voluptatum! Voluptas maxime iusto, aspernatur, quis eos, veniam nobis placeat nemo aliquam modi tempora magnam! Architecto libero pariatur quibusdam sint aut. Ipsum maxime voluptatem iste consectetur vero, voluptates blanditiis, labore beatae veritatis, voluptas molestias non ratione aspernatur at in ullam? Odit odio veritatis magnam explicabo quaerat est tempora ipsa ex fugit.',
            'price' => 15.99,
            'stock' => 100,
            'workshop_id' => 1,
        ]);
    }
}
