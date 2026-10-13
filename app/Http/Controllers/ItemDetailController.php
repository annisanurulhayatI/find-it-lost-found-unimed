<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use App\Models\FoundItem;

class ItemDetailController extends Controller
{
    public function showLost($id)
    {
        $item = LostItem::with(['user', 'category'])->findOrFail($id);

        return view('items.detail', [
            'item' => $item,
            'type' => 'lost',
        ]);
    }

    public function showFound($id)
    {
        $item = FoundItem::with(['user', 'category'])->findOrFail($id);

        return view('items.detail', [
            'item' => $item,
            'type' => 'found',
        ]);
    }
}