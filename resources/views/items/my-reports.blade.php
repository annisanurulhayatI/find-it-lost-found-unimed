<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporanmu | Find It UNIMED</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --green: #285943;
            --green-dark: #1d4030;
            --green-light: #e6eee4;
            --cream: #f7f1e5;
            --caramel: #d8a86e;
            --text: #303b32;
            --muted: #777d73;
            --white: #ffffff;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--cream);
            color: var(--text);
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
            cursor: pointer;
        }

        .navbar {
            background: var(--white);
            border-bottom: 1px solid #e9e5da;
        }

        .nav-container {
            max-width: 1180px;
            margin: auto;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            background: var(--green);
            color: var(--cream);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .brand-name {
            color: var(--green);
            font-size: 13px;
            font-weight: bold;
        }

        .brand-subtitle {
            color: var(--muted);
            font-size: 12px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            font-size: 14px;
        }

        .nav-links a:hover {
            color: var(--green);
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border: 1px solid transparent;
            border-radius: 9px;
            padding: 10px 15px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-primary {
            background: var(--green);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--green-dark);
        }

        .btn-outline {
            border-color: var(--green);
            color: var(--green);
            background: transparent;
        }

        .btn-edit {
            background: #e6eee4;
            color: var(--green);
        }

        .btn-delete {
            background: #fff0ed;
            color: #a33e35;
        }

        .page-header {
            max-width: 1180px;
            margin: 38px auto 28px;
            padding: 0 24px;
        }

        .page-header h1 {
            color: var(--green);
            font-size: clamp(28px, 4vw, 36px);
            margin-bottom: 8px;
        }

        .page-header p {
            color: var(--muted);
            font-size: 15px;
        }

        .report-section {
            max-width: 1180px;
            margin: auto;
            padding: 0 24px 60px;
        }

        .report-count {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 18px;
        }

        .tabs {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 24px;
            border-bottom: 1px solid #e2dacb;
        }

        .tab {
            padding: 13px 18px;
            color: var(--muted);
            font-weight: bold;
            font-size: 14px;
            border: none;
            border-bottom: 3px solid transparent;
            background: transparent;
            margin-bottom: -1px;
        }

        .tab.active {
            color: var(--green);
            border-bottom-color: var(--green);
        }

        .items-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .items-grid[hidden] {
            display: none !important;
        }

        .item-card {
            display: flex;
            flex-direction: column;
            min-width: 0;
            overflow: hidden;
            background: #fffdf8;
            border: 1px solid #e6e0d3;
            border-radius: 18px;
            box-shadow: 0 5px 18px rgba(40, 89, 67, 0.06);
        }

        .item-image {
            position: relative;
            width: 100%;
            height: 160px;
            overflow: hidden;
            background: #eee9dc;
        }

        .item-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-photo {
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            font-size: 13px;
        }

        .no-photo span {
            font-size: 32px;
        }

        .item-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .badge-lost {
            background: #fff0d9;
            color: #8b4c24;
        }

        .badge-found {
            background: #e3f0e5;
            color: #245c43;
        }

        .item-content {
            padding: 15px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .item-category {
            color: #8a7658;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .item-content h2 {
            color: var(--green);
            font-size: 17px;
            line-height: 1.4;
            margin: 7px 0;
            overflow-wrap: anywhere;
        }

        .item-description {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 12px;
            overflow-wrap: anywhere;
        }

        .item-detail {
            color: #5f6d62;
            font-size: 12px;
            margin-top: 6px;
            overflow-wrap: anywhere;
        }

        .item-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
            margin-top: auto;
            padding-top: 16px;
        }

        .item-actions .btn {
            padding: 9px 10px;
            font-size: 12px;
        }

        .delete-form {
            display: inline-flex;
        }

        .empty-state {
            background: rgba(255, 255, 255, 0.7);
            border: 1px dashed #c9d4c6;
            border-radius: 16px;
            padding: 45px 24px;
            text-align: center;
        }

        .empty-icon {
            font-size: 38px;
            margin-bottom: 12px;
        }

        .empty-state h2 {
            color: var(--green);
            font-size: 20px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 18px;
        }

        .flash-message {
            max-width: 1132px;
            margin: 20px auto 0;
            padding: 12px 16px;
            background: var(--green-light);
            color: var(--green);
            border-radius: 9px;
        }

        footer {
            background: var(--green-dark);
            color: #e0e8df;
            padding: 26px 24px;
        }

        .footer-container {
            max-width: 1132px;
            margin: auto;
            font-size: 13px;
        }

        .footer-container strong {
            color: var(--cream);
        }

        .account-danger {
            margin-top: 32px;
            padding: 24px;
            border: 1px solid #e8b8ac;
            border-radius: 16px;
            background: #fff8f5;
        }

        .account-danger h3 {
            margin-bottom: 10px;
            color: #a13f30;
        }

        .account-danger p {
            margin-bottom: 18px;
            color: #746b64;
            font-size: 14px;
            line-height: 1.7;
        }

        .delete-account-btn {
            padding: 12px 18px;
            border: none;
            border-radius: 9px;
            background: #b44738;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .delete-account-btn:hover {
            background: #923629;
        }

        .menu-toggle {
            display: none;
            width: 42px;
            height: 42px;
            padding: 9px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .menu-toggle span {
            display: block;
            width: 21px;
            height: 2px;
            border-radius: 2px;
            background: #0f766e;
            transition: 0.2s ease;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        .nav-user {
            overflow-wrap: anywhere;
        }

        @media (max-width: 768px) {
            .navbar .nav-container {
                position: relative;
                flex-wrap: wrap;
                gap: 12px;
            }

            .navbar .brand {
                flex: 1;
                min-width: 0;
            }

            .menu-toggle {
                display: flex;
                flex-shrink: 0;
            }

            .navbar .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                align-items: stretch;
                gap: 6px;
                padding: 14px;
                margin-top: 4px;
                background: white;
                border: 1px solid #e2e8f0;
                border-radius: 14px;
                box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
            }

            .navbar .nav-links.show {
                display: flex;
            }

            .navbar .nav-links > a:not(.btn) {
                display: block;
                padding: 10px 12px;
                border-radius: 8px;
            }

            .navbar .nav-links > a:not(.btn):hover {
                background: #f0fdfa;
            }

            .navbar .nav-links .nav-user {
                padding: 10px 12px;
            }

            .navbar .nav-links form {
                width: 100%;
                margin: 0;
            }

            .navbar .nav-links form button {
                width: 100%;
            }

            .navbar .nav-links > .btn {
                width: 100%;
                text-align: center;
                justify-content: center;
            }
        }

        @media (max-width: 900px) {
            .items-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .nav-container {
                padding: 14px 18px;
                flex-wrap: wrap;
            }

            .nav-links {
                width: 100%;
                gap: 13px;
            }

            .page-header {
                margin-top: 28px;
                padding: 0 16px;
            }

            .report-section {
                padding: 0 16px 40px;
            }

            .items-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .item-image {
                height: 220px;
            }

            .tab {
                padding: 12px 10px;
                font-size: 13px;
            }

            .flash-message {
                margin-left: 16px;
                margin-right: 16px;
            }
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="brand">
                <div class="brand-logo">FI</div>
                <div>
                    <div class="brand-name">UNIVERSITAS NEGERI MEDAN</div>
                    <div class="brand-subtitle">Find It: Lost & Found</div>
                </div>
            </a>

            <button type="button" class="menu-toggle" id="menu-toggle"
                aria-label="Buka menu navigasi"
                aria-expanded="false"
                aria-controls="nav-links">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav class="nav-links" id="nav-links">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('my-reports.index') }}">Laporanmu</a>
                <a href="{{ route('lost-items.create') }}">Laporkan Barang Hilang</a>
                <a href="{{ route('found-items.create') }}">Laporkan Barang Ditemukan</a>

                <span class="nav-user">Halo, {{ Auth::user()->name }}</span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Keluar</button>
                </form>
            </nav>
        </div>
    </header>
    @if (session('success'))
        <div class="flash-message">{{ session('success') }}</div>
    @endif

    <main>  
        <section class="account-danger">
            <h3>Pengaturan Akun</h3>
            <p>
                Jika kamu tidak ingin menggunakan Find It lagi,
                kamu bisa menghapus akun beserta semua laporanmu.
            </p>

            <form
                action="{{ route('account.destroy') }}"
                method="POST"
                onsubmit="return confirm('Apakah kamu yakin ingin menghapus akun secara permanen? Semua laporan dan foto terkait akan dihapus. Tindakan ini tidak dapat dibatalkan.');"
            >
                @csrf
                @method('DELETE')

                <button type="submit" class="delete-account-btn">
                    Hapus Akun Saya
                </button>
            </form>
        </section>

        <section class="page-header">
            <h1>Laporanmu</h1>
            <p>Lihat dan kelola laporan barang hilang maupun barang ditemukan yang kamu buat.</p>
        </section>

        <section class="report-section">
            <p class="report-count">
                Total {{ $lostItems->count() + $foundItems->count() }} laporan milikmu
            </p>

            <div class="tabs">
                <button type="button" class="tab active" data-tab="lost">
                    Barang Hilang ({{ $lostItems->count() }})
                </button>
                <button type="button" class="tab" data-tab="found">
                    Barang Ditemukan ({{ $foundItems->count() }})
                </button>
            </div>

            <div class="items-grid" id="lost-panel">
                @forelse ($lostItems as $item)
                    <article class="item-card">
                        <div class="item-image">
                            @if ($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->item_name }}">
                            @else
                                <div class="no-photo">
                                    <span>＋</span>
                                    Foto tidak tersedia
                                </div>
                            @endif

                            <span class="item-badge badge-lost">Barang Hilang</span>
                        </div>

                        <div class="item-content">
                            <span class="item-category">{{ $item->category->name ?? 'Lainnya' }}</span>
                            <h2>{{ $item->item_name }}</h2>
                            <p class="item-description">{{ $item->description }}</p>
                            <p class="item-detail">Lokasi: {{ $item->location }}</p>
                            <p class="item-detail">
                                Tanggal hilang: {{ $item->lost_date?->format('d M Y') }}
                            </p>

                            <div class="item-actions">
                                <a href="{{ route('lost-items.show', $item->id) }}" class="btn btn-primary">Detail</a>
                                <a href="{{ route('lost-items.edit', $item->id) }}" class="btn btn-edit">Edit</a>

                                <form action="{{ route('lost-items.destroy', $item->id) }}" method="POST" class="delete-form" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">⌕</div>
                        <h2>Belum Ada Laporan Barang Hilang</h2>
                        <p>Laporan barang hilang yang kamu buat akan tampil di sini.</p>
                        <a href="{{ route('lost-items.create') }}" class="btn btn-primary">Buat Laporan</a>
                    </div>
                @endforelse
            </div>

            <div class="items-grid" id="found-panel" hidden>
                @forelse ($foundItems as $item)
                    <article class="item-card">
                        <div class="item-image">
                            @if ($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->item_name }}">
                            @else
                                <div class="no-photo">
                                    <span>＋</span>
                                    Foto tidak tersedia
                                </div>
                            @endif

                            <span class="item-badge badge-found">Barang Ditemukan</span>
                        </div>

                        <div class="item-content">
                            <span class="item-category">{{ $item->category->name ?? 'Lainnya' }}</span>
                            <h2>{{ $item->item_name }}</h2>
                            <p class="item-description">{{ $item->description }}</p>
                            <p class="item-detail">Lokasi: {{ $item->location }}</p>
                            <p class="item-detail">
                                Tanggal ditemukan: {{ $item->found_date?->format('d M Y') }}
                            </p>

                            <div class="item-actions">
                                <a href="{{ route('found-items.show', $item->id) }}" class="btn btn-primary">Detail</a>
                                <a href="{{ route('found-items.edit', $item->id) }}" class="btn btn-edit">Edit</a>

                                <form action="{{ route('found-items.destroy', $item->id) }}" method="POST" class="delete-form" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">＋</div>
                        <h2>Belum Ada Laporan Barang Ditemukan</h2>
                        <p>Laporan barang yang kamu temukan akan tampil di sini.</p>
                        <a href="{{ route('found-items.create') }}" class="btn btn-primary">Buat Laporan</a>
                    </div>
                @endforelse
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-container">
            <strong>Find It: Lost & Found</strong><br>
            Universitas Negeri Medan — Platform informasi barang hilang dan ditemukan di lingkungan UNIMED.
        </div>
    </footer>

    <script>
        const tabs = document.querySelectorAll('.tab');
        const lostPanel = document.getElementById('lost-panel');
        const foundPanel = document.getElementById('found-panel');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(item => item.classList.remove('active'));
                tab.classList.add('active');

                if (tab.dataset.tab === 'lost') {
                    lostPanel.hidden = false;
                    foundPanel.hidden = true;
                } else {
                    lostPanel.hidden = true;
                    foundPanel.hidden = false;
                }
            });
        });
    </script>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const navLinks = document.getElementById('nav-links');

        menuToggle.addEventListener('click', function () {
            const isOpen = navLinks.classList.toggle('show');

            menuToggle.classList.toggle('active', isOpen);
            menuToggle.setAttribute('aria-expanded', isOpen);
        });

        navLinks.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                navLinks.classList.remove('show');
                menuToggle.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    </script>
</body>
</html>