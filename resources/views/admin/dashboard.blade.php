<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Find It</title>

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
            background: #0f766e;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-weight: bold;
        }

        .brand-name {
            font-weight: bold;
            font-size: 14px;
        }

        .brand-subtitle {
            color: #64748b;
            font-size: 12px;
            margin-top: 4px;
        }

        .navbar a {
            color: #475569;
            text-decoration: none;
            font-size: 14px;
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            background: #0f766e;
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 24px;
        }

        .page-heading {
            margin-bottom: 28px;
        }

        .page-heading h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: #64748b;
            font-size: 14px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .stat-card p {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .stat-card h2 {
            font-size: 30px;
            color: #0f766e;
        }

        .section {
            background: white;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            margin-bottom: 24px;
        }

        .section h2 {
            font-size: 18px;
            margin-bottom: 20px;
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
        }

        th {
            color: #64748b;
            background: #f8fafc;
            font-weight: 600;
        }

        td {
            color: #334155;
        }

        .empty {
            color: #64748b;
            text-align: center;
            padding: 24px;
        }

        .status {
            display: inline-block;
            padding: 5px 9px;
            background: #ccfbf1;
            color: #115e59;
            border-radius: 20px;
            font-size: 12px;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pagination nav div:first-child {
            display: none;
        }

        .pagination nav a,
        .pagination nav span {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 34px;
            min-height: 34px;
            padding: 6px 10px;
            border-radius: 7px;
            font-size: 13px;
            line-height: 1;
            text-decoration: none;
        }

        .pagination nav svg {
            width: 14px;
            height: 14px;
        }

        .pagination nav a {
            color: #0f766e;
        }

        .pagination nav span[aria-current="page"] {
            background: #0f766e;
            color: white;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 16px 5%;
            }

            .brand-name {
                font-size: 12px;
            }

            .container {
                margin: 25px auto;
                padding: 0 16px;
            }

            .page-heading h1 {
                font-size: 24px;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .stat-card {
                padding: 20px;
            }

            .section {
                padding: 18px;
            }
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="brand">
            <div class="brand-logo">FI</div>
            <div>
                <div class="brand-name">UNIVERSITAS NEGERI MEDAN</div>
                <div class="brand-subtitle">Find It: Lost & Found</div>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn">Keluar</button>
        </form>
    </header>

    <main class="container">
        <div class="page-heading">
            <h1>Dashboard Admin</h1>
            <p>Selamat datang, {{ Auth::user()->name }}. Kelola aktivitas Find It dari sini.</p>
        </div>

        <a href="{{ route('admin.reports') }}"
            style="display:inline-block; margin-top:16px; padding:10px 16px; background:#0f766e; color:white; text-decoration:none; border-radius:8px;">
            Manajemen Laporan
        </a>

        <a href="{{ route('admin.users') }}"
            style="display:inline-block; margin-top:16px; margin-right:8px; padding:10px 16px; background:#4338ca; color:white; text-decoration:none; border-radius:8px;">
            Manajemen Pengguna
        </a>

        <div class="stats">
            <div class="stat-card">
                <p>Total Pengguna</p>
                <h2>{{ $totalUsers }}</h2>
            </div>

            <div class="stat-card">
                <p>Barang Hilang</p>
                <h2>{{ $totalLostItems }}</h2>
            </div>

            <div class="stat-card">
                <p>Barang Ditemukan</p>
                <h2>{{ $totalFoundItems }}</h2>
            </div>
        </div>

        <section class="section">
            <h2>Laporan Barang Hilang Terbaru</h2>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Pelapor</th>
                            <th>Lokasi</th>
                            <th>Tanggal Hilang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($latestLostItems as $item)
                            <tr>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->user?->name ?? 'Pengguna tidak tersedia' }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->lost_date ? \Carbon\Carbon::parse($item->lost_date)->format('d-m-Y') : '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty">Belum ada laporan barang hilang.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                    <div class="pagination">
                        {{ $latestLostItems->links() }}
                    </div>
            </div>
        </section>

        <section class="section">
            <h2>Laporan Barang Ditemukan Terbaru</h2>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Pelapor</th>
                            <th>Lokasi</th>
                            <th>Tanggal Ditemukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($latestFoundItems as $item)
                            <tr>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->user?->name ?? 'Pengguna tidak tersedia' }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->found_date ? \Carbon\Carbon::parse($item->found_date)->format('d-m-Y') : '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty">Belum ada laporan barang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                    <div class="pagination">
                        {{ $latestFoundItems->links() }}
                    </div>
            </div>
        </section>
    </main>
</body>
</html>