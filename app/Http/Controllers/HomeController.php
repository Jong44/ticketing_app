<?php

namespace App\Http\Controllers;

use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::withMin('tikets', 'harga')
            ->orderBy('tanggal_waktu', 'asc')
            ->get();

        return view('home', compact('events'));
    }
}
