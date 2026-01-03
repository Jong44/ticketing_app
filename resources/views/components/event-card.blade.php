@props([
    'title',
    'date',
    'location',
    'price' => null,
    'image' => null,
    'href' => null,
])

@php
    $formattedPrice = $price
        ? 'Rp ' . number_format($price, 0, ',', '.')
        : 'Harga tidak tersedia';

    $formattedDate = $date
        ? \Carbon\Carbon::parse($date)->locale('id')->translatedFormat('d F Y, H:i')
        : 'Tanggal tidak tersedia';

    // IMAGE RESOLVER (FINAL & AMAN)
    if ($image && filter_var($image, FILTER_VALIDATE_URL)) {
        $imageUrl = $image;
    } elseif ($image) {
        $imageUrl = asset('storage/' . ltrim($image, '/'));
    } else {
        $imageUrl = asset('storage/events/yaya.png');
    }
@endphp

<a href="{{ $href ?? '#' }}" class="block">
    <div class="card bg-base-100 h-96 shadow-sm hover:shadow-md transition-shadow">

        <figure>
            <img
                src="{{ $imageUrl }}"
                alt="{{ $title }}"
                class="w-full h-48 object-cover"
                loading="lazy"
            />
        </figure>

        <div class="card-body">
            <h2 class="card-title">{{ $title }}</h2>

            <p class="text-sm text-gray-500">
                {{ $formattedDate }}
            </p>

            <p class="text-sm">
                📍 {{ $location }}
            </p>

            <p class="font-bold text-lg mt-2">
                {{ $formattedPrice }}
            </p>
        </div>

    </div>
</a>
