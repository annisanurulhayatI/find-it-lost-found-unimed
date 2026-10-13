<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find It: Lost & Found | UNIMED</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=2">
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
            --cream-dark: #eee5d4;
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

        button, input {
            font: inherit;
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
            letter-spacing: 0.5px;
        }

        .brand-subtitle {
            color: var(--muted);
            font-size: 12px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 22px;
            font-size: 14px;
        }

        .nav-links a:not(.btn):hover {
            color: var(--green);
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            border-radius: 9px;
            padding: 11px 19px;
            border: 1px solid transparent;
            cursor: pointer;
            font-size: 14px;
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

        .btn-outline:hover {
            background: var(--green-light);
        }

        .hero {
            max-width: 1180px;
            margin: 38px auto 0;
            padding: 0 24px;
        }

        .hero-box {
            position: relative;
            overflow: hidden;
            background: var(--green);
            border-radius: 24px;
            padding: 64px 58px;
            color: var(--white);
        }

        .hero-box::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            right: -70px;
            top: -95px;
            box-shadow: 0 0 0 35px rgba(255, 255, 255, 0.04),
                        0 0 0 70px rgba(255, 255, 255, 0.03);
        }

        .hero-content {
            max-width: 680px;
            position: relative;
            z-index: 1;
        }

        .hero-label {
            display: inline-block;
            padding: 7px 13px;
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            color: var(--cream);
            font-size: 12px;
            letter-spacing: 0.5px;
        }

        .hero h1 {
            font-size: clamp(34px, 5vw, 54px);
            line-height: 1.15;
            margin-bottom: 18px;
            max-width: 650px;
        }

        .hero h1 span {
            color: #e5c99e;
        }

        .hero p {
            max-width: 570px;
            color: #e0e8df;
            font-size: 16px;
            margin-bottom: 28px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-cream {
            background: var(--cream);
            color: var(--green);
        }

        .btn-cream:hover {
            background: var(--cream-dark);
        }

        .btn-transparent {
            border-color: rgba(255, 255, 255, 0.6);
            color: var(--white);
        }

        .btn-transparent:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .search-section {
            max-width: 1000px;
            margin: -28px auto 0;
            padding: 0 24px;
            position: relative;
            z-index: 2;
        }

        .search-box {
            padding: 24px;
            background: var(--white);
            border: 1px solid #ebe5d8;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(40, 89, 67, 0.08);
        }

        .search-box label {
            display: block;
            color: var(--green);
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .search-form {
            display: grid;
            grid-template-columns: minmax(220px, 2fr) minmax(150px, 1fr) minmax(170px, 1fr) auto;
            gap: 12px;
            align-items: center;
        }

        .search-input,
        .search-select {
            width: 100%;
            min-width: 0;
            padding: 13px 15px;
            border: 1px solid #dddcd2;
            border-radius: 9px;
            outline: none;
            background: #fdfcf9;
            color: var(--text);
        }

        .search-input:focus,
        .search-select:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(40, 89, 67, 0.1);
        }

        .section {
            max-width: 1180px;
            margin: 68px auto 0;
            padding: 0 24px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 24px;
        }

        .section-heading h2 {
            color: var(--green);
            font-size: 27px;
            line-height: 1.3;
            margin-bottom: 7px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 14px;
        }

        .text-link {
            color: var(--green);
            font-size: 14px;
            font-weight: bold;
            white-space: nowrap;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .feature-card {
            background: var(--white);
            padding: 26px;
            border: 1px solid #ebe5d8;
            border-radius: 16px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(40, 89, 67, 0.07);
        }

        .feature-icon {
            width: 49px;
            height: 49px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: var(--green-light);
            color: var(--green);
            font-size: 23px;
            margin-bottom: 18px;
        }

        .feature-card h3 {
            color: var(--green);
            font-size: 18px;
            margin-bottom: 8px;
        }

        .feature-card p {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 17px;
        }

        .feature-card a {
            color: var(--green);
            font-size: 14px;
            font-weight: bold;
        }

        .recent-section {
            margin-top: 68px;
        }

        .empty-state {
            background: rgba(255, 255, 255, 0.7);
            border: 1px dashed #c9d4c6;
            border-radius: 16px;
            padding: 42px 24px;
            text-align: center;
        }

        .empty-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: var(--green-light);
            font-size: 27px;
        }

        .empty-state h3 {
            color: var(--green);
            margin-bottom: 7px;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 14px;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .step-card {
            padding: 23px;
            border-left: 3px solid var(--caramel);
            background: rgba(255, 255, 255, 0.55);
            border-radius: 0 12px 12px 0;
        }

        .step-number {
            color: var(--green);
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .step-card h3 {
            color: var(--green);
            font-size: 16px;
            margin-bottom: 7px;
        }

        .step-card p {
            color: var(--muted);
            font-size: 14px;
        }

        .bottom-cta {
            max-width: 1180px;
            margin: 68px auto;
            padding: 0 24px;
        }

        .cta-box {
            background: var(--cream-dark);
            border: 1px solid #e4d8c3;
            border-radius: 18px;
            padding: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
        }

        .cta-box h2 {
            color: var(--green);
            font-size: 24px;
            margin-bottom: 7px;
        }

        .cta-box p {
            color: var(--muted);
            font-size: 14px;
        }

        footer {
            background: var(--green-dark);
            color: #e0e8df;
            padding: 26px 24px;
        }

        .footer-container {
            max-width: 1180px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            font-size: 13px;
        }

        .footer-container strong {
            color: var(--cream);
        }

        @media (max-width: 850px) {
            .nav-container {
                flex-wrap: wrap;
            }

            .nav-links {
                flex-wrap: wrap;
                gap: 14px;
            }

            .hero-box {
                padding: 48px 32px;
            }

            .feature-grid,
            .steps-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 580px) {
            .nav-container {
                padding: 14px 18px;
            }

            .nav-links {
                width: 100%;
                font-size: 13px;
            }

            .nav-links .btn {
                padding: 9px 12px;
            }

            .hero {
                margin-top: 22px;
                padding: 0 16px;
            }

            .hero-box {
                padding: 36px 23px;
                border-radius: 18px;
            }

            .hero p {
                font-size: 14px;
            }

            .search-section {
                padding: 0 16px;
                margin-top: -18px;
            }

            .search-box {
                padding: 18px;
            }

            .search-form {
                grid-template-columns: 1fr;
            }

            .section {
                margin-top: 48px;
                padding: 0 16px;
            }

            .section-heading {
                align-items: start;
                flex-direction: column;
                gap: 10px;
            }

            .section-heading h2 {
                font-size: 23px;
            }

            .feature-grid,
            .steps-grid {
                grid-template-columns: 1fr;
            }

            .feature-card {
                padding: 22px;
            }

            .bottom-cta {
                margin: 48px auto;
                padding: 0 16px;
            }

            .cta-box {
                padding: 25px;
                align-items: start;
                flex-direction: column;
            }

            .cta-box h2 {
                font-size: 21px;
            }

            .footer-container {
                align-items: start;
                flex-direction: column;
            }

        }

        .items-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            width: 100%;
            max-width: 100%;
            min-width: 0;
            align-items: stretch;
        }

        .item-card {
            display: flex;
            flex-direction: column;
            min-width: 0;
            max-width: 100%;
            overflow: hidden;
            background: #fffdf8;
            border: 1px solid #e6e0d3;
            border-radius: 18px;
            box-shadow: 0 5px 18px rgba(40, 89, 67, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .item-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 26px rgba(40, 89, 67, 0.12);
        }

        .item-image {
            position: relative;
            width: 100%;
            height: 160px;
            flex-shrink: 0;
            overflow: hidden;
            background: #eee9dc;
        }

        .item-image img {
            display: block;
            width: 100%;
            height: 100%;
            max-width: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .item-card:hover .item-image img {
            transform: scale(1.04);
        }

        .no-photo {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #718074;
        }

        .no-photo span {
            font-size: 34px;
        }

        .no-photo p {
            margin: 4px 0;
            font-size: 13px;
        }

        .item-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-lost {
            color: #8b4c24;
            background: #fff0d9;
        }

        .badge-found {
            color: #245c43;
            background: #e3f0e5;
        }

        .item-content {
            min-width: 0;
            padding: 14px;
        }

        .item-category {
            color: #8a7658;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .item-content h3 {
            margin: 8px 0 10px;
            color: var(--green);
            font-size: 17px;
            line-height: 1.35;
            overflow-wrap: anywhere;
        }

        .item-description {
            display: -webkit-box;
            min-height: 42px;
            margin: 0 0 16px;
            overflow: hidden;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.5;
            overflow-wrap: anywhere;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .item-detail {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            margin-top: 10px;
            color: #5f6d62;
        }

        .item-detail span {
            flex-shrink: 0;
            color: #b17b43;
            font-size: 18px;
        }

        .item-detail p {
            min-width: 0;
            margin: 2px 0 0;
            font-size: 13px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .pagination {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 14px;
            margin-top: 28px;
        }

        .pagination-info {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            text-align: center;
        }

        .pagination-links {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 36px;
            padding: 0 12px;
            border: 1px solid #e1e8df;
            border-radius: 9px;
            background: #fffdf8;
            color: var(--green);
            font-size: 13px;
            text-decoration: none;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .page-link:hover:not(.disabled, .active) {
            background: #edf4ec;
        }

        .page-link.active {
            border-color: var(--green);
            background: var(--green);
            color: #fff;
        }

        .page-link.disabled {
            color: #a4aaa3;
            cursor: not-allowed;
            background: #f5f5f0;
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
            .items-grid {
                grid-template-columns: minmax(0, 1fr);
                gap: 18px;
            }

            .item-image {
                height: 220px;
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
                <a href="#fitur">Informasi</a>
                <a href="#barang-terbaru">Barang Terbaru</a>

                @auth
                    <a href="{{ route('my-reports.index') }}">Laporanmu</a>
                    <span class="nav-user">Halo, {{ Auth::user()->name }}</span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                @endauth
            </nav>
        </div>
    </header>
    <main>
        <section class="hero">
            <div class="hero-box">
                <div class="hero-content">
                    <div class="hero-label">PLATFORM BARANG HILANG & DITEMUKAN</div>
                    <h1>Find It <span>: Lost & Found</span></h1>
                    <p>
                        Temukan informasi barang hilang dan ditemukan pada lingkungan
                        Universitas Negeri Medan. Satu informasi kecil bisa membantu
                        barang kembali kepada pemiliknya.
                    </p>

                    <div class="hero-actions">
                        <a href="#barang-terbaru" class="btn btn-cream">Cari Barang</a>

                        @auth
                            <a href="{{ route('lost-items.create') }}" class="btn btn-transparent">
                                Lapor Barang Hilang
                            </a>
                            <a href="{{ route('found-items.create') }}" class="btn btn-transparent">
                                Lapor Barang Ditemukan
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-transparent">
                                Laporkan Barang
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>

        <section class="search-section">
            <div class="search-box">
                <label for="search">Cari barang berdasarkan nama atau lokasi</label>
                <form action="{{ route('home') }}#barang-terbaru" method="GET" class="search-form" id="search-form">
                    <input
                        type="search"
                        name="q"
                        id="search"
                        class="search-input"
                        value="{{ request('q') }}"
                        placeholder="Cari nama barang atau lokasi..."
                    >

                    <select name="type" class="search-select" aria-label="Jenis laporan">
                        <option value="">Semua laporan</option>
                        <option value="lost" @selected(request('type') === 'lost')>Barang hilang</option>
                        <option value="found" @selected(request('type') === 'found')>Barang ditemukan</option>
                    </select>

                    <select name="category_id" class="search-select" aria-label="Kategori barang">
                        <option value="">Semua kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected((string) request('category_id') === (string) $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                @if (request()->filled('q') || request()->filled('type') || request()->filled('category_id'))
                    <p style="margin-top: 12px; font-size: 13px; color: var(--muted);">
                        Filter sedang digunakan.
                        <a href="{{ route('home') }}#barang-terbaru" style="color: var(--green); font-weight: bold;">Hapus filter</a>
                    </p>
                @endif
            </div>
        </section>

        <section class="section" id="fitur">
            <div class="section-heading">
                <div>
                    <h2>Apa yang ingin kamu lakukan?</h2>
                    <p>Pilih layanan yang sesuai dengan kebutuhanmu.</p>
                </div>
            </div>

            <div class="feature-grid">
                <article class="feature-card">
                    <div class="feature-icon">⌕</div>
                    <h3>Mencari Barang</h3>
                    <p>Lihat informasi barang yang ditemukan di lingkungan kampus UNIMED.</p>
                    <a href="#barang-terbaru">Lihat informasi &rarr;</a>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">＋</div>
                    <h3>Melaporkan Barang</h3>
                    <p>Pilih jenis laporan sesuai barang yang hilang atau barang yang kamu temukan di kampus.</p>
                    @auth
                        <a href="{{ route('lost-items.create') }}">Laporkan barang hilang &rarr;</a>
                        <br><br>
                        <a href="{{ route('found-items.create') }}">Laporkan barang ditemukan &rarr;</a>
                    @else
                        <a href="{{ route('login') }}">Login untuk melanjutkan &rarr;</a>
                    @endauth
                </article>

                <article class="feature-card">
                    <div class="feature-icon">✓</div>
                    <h3>Menghubungi Pelapor</h3>
                    <p>Hubungi pelapor melalui WhatsApp setelah login untuk membantu proses pengembalian barang.</p>
                    <a href="#cara-kerja">Pelajari caranya &rarr;</a>
                </article>
            </div>
        </section>

        <section class="section recent-section" id="barang-terbaru">
            <div class="section-heading">
                <div>
                    <h2>Informasi Barang Terbaru</h2>
                    <p>Temukan informasi barang hilang dan barang yang ditemukan di lingkungan UNIMED.</p>
                </div>
            </div>

            <div class="items-grid">
                @forelse ($items as $item)
                    @php
                        $isLost = $item instanceof \App\Models\LostItem;
                    @endphp
                    <a
                        href="{{ $isLost
                            ? route('lost-items.show', $item->id)
                            : route('found-items.show', $item->id) }}"
                        class="item-card"
                        style="display: block; color: inherit; text-decoration: none;"
                    >
                        <div class="item-image">
                            @if ($item->photo)
                                <img
                                    src="{{ asset('storage/' . $item->photo) }}"
                                    alt="{{ $item->item_name }}"
                                >
                            @else
                                <div class="no-photo">
                                    <span>＋</span>
                                    <p>Foto tidak tersedia</p>
                                </div>
                            @endif

                            <span class="item-badge {{ $isLost ? 'badge-lost' : 'badge-found' }}">
                                {{ $isLost ? 'Barang Hilang' : 'Barang Ditemukan' }}
                            </span>
                        </div>

                        <div class="item-content">
                            <span class="item-category">
                                {{ $item->category->name ?? 'Lainnya' }}
                            </span>

                            <h3>{{ $item->item_name }}</h3>

                            <p class="item-description">
                                {{ $item->description }}
                            </p>

                            <div class="item-detail">
                                <span>⌖</span>
                                <p>{{ $item->location }}</p>
                            </div>

                            <div class="item-detail">
                                <span>◷</span>
                                <p>
                                    {{ $isLost
                                        ? $item->lost_date?->format('d M Y')
                                        : $item->found_date?->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="empty-state">
                        <h3>Belum ada informasi barang</h3>
                        <p>Laporan barang hilang dan ditemukan akan tampil di sini.</p>
                    </div>
                @endforelse
            </div>

            @if ($items->hasPages())
                <div class="pagination">
                    <p class="pagination-info">
                        Menampilkan {{ $items->firstItem() }}–{{ $items->lastItem() }}
                        dari {{ $items->total() }} barang
                    </p>

                    <div class="pagination-links">
                        @if ($items->onFirstPage())
                            <span class="page-link disabled">‹ Sebelumnya</span>
                        @else
                            <a href="{{ $items->previousPageUrl() }}" class="page-link">
                                ‹ Sebelumnya
                            </a>
                        @endif

                        @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                            @if ($page == $items->currentPage())
                                <span class="page-link active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($items->hasMorePages())
                            <a href="{{ $items->nextPageUrl() }}" class="page-link">
                                Berikutnya ›
                            </a>
                        @else
                            <span class="page-link disabled">Berikutnya ›</span>
                        @endif
                    </div>
                </div>
            @endif
        </section>

        <section class="section" id="cara-kerja">
            <div class="section-heading">
                <div>
                    <h2>Bagaimana cara kerjanya?</h2>
                    <p>Proses sederhana untuk membantu barang kembali kepada pemiliknya.</p>
                </div>
            </div>

            <div class="steps-grid">
                <article class="step-card">
                    <div class="step-number">LANGKAH 01</div>
                    <h3>Laporkan atau cari</h3>
                    <p>Bagikan informasi barang yang hilang atau temukan laporan barang yang sesuai.</p>
                </article>

                <article class="step-card">
                    <div class="step-number">LANGKAH 02</div>
                    <h3>Hubungi Pelapor</h3>
                    <p>Login ke akun Find It agar dapat menghubungi pelapor melalui WhatsApp dan memberikan informasi mengenai barang.</p>
                </article>

                <article class="step-card">
                    <div class="step-number">LANGKAH 03</div>
                    <h3>Konfirmasi pengembalian</h3>
                    <p> Untuk mengonfirmasi pengembalian barang pada pelapor dapat dilakukan secara langsung melalui WhatsApp.</p>
                </article>
            </div>
        </section>

        <section class="bottom-cta">
            <div class="cta-box">
                <div>
                    <h2>Bantu barang kembali kepada pemiliknya.</h2>
                    <p>Mulai dari satu laporan, kita bisa saling membantu di lingkungan kampus.</p>
                </div>
                @auth
                    <a href="#fitur" class="btn btn-primary">Lihat Layanan</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-primary">Buat Akun</a>
                @endauth
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-container">
            <div><strong>Find It: Lost & Found</strong><br>Universitas Negeri Medan</div>
            <div>Platform informasi barang hilang dan ditemukan di lingkungan UNIMED.</div>
        </div>
    </footer>
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