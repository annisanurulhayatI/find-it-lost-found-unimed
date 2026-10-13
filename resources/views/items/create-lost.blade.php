<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporkan Barang Hilang | Find It</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f1e5;
            color: #303b32;
            padding: 35px 18px;
        }

        .container {
            max-width: 760px;
            margin: auto;
        }

        .back-link {
            display: inline-block;
            color: #285943;
            text-decoration: none;
            margin-bottom: 22px;
            font-size: 14px;
        }

        .form-card {
            background: #ffffff;
            border: 1px solid #ebe5d8;
            border-radius: 18px;
            overflow: hidden;
        }

        .form-header {
            background: #285943;
            color: #ffffff;
            padding: 30px;
        }

        .form-header p {
            color: #e0e8df;
            font-size: 14px;
            margin-top: 8px;
        }

        .form-body {
            padding: 30px;
        }

        .notice {
            padding: 13px 15px;
            margin-bottom: 22px;
            border-radius: 9px;
            background: #f7f1e5;
            color: #285943;
            font-size: 14px;
        }

        .errors {
            background: #fff0ed;
            color: #a33d2e;
            padding: 14px 18px;
            border-radius: 9px;
            margin-bottom: 20px;
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            color: #285943;
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #dcded4;
            border-radius: 9px;
            background: #fdfcf9;
            color: #303b32;
            font: inherit;
            font-size: 14px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus, select:focus, textarea:focus {
            outline: 2px solid #d6e5d7;
            border-color: #285943;
        }

        .hint {
            display: block;
            color: #777d73;
            font-size: 12px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 12px 20px;
            border: 1px solid transparent;
            border-radius: 9px;
            font: inherit;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #285943;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #1d4030;
        }

        .btn-secondary {
            border-color: #285943;
            background: #ffffff;
            color: #285943;
        }

        @media (max-width: 520px) {
            .form-header, .form-body {
                padding: 22px;
            }

            .actions {
                flex-direction: column;
            }

            .actions .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <main class="container">
        <a href="{{ route('home') }}" class="back-link">&larr; Kembali ke beranda</a>

        <section class="form-card">
            <div class="form-header">
                <h1>Laporkan Barang Hilang</h1>
                <p>Isi informasi barang yang hilang di lingkungan Universitas Negeri Medan.</p>
            </div>

            <div class="form-body">
                <div class="notice">
                    Pastikan informasi yang kamu isi jelas agar barang lebih mudah dikenali.
                </div>

                @if ($errors->any())
                    <div class="errors">
                        <strong>Periksa kembali data berikut:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('lost-items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="field">
                        <label for="item_name">Nama barang</label>
                        <input type="text" id="item_name" name="item_name" value="{{ old('item_name') }}" placeholder="Contoh: Dompet hitam" maxlength="255" required>
                    </div>

                    <div class="field">
                        <label for="category_id">Kategori barang</label>
                        <select id="category_id" name="category_id" required>
                            <option value="">Pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label for="description">Deskripsi dan ciri-ciri barang</label>
                        <textarea id="description" name="description" placeholder="Tuliskan warna, merek, ciri khusus, atau isi barang yang bisa membantu mengenalinya." required>{{ old('description') }}</textarea>
                    </div>

                    <div class="field">
                        <label for="location">Lokasi terakhir barang terlihat</label>
                        <input type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Contoh: Perpustakaan UNIMED" maxlength="255" required>
                    </div>

                    <div class="field">
                        <label for="lost_date">Tanggal kehilangan</label>
                        <input type="date" id="lost_date" name="lost_date" value="{{ old('lost_date') }}" max="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="field">
                        <label for="whatsapp">Nomor WhatsApp aktif</label>
                        <input
                            type="tel"
                            id="whatsapp"
                            name="whatsapp"
                            value="{{ old('whatsapp') }}"
                            placeholder="Contoh: 081234567890"
                            maxlength="20"
                            pattern="[0-9+\-\s]+"
                            required
                        >
                        <span class="hint">Nomor ini digunakan agar penemu barang dapat menghubungimu.</span>
                    </div>

                    <div class="field">
                        <label for="photo">Foto barang (opsional)</label>
                        <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.webp">
                        <span class="hint">Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</span>
                    </div>

                    <div class="actions">
                        <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>