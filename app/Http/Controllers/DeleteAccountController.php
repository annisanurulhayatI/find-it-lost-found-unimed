<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteAccountController extends Controller
{
    public function destroy(Request $request)
    {
        $user = $request->user();

        $lostItems = $user->lostItems()->get();
        $foundItems = $user->foundItems()->get();

        $photos = collect();

        foreach ($lostItems->concat($foundItems) as $item) {
            foreach (['image', 'photo', 'foto', 'gambar', 'image_path', 'foto_barang'] as $field) {
                $path = $item->getAttribute($field);

                if (is_string($path) && $path !== '') {
                    $photos->push($path);
                }
            }
        }

        DB::transaction(function () use ($user, $lostItems, $foundItems) {
            $lostItems->each->delete();
            $foundItems->each->delete();

            $user->delete();
        });

        foreach ($photos->unique() as $photo) {
            Storage::disk('public')->delete($photo);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'Akun berhasil dihapus secara permanen.');
    }
}