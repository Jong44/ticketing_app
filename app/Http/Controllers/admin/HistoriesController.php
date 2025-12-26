<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoriesController extends Controller
{
    public function index()
    {
        $histories = Order::latest()->get();
        return view('pages.admin.history.index', compact('histories'));
    }

    public function show(Order $history)
    {
        $order = $history;
        return view('pages.admin.history.show', compact('order'));
    }
}
