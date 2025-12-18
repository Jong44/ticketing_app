<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // existing user
            'judul' => $this->faker->sentence(3),
            'deskripsi' => $this->faker->paragraph(),
            'lokasi' => $this->faker->address(),
            'tanggal_waktu' => $this->faker->dateTimeBetween('+1 day', '+1 month'),
            'kategori_id' => 1, // change if needed
            "gambar" => "storage/yaya.png"
        ];
    }
}
