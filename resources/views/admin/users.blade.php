<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna - Find It</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 24px;
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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 24px;
        }

        .header h2 {
            font-size: 26px;
            margin: 0 0 8px;
        }

        .header p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .back-button {
            display: inline-block;
            padding: 12px 20px;
            background: #0f766e;
            color: white !important;
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: normal !important;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 16px 5%;
            }

            .brand-name {
                font-size: 14px;
            }

            .brand-subtitle {
                font-size: 12px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        .panel {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 2px 10px #00000008;
            margin-bottom: 20px;
        }

        .search {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        input, select, button {
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font: inherit;
        }

        input {
            flex: 1;
            min-width: 180px;
        }

        button {
            cursor: pointer;
            border: none;
            background: #0f766e;
            color: white;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th, td {
            padding: 13px 10px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        th {
            background: #f8fafc;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .actions form {
            margin: 0;
        }

        .delete {
            background: #dc2626;
        }

        .message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 16px;
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .pagination {
            margin-top: 18px;
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

        .reset-button {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 10px;
            background: #e2e8f0;
            color: #1e293b;
            text-decoration: none;
            font-size: 14px;
            font-weight: normal;
        }

        .reset-button:hover {
            background: #cbd5e1;
        }

        @media (max-width: 600px) {
            body {
                padding: 14px;
            }

            .panel {
                padding: 14px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="brand">
            <div class="brand-logo">FI</div>
            <div>
                <div class="brand-name">UNIVERSITAS NEGERI MEDAN</div>
                <div class="brand-subtitle">Find It: Lost &amp; Found</div>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="padding:12px 20px; border:0; border-radius:10px; background:#0f766e; color:white; font-size:16px; cursor:pointer;">
                Keluar
            </button>
        </form>
    </nav>

    <div class="container">
        <div class="header">
            <div>
                <h2>Manajemen Pengguna</h2>
                <p>Kelola akun pengguna Find It.</p>
            </div>

            <a class="back-button" href="{{ route('admin.dashboard') }}">
                Kembali ke Dashboard
            </a>
        </div>

        @if (session('success'))
            <div class="message">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="message error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        
    <div class="panel">
        <form action="{{ route('admin.users') }}" method="GET" class="search">
            <input
                type="text"
                name="search"
                placeholder="Cari nama atau email..."
                value="{{ request('search') }}"
            >
            <button type="submit">Cari</button>
            <a class="reset-button" href="{{ route('admin.users') }}">Reset</a>
        </form>
    </div>

    <div class="panel">
        <p>Total pengguna pada halaman ini: {{ $users->count() }}</p>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>WhatsApp</th>
                        <th>Role</th>
                        <th>Terdaftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $users->firstItem() + $loop->index }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->whatsapp_number ?: '-' }}</td>
                            <td>
                                @if ($user->id === auth()->id())
                                    <strong>{{ $user->role }} (Akunmu)</strong>
                                @else
                                    <form
                                        action="{{ route('admin.users.update-role', $user->id) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PUT')

                                        <select name="role" aria-label="Role pengguna">
                                            <option value="user" @selected($user->role === 'user')>
                                                User
                                            </option>
                                            <option value="admin" @selected($user->role === 'admin')>
                                                Admin
                                            </option>
                                        </select>
                                        <button type="submit">Simpan</button>
                                    </form>
                                @endif
                            </td>
                            <td>{{ $user->created_at?->format('d-m-Y') ?? '-' }}</td>
                            <td>
                                @if ($user->id !== auth()->id())
                                    <form
                                        action="{{ route('admin.users.destroy', $user->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus akun {{ addslashes($user->name) }}?')"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete" type="submit">Hapus</button>
                                    </form>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Tidak ada pengguna yang ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $users->links() }}
        </div>
    </div>
</div>
</body>
</html>