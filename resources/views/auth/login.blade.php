
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Find It: Lost & Found</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: #f7f3e9;
            font-family: Arial, sans-serif;
            color: #354b3b;
        }

        .auth-container {
            width: 100%;
            max-width: 440px;
        }

        .brand {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            border-radius: 18px;
            background: #476b50;
            color: #fff9e9;
            font-size: 28px;
        }

        .brand h1 {
            font-size: 15px;
            letter-spacing: 1.5px;
            margin-bottom: 8px;
        }

        .brand h2 {
            font-size: 25px;
            color: #476b50;
        }

        .brand p {
            margin-top: 9px;
            font-size: 14px;
            color: #817b6d;
        }

        .auth-card {
            padding: 32px;
            background: #fffdf8;
            border: 1px solid #e8e0cf;
            border-radius: 22px;
            box-shadow: 0 12px 35px rgba(65, 77, 53, 0.08);
        }

        .auth-card h3 {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 14px;
            line-height: 1.6;
            color: #817b6d;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 19px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #ded8c9;
            border-radius: 10px;
            background: #fffefa;
            color: #354b3b;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            border-color: #62866a;
            box-shadow: 0 0 0 3px rgba(98, 134, 106, 0.12);
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px;
            border: none;
            background: transparent;
            color: #6f7d6e;
            cursor: pointer;
        }

        .toggle-password svg {
            width: 21px;
            height: 21px;
        }

        .error-list {
            margin-bottom: 20px;
            padding: 12px 16px 12px 32px;
            border: 1px solid #e8b8ac;
            border-radius: 10px;
            background: #fff0eb;
            color: #a13f30;
            font-size: 13px;
            line-height: 1.7;
        }

        .btn-submit {
            width: 100%;
            margin-top: 5px;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #476b50;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }

        .btn-submit:hover {
            background: #36553e;
            transform: translateY(-1px);
        }

        .auth-footer {
            margin-top: 22px;
            text-align: center;
            font-size: 14px;
            line-height: 1.9;
            color: #817b6d;
        }

        a {
            color: #476b50;
            font-weight: 600;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .back-link {
            display: block;
            margin-top: 18px;
            text-align: center;
            font-size: 13px;
        }

        @media (max-width: 480px) {
            body {
                padding: 18px;
            }

            .auth-card {
                padding: 25px 21px;
            }

            .brand h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <main class="auth-container">
        <header class="brand">
            <div class="brand-icon">⌕</div>
            <h1>UNIVERSITAS NEGERI MEDAN</h1>
            <h2>Find It: Lost & Found</h2>
            <p>Temukan barangmu, temukan kembali ketenanganmu.</p>
        </header>

        <section class="auth-card">
            <h3>Selamat Datang!</h3>
            <p class="subtitle">Masuk ke akunmu untuk melanjutkan.</p>

            @if ($errors->any())
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        autocomplete="email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >
                        <button
                            type="button"
                            class="toggle-password"
                            aria-label="Lihat password"
                            aria-pressed="false"
                            onclick="togglePassword('password', this)"
                        >
                            <svg viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Masuk</button>
            </form>

            <div class="auth-footer">
                Belum punya akun?
                <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </section>

        <a href="{{ route('home') }}" class="back-link">
            ← Kembali ke beranda
        </a>
    </main>

    <script>
        function togglePassword(id, button) {
            const input = document.getElementById(id);
            const visible = input.type === 'password';

            input.type = visible ? 'text' : 'password';
            button.setAttribute('aria-pressed', visible);
            button.setAttribute(
                'aria-label',
                visible ? 'Sembunyikan password' : 'Lihat password'
            );
        }
    </script>
</body>
</html>