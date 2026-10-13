
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->item_name }} | Find It</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f1e5;
            color: #303b32;
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .navbar {
            padding: 18px 24px;
            background: #fff;
            border-bottom: 1px solid #e9e5da;
        }

        .nav-inner {
            max-width: 1000px;
            margin: auto;
        }

        .brand {
            color: #285943;
            font-weight: bold;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 24px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 22px;
            color: #285943;
            font-weight: bold;
        }

        .detail-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            background: #fffdf8;
            border: 1px solid #e6e0d3;
            border-radius: 20px;
        }

        .item-photo {
            min-height: 350px;
            background: #eee9dc;
        }

        .item-photo img {
            display: block;
            width: 100%;
            height: 100%;
            min-height: 350px;
            object-fit: cover;
        }

        .no-photo {
            display: flex;
            min-height: 350px;
            align-items: center;
            justify-content: center;
            color: #777d73;
        }

        .detail-content {
            padding: 32px;
        }

        .badge {
            display: inline-block;
            padding: 7px 12px;
            margin-bottom: 15px;
            border-radius: 20px;
            background: #e6eee4;
            color: #285943;
            font-size: 13px;
            font-weight: bold;
        }

        .detail-content h1 {
            margin-bottom: 12px;
            color: #285943;
            font-size: 30px;
            line-height: 1.3;
        }

        .description {
            margin: 20px 0;
            color: #666e65;
            white-space: pre-line;
        }

        .info-row {
            padding: 13px 0;
            border-bottom: 1px solid #eee8dc;
        }

        .info-label {
            display: block;
            color: #8a7658;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .info-value {
            overflow-wrap: anywhere;
        }

        .btn {
            display: inline-block;
            margin-top: 24px;
            padding: 12px 20px;
            border-radius: 9px;
            background: #285943;
            color: white;
            font-weight: bold;
        }

        .btn:hover {
            background: #1d4030;
        }

        .btn-whatsapp {
            background: #218c58;
        }

        .btn-whatsapp:hover {
            background: #176b42;
        }

        .contact-notice {
            margin-top: 24px;
            color: #8a7658;
            font-size: 13px;
        }

        .report-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            margin-top: 12px;
        }

        .report-actions .btn {
            margin-top: 0;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 14px;
        }

        .btn-edit {
            background: #d8e8d5;
            color: #285943;
        }

        .btn-edit:hover {
            background: #c4dbc0;
        }

        .btn-delete {
            background: #a83d35;
            color: white;
        }

        .btn-delete:hover {
            background: #852d27;
        }

        .report-actions form {
            margin: 0;
        }

        @media (max-width: 700px) {
            .container {
                margin: 24px auto;
                padding: 0 16px;
            }

            .detail-card {
                grid-template-columns: 1fr;
            }

            .item-photo,
            .item-photo img,
            .no-photo {
                min-height: 250px;
                max-height: 320px;
            }

            .detail-content {
                padding: 24px;
            }

            .detail-content h1 {
                font-size: 25px;
            }
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="nav-inner">
            <a href="{{ route('home') }}" class="brand">
                Find It: Lost & Found | UNIVERSITAS NEGERI MEDAN
            </a>
        </div>
    </header>

    <main class="container">
        <a href="{{ route('home') }}#barang-terbaru" class="back-link">
            &larr; Kembali ke daftar barang
        </a>

        <article class="detail-card">
            <div class="item-photo">
                @if ($item->photo)
                    <img
                        src="{{ asset('storage/' . $item->photo) }}"
                        alt="{{ $item->item_name }}"
                    >
                @else
                    <div class="no-photo">Foto tidak tersedia</div>
                @endif
            </div>

            <div class="detail-content">
                <span class="badge">
                    {{ $type === 'lost' ? 'Barang Hilang' : 'Barang Ditemukan' }}
                </span>

                <h1>{{ $item->item_name }}</h1>

                <p class="description">{{ $item->description }}</p>

                <div class="info-row">
                    <span class="info-label">Kategori</span>
                    <span class="info-value">{{ $item->category->name ?? 'Lainnya' }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Lokasi</span>
                    <span class="info-value">{{ $item->location }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">
                        {{ $type === 'lost' ? 'Tanggal Hilang' : 'Tanggal Ditemukan' }}
                    </span>
                    <span class="info-value">
                        {{ $type === 'lost'
                            ? $item->lost_date?->format('d M Y')
                            : $item->found_date?->format('d M Y') }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Dilaporkan oleh</span>
                    <span class="info-value">{{ $item->user->name ?? 'Pengguna UNIMED' }}</span>
                </div>
                @php
                    $whatsappNumber = preg_replace('/\D/', '', $item->whatsapp ?? '');

                    if (str_starts_with($whatsappNumber, '0')) {
                        $whatsappNumber = '62' . substr($whatsappNumber, 1);
                    } elseif (str_starts_with($whatsappNumber, '8')) {
                        $whatsappNumber = '62' . $whatsappNumber;
                    }

                    if ($type === 'lost') {
                        $message = "Halo, saya melihat laporan barang hilang berupa {$item->item_name} di Find It: Lost & Found UNIMED. Saya ingin menginformasikan bahwa saya mungkin menemukan barang tersebut.";
                    } else {
                        $message = "Halo, saya melihat laporan barang ditemukan berupa {$item->item_name} di Find It: Lost & Found UNIMED. Saya ingin menanyakan informasi lebih lanjut mengenai barang tersebut.";
                    }

                    $whatsappUrl = 'https://wa.me/' . $whatsappNumber
                        . '?text=' . rawurlencode($message);
                @endphp

                @if (auth()->check())
                    @if ($item->whatsapp)
                        <a
                            href="{{ $whatsappUrl }}"
                            class="btn btn-whatsapp"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            {{ $type === 'lost'
                                ? 'Saya Menemukan Barang Ini'
                                : 'Hubungi Penemu via WhatsApp' }}
                        </a>
                    @else
                        <p class="contact-notice">
                            Nomor WhatsApp belum tersedia untuk laporan ini.
                        </p>
                    @endif
                @else
                    <p class="contact-notice">
                        Login terlebih dahulu untuk menghubungi pelapor melalui WhatsApp.
                    </p>

                    <a href="{{ route('login') }}" class="btn">
                        Login untuk Menghubungi
                    </a>
                @endif

                @if (auth()->check() && auth()->id() === $item->user_id)
                    <div class="report-actions">
                        <a
                            href="{{ $type === 'lost'
                                ? route('lost-items.edit', $item->id)
                                : route('found-items.edit', $item->id) }}"
                            class="btn btn-edit"
                        >
                            Edit Laporan
                        </a>

                        <form
                            action="{{ $type === 'lost'
                                ? route('lost-items.destroy', $item->id)
                                : route('found-items.destroy', $item->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus laporan ini? Laporan yang dihapus tidak dapat dikembalikan.')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-delete">
                                Hapus Laporan
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </article>
    </main>
</body>
</html>