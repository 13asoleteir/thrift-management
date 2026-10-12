<?php

namespace App\Http\Controllers;

use App\Models\Item;

class DashboardController extends Controller
{
    public function index()
    {
        // Count each database record as one item.
        $totalItems = Item::count();

        $availableItems = Item::where('status', 'available')->count();

        $soldItems = Item::where('status', 'sold')->count();

        // Calculate total profit from sold items.
        $totalProfit = Item::where('status', 'sold')
            ->whereNotNull('sold_price')
            ->get()
            ->sum(function ($item) {
                return $item->profit;
            });

        return view('dashboard', compact(
            'totalItems',
            'availableItems',
            'soldItems',
            'totalProfit'
        ));
    }
}
