<?php

namespace Database\Factories;

use App\Models\Tiket;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class TiketFactory extends Factory
{
    protected $model = Tiket::class;

    public function definition(): array
    {
        return [
            'event_id' => Event::inRandomOrder()->first()->id,
            'tipe' => $this->faker->randomElement(['reguler', 'premium']),
            'harga' => $this->faker->randomFloat(2, 50000, 250000),
            'stok' => $this->faker->numberBetween(20, 100),
        ];
    }
}
