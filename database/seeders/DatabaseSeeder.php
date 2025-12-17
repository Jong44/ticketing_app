<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        // Create an admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        // Create a regular user
        User::factory()->create();

        Kategori::factory()->count(5)->create();
        // 1. Create 20 Events
        \App\Models\Event::factory(20)->create();

        // 2. Create 20 Tikets
        \App\Models\Tiket::factory(20)->create();

        // 3. Create 20 Orders
        \App\Models\Order::factory(20)->create();

        // 4. Create 20 DetailOrders
        \App\Models\DetailOrder::factory(20)->create();

        // 5. Recalculate Order Total Harga
        foreach (\App\Models\Order::all() as $order) {
            $order->total_harga = $order->detailOrders->sum('subtotal_harga');
            $order->save();
        }



    }
}
