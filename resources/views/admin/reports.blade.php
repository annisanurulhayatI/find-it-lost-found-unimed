<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Laporan | Find It</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7f9;
            color: #1e293b;
        }

        .navbar {
            background: white;
            padding: 18px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #0f766e;
            color: white;
            font-weight: bold;
        }

        .brand-name {
            font-weight: bold;
            font-size: 14px;
        }

        .brand-subtitle {
            margin-top: 4px;
            color: #64748b;
            font-size: 12px;
        }

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 24px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 8px;
        }

        .muted {
            color: #2b3a4e;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 8px;
            padding: 10px 14px;
            background: #0f766e;
            color: white;
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-danger {
            background: #dc2626;
        }

        .alert {
            background: #ccfbf1;
            color: #115e59;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .section {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 22px;
            margin-bottom: 24px;
        }

        .section h2 {
            font-size: 19px;
            margin-bottom: 18px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        th {
            background: #f8fafc;
            color: #64748b;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .empty {
            padding: 24px;
            text-align: center;
            color: #64748b;
        }

        .pagination {
            margin-top: 18px;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pagination nav > div:first-child,
        .pagination nav p {
            display: none !important;
        }

        .pagination nav svg {
            width: 14px;
            height: 14px;
        }

        .pagination nav a,
        .pagination nav span[aria-current="page"],
        .pagination nav span[aria-disabled="true"] {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 36px;
            height: 40px;
            padding: 8px;
            margin: 0 3px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            line-height: 1;
        }

        .pagination nav a {
            color: #0f766e;
            background: white;
        }

        .pagination nav span[aria-current="page"] {
            background: #0f766e;
            border-color: #0f766e;
            color: white;
        }

        .pagination nav span[aria-disabled="true"] {
            color: #94a3b8;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 16px 5%;
            }

            .brand-name {
                font-size: 12px;
            }

            .container {
                margin: 24px auto;
                padding: 0 14px;
            }

            .top {
                align-items: flex-start;
                flex-direction: column;
            }

            h1 {
                font-size: 23px;
            }

            .section {
                padding: 16px;
            }
        }
    </style>
</head>
<body>
    <header class="navbar">
        <a href="{{ route('admin.dashboard') }}" class="brand"
            style="text-decoration: none; color: inherit;">
            <div class="brand-logo">FI</div>
            <div>
                <div class="brand-name">UNIVERSITAS NEGERI MEDAN</div>
                <div class="brand-subtitle">Find It: Lost & Found</div>
            </div>
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn">Keluar</button>
        </form>
    </header>

    <main class="container">
        <div class="top">
            <div>
                <h1>Manajemen Laporan</h1>
                <p class="muted">Kelola laporan barang dari seluruh pengguna Find It.</p>
            </div>

            <a href="{{ route('admin.dashboard') }}" class="btn">Kembali ke Dashboard</a>
        </div>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.reports') }}" method="GET"
            style="display:flex; gap:10px; flex-wrap:wrap; margin:20px 0;">
            <input
                type="text"
                name="search"
                value="{{ $search }}"
                placeholder="Cari nama barang, lokasi, atau pelapor..."
                style="flex:1; min-width:220px; padding:10px; border:1px solid #cbd5e1; border-radius:8px;"
            >

            <button type="submit"
                style="padding:10px 16px; border:0; border-radius:8px; background:#0f766e; color:white; cursor:pointer;">
                Cari
            </button>

            <a href="{{ route('admin.reports') }}"
                style="padding:10px 16px; border-radius:8px; background:#e2e8f0; color:#1e293b; text-decoration:none;">
                Reset
            </a>
        </form>

        <section class="section">
            <h2>Barang Hilang</h2>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Pelapor</th>
                            <th>Lokasi</th>
                            <th>Tanggal Hilang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lostItems as $item)
                            <tr>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->user?->name ?? 'Pengguna tidak tersedia' }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->lost_date ? \Carbon\Carbon::parse($item->lost_date)->format('d-m-Y') : '-' }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('lost-items.show', $item->id) }}"
                                            class="btn">Detail</a>

                                        <form action="{{ route('admin.reports.destroy-lost', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty">Belum ada laporan barang hilang.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $lostItems->links() }}
            </div>
        </section>

        <section class="section">
            <h2>Barang Ditemukan</h2>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Pelapor</th>
                            <th>Lokasi</th>
                            <th>Tanggal Ditemukan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($foundItems as $item)
                            <tr>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->user?->name ?? 'Pengguna tidak tersedia' }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->found_date ? \Carbon\Carbon::parse($item->found_date)->format('d-m-Y') : '-' }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('found-items.show', $item->id) }}"
                                            class="btn">Detail</a>

                                        <form action="{{ route('admin.reports.destroy-found', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty">Belum ada laporan barang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $foundItems->links() }}
            </div>
        </section>
    </main>
</body>
</html>