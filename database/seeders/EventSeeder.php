<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'nama' => 'Konser Musik Rock',
                'deskripsi' => 'Nikmati malam penuh energi dengan band rock terkenal.',
                'tanggal' => '2024-08-15 19:00:00',
                'lokasi' => 'Stadion Utama',
                'kategori_id' => 2,
                'gambar' => 'konser_rock.jpg',
            ],
            [
                'nama' => 'Pameran Seni Kontemporer',
                'deskripsi' => 'Jelajahi karya seni modern dari seniman lokal dan internasional.',
                'tanggal' => '2024-09-10 10:00:00',
                'lokasi' => 'Galeri Seni Kota',
                'kategori_id' => 2,
                'gambar' => 'pameran_seni.jpg',
            ],
            [
                'nama' => 'Festival Makanan Internasional',
                'deskripsi' => 'Cicipi berbagai hidangan lezat dari seluruh dunia.',
                'tanggal' => '2024-10-05 12:00:00',
                'lokasi' => 'Taman Kota',
                'kategori_id' => 4,
                'gambar' => 'festival_makanan.jpg',
            ],
        ];
        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
