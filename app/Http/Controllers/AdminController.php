<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    
    public function index()
    {
        $totalUsers = User::count();
        $totalLostItems = LostItem::count();
        $totalFoundItems = FoundItem::count();

        $latestLostItems = LostItem::with('user')
            ->latest()
            ->paginate(5, ['*'], 'lost_dashboard_page');

        $latestFoundItems = FoundItem::with('user')
            ->latest()
            ->paginate(5, ['*'], 'found_dashboard_page');

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalLostItems',
            'totalFoundItems',
            'latestLostItems',
            'latestFoundItems'
        ));
    }
    
    public function reports(\Illuminate\Http\Request $request)
    {
        $search = trim($request->input('search', ''));

        $lostQuery = LostItem::with('user')->latest();
        $foundQuery = FoundItem::with('user')->latest();

        if ($search !== '') {
            $lostQuery->where(function ($query) use ($search) {
                $query->where('item_name', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });

            $foundQuery->where(function ($query) use ($search) {
                $query->where('item_name', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        $lostItems = $lostQuery
            ->paginate(10, ['*'], 'lost_page')
            ->withQueryString();

        $foundItems = $foundQuery
            ->paginate(10, ['*'], 'found_page')
            ->withQueryString();

        return view('admin.reports', compact(
            'lostItems',
            'foundItems',
            'search'
        ));
    }

    public function destroyLost($id)
    {
        $item = \App\Models\LostItem::findOrFail($id);

        if ($item->photo) {
            \Illuminate\Support\Facades\Storage::disk('public')
                ->delete($item->photo);
        }

        $item->delete();

        return redirect()
            ->route('admin.reports')
            ->with('success', 'Laporan barang hilang berhasil dihapus.');
    }

    public function destroyFound($id)
    {
        $item = \App\Models\FoundItem::findOrFail($id);

        if ($item->photo) {
            \Illuminate\Support\Facades\Storage::disk('public')
                ->delete($item->photo);
        }

        $item->delete();

        return redirect()
            ->route('admin.reports')
            ->with('success', 'Laporan barang ditemukan berhasil dihapus.');
    }

    
    public function users(\Illuminate\Http\Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.users', compact('users'));
    }


    public function updateUserRole(\Illuminate\Http\Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        $user = User::findOrFail($id);

        if ($user->id === $request->user()->id) {
            return back()->with(
                'error',
                'Kamu tidak dapat mengubah role akun sendiri.'
            );
        }

        if ($user->role === 'admin' && $request->role === 'user') {
            $totalAdmins = User::where('role', 'admin')->count();

            if ($totalAdmins <= 1) {
                return back()->with(
                    'error',
                    'Role admin terakhir tidak dapat diubah.'
                );
            }
        }

        $user->role = $request->role;
        $user->save();

        return back()->with(
            'success',
            'Role pengguna berhasil diperbarui.'
        );
    }

    public function destroyUser(\Illuminate\Http\Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->id === $request->user()->id) {
            return back()->with(
                'error',
                'Kamu tidak dapat menghapus akun sendiri.'
            );
        }

        if ($user->role === 'admin') {
            $totalAdmins = User::where('role', 'admin')->count();

            if ($totalAdmins <= 1) {
                return back()->with(
                    'error',
                    'Admin terakhir tidak dapat dihapus.'
                );
            }
        }

        $lostItems = $user->lostItems()->get();
        $foundItems = $user->foundItems()->get();

        \Illuminate\Support\Facades\DB::transaction(function () use ($user, $lostItems, $foundItems) {
            foreach ($lostItems as $item) {
                $item->delete();
            }

            foreach ($foundItems as $item) {
                $item->delete();
            }

            $user->delete();
        });

        foreach ($lostItems as $item) {
            if ($item->photo) {
                \Illuminate\Support\Facades\Storage::disk('public')
                    ->delete($item->photo);
            }
        }

        foreach ($foundItems as $item) {
            if ($item->photo) {
                \Illuminate\Support\Facades\Storage::disk('public')
                    ->delete($item->photo);
            }
        }

        return redirect()
            ->route('admin.users')
            ->with('success', 'Akun dan seluruh laporan pengguna berhasil dihapus.');
    }
}