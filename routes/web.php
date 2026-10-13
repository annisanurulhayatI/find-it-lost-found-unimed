<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemReportController;
use App\Models\Category;
use App\Models\LostItem;
use App\Models\FoundItem;
use App\Http\Controllers\ItemDetailController;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\MyReportController;
use App\Http\Controllers\DeleteAccountController;
use App\Http\Controllers\AdminController;


Route::get('/', function (Request $request) {
    $keyword = trim($request->query('q', ''));
    $type = $request->query('type', '');
    $categoryId = $request->query('category_id');

    $lostItems = collect();
    $foundItems = collect();

    if ($type === '' || $type === 'lost') {
        $lostItems = LostItem::with(['user', 'category'])
            ->when($keyword !== '', function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('item_name', 'like', "%{$keyword}%")
                        ->orWhere('location', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%");
                });
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->latest()
            ->get();
    }

    if ($type === '' || $type === 'found') {
        $foundItems = FoundItem::with(['user', 'category'])
            ->when($keyword !== '', function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('item_name', 'like', "%{$keyword}%")
                        ->orWhere('location', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%");
                });
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->latest()
            ->get();
    }

    $allItems = $lostItems->concat($foundItems)
        ->sortByDesc('created_at')
        ->values();

    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $perPage = 8;

    $items = new LengthAwarePaginator(
        $allItems->forPage($currentPage, $perPage)->values(),
        $allItems->count(),
        $perPage,
        $currentPage,
        [
            'path' => request()->url(),
            'query' => request()->query(),
        ]
    );

    $categories = Category::orderBy('name')->get();

    return view('welcome', compact('items', 'categories'));
})->name('home');


Route::get('/barang/hilang/{id}', [ItemDetailController::class, 'showLost'])
    ->name('lost-items.show');

Route::get('/barang/ditemukan/{id}', [ItemDetailController::class, 'showFound'])
    ->name('found-items.show');

Route::middleware('guest')->group(function () {
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/laporkan/barang-hilang', [ItemReportController::class, 'createLost'])
        ->name('lost-items.create');

    Route::post('/laporkan/barang-hilang', [ItemReportController::class, 'storeLost'])
        ->name('lost-items.store');

    Route::get('/laporkan/barang-ditemukan', [ItemReportController::class, 'createFound'])
        ->name('found-items.create');

    Route::post('/laporkan/barang-ditemukan', [ItemReportController::class, 'storeFound'])
        ->name('found-items.store');

    Route::get('/laporan/barang-hilang/{id}/edit', [ItemReportController::class, 'editLost'])
        ->name('lost-items.edit');

    Route::put('/laporan/barang-hilang/{id}', [ItemReportController::class, 'updateLost'])
        ->name('lost-items.update');

    Route::delete('/laporan/barang-hilang/{id}', [ItemReportController::class, 'destroyLost'])
        ->name('lost-items.destroy');

    Route::get('/laporan/barang-ditemukan/{id}/edit', [ItemReportController::class, 'editFound'])
        ->name('found-items.edit');

    Route::put('/laporan/barang-ditemukan/{id}', [ItemReportController::class, 'updateFound'])
        ->name('found-items.update');

    Route::delete('/laporan/barang-ditemukan/{id}', [ItemReportController::class, 'destroyFound'])
        ->name('found-items.destroy');

    Route::get('/laporanmu', [MyReportController::class, 'index'])
        ->name('my-reports.index');

    Route::delete('/akun', [DeleteAccountController::class, 'destroy'])
        ->name('account.destroy');
    
Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');
        
    Route::get('/admin/laporan', [AdminController::class, 'reports'])
        ->name('admin.reports');

    Route::delete('/admin/laporan/barang-hilang/{id}', [AdminController::class, 'destroyLost'])
        ->name('admin.reports.destroy-lost');

    Route::delete('/admin/laporan/barang-ditemukan/{id}', [AdminController::class, 'destroyFound'])
        ->name('admin.reports.destroy-found');

    Route::get('/admin/pengguna', [AdminController::class, 'users'])
        ->name('admin.users');

    Route::put('/admin/pengguna/{id}/role', [AdminController::class, 'updateUserRole'])
        ->name('admin.users.update-role');

    Route::delete('/admin/pengguna/{id}', [AdminController::class, 'destroyUser'])
        ->name('admin.users.destroy');
    });
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

