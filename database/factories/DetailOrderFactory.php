<?php

namespace Database\Factories;

use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Tiket;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailOrderFactory extends Factory
{
    protected $model = DetailOrder::class;

    public function definition(): array
    {
        $tiket = Tiket::inRandomOrder()->first();
        $jumlah = $this->faker->numberBetween(1, 5);

        return [
            'order_id' => Order::inRandomOrder()->first()->id,
            'tiket_id' => $tiket->id,
            'jumlah' => $jumlah,
            'subtotal_harga' => $tiket->harga * $jumlah,
        ];
    }
}
