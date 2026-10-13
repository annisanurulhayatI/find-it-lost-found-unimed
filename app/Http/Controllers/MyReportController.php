<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Http\Request;

class MyReportController extends Controller
{
    public function index(Request $request)
    {
        $lostItems = LostItem::where('user_id', $request->user()->id)
            ->latest()
            ->get();

        $foundItems = FoundItem::where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return view('items.my-reports', compact(
            'lostItems',
            'foundItems'
        ));
    }
}