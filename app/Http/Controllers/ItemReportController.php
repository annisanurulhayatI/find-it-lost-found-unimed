<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemReportController extends Controller
{
    public function createLost()
    {
        $categories = Category::orderBy('name')->get();

        return view('items.create-lost', compact('categories'));
    }

    public function storeLost(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'lost_date' => 'required|date|before_or_equal:today',
            'whatsapp' => 'required|string|max:20|regex:/^[0-9+\-\s]+$/',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('items', 'public');
        }

        $request->user()->lostItems()->create($validated);

        return redirect()->route('home')
            ->with('success', 'Laporan barang hilang berhasil dikirim.');
    }

    public function createFound()
    {
        $categories = Category::orderBy('name')->get();

        return view('items.create-found', compact('categories'));
    }

    public function storeFound(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'found_date' => 'required|date|before_or_equal:today',
            'whatsapp' => 'required|string|max:20|regex:/^[0-9+\-\s]+$/',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('items', 'public');
        }

        $request->user()->foundItems()->create($validated);

        return redirect()->route('home')
            ->with('success', 'Laporan barang ditemukan berhasil dikirim.');
    }

    
    public function editLost(Request $request, $id)
    {
        $item = $request->user()->lostItems()->findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('items.edit-lost', compact('item', 'categories'));
    }

    public function updateLost(Request $request, $id)
    {
        $item = $request->user()->lostItems()->findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'lost_date' => 'required|date|before_or_equal:today',
            'whatsapp' => 'required|string|max:20|regex:/^[0-9+\-\s]+$/',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $oldPhoto = $item->photo;
            $validated['photo'] = $request->file('photo')->store('items', 'public');
            $item->update($validated);

            if ($oldPhoto) {
                Storage::disk('public')->delete($oldPhoto);
            }
        } else {
            unset($validated['photo']);
            $item->update($validated);
        }

        return redirect()->route('lost-items.show', $item->id)
            ->with('success', 'Laporan barang hilang berhasil diperbarui.');
    }

    public function destroyLost(Request $request, $id)
    {
        $item = $request->user()->lostItems()->findOrFail($id);
        $photo = $item->photo;

        $item->delete();

        if ($photo) {
            Storage::disk('public')->delete($photo);
        }

        return redirect()->route('home')
            ->with('success', 'Laporan barang hilang berhasil dihapus.');
    }

    public function editFound(Request $request, $id)
    {
        $item = $request->user()->foundItems()->findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('items.edit-found', compact('item', 'categories'));
    }

    public function updateFound(Request $request, $id)
    {
        $item = $request->user()->foundItems()->findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'found_date' => 'required|date|before_or_equal:today',
            'whatsapp' => 'required|string|max:20|regex:/^[0-9+\-\s]+$/',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $oldPhoto = $item->photo;
            $validated['photo'] = $request->file('photo')->store('items', 'public');
            $item->update($validated);

            if ($oldPhoto) {
                Storage::disk('public')->delete($oldPhoto);
            }
        } else {
            unset($validated['photo']);
            $item->update($validated);
        }

        return redirect()->route('found-items.show', $item->id)
            ->with('success', 'Laporan barang ditemukan berhasil diperbarui.');
    }

    public function destroyFound(Request $request, $id)
    {
        $item = $request->user()->foundItems()->findOrFail($id);
        $photo = $item->photo;

        $item->delete();

        if ($photo) {
            Storage::disk('public')->delete($photo);
        }

        return redirect()->route('home')
            ->with('success', 'Laporan barang ditemukan berhasil dihapus.');
    }
}