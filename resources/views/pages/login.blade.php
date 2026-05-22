@extends('layouts.app')

@section('title', 'Login Admin - Gokidz')

@section('styles')
    <style>
        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 80px 20px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--secondary-light) 100%);
            min-height: calc(100vh - 80px - 250px);
        }

        .login-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 45px 40px;
            box-shadow: var(--shadow-lg);
            border: 3px solid var(--primary-light);
            width: 100%;
            max-width: 450px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h2 {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .login-header p {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 0.95rem;
            color: var(--text-main);
        }

        .form-group input {
            width: 100%;
            padding: 12px 18px;
            border: 2px solid #E2E8F0;
            border-radius: var(--radius-sm);
            font-family: inherit;
            font-size: 0.95rem;
            transition: var(--transition);
            outline: none;
        }

        .form-group input:focus {
            border-color: var(--primary);
            background: var(--primary-light);
            box-shadow: 0 0 0 1px var(--primary);
        }

        .remember-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .remember-me input {
            cursor: pointer;
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
        }

        .login-btn {
            background: var(--primary);
            color: var(--white);
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            display: inline-block;
            width: 100%;
            text-align: center;
            font-size: 1rem;
        }

        .login-btn:hover {
            background: #e07a00;
            transform: translateY(-2px);
            box-shadow: 0 10px 18px -5px rgba(255, 138, 0, 0.35);
        }

        .error-alert {
            background-color: #FEF2F2;
            border: 2px solid #FCA5A5;
            color: #EF4444;
            padding: 12px 18px;
            border-radius: var(--radius-sm);
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .demo-credentials {
            background: var(--secondary-light);
            border: 2px dashed var(--secondary);
            padding: 15px;
            border-radius: var(--radius-sm);
            margin-top: 25px;
            font-size: 0.85rem;
        }

        .demo-credentials h4 {
            color: var(--secondary);
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        .demo-credentials p {
            color: var(--text-main);
            margin-bottom: 3px;
        }
    </style>
@endsection

@section('content')
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <h2>Login Admin 🔑</h2>
                <p>Silakan masuk ke panel admin Gokidz Shuttle</p>
            </div>

            @if ($errors->any())
                <div class="error-alert">
                    @foreach ($errors->all() as $error)
                        <div>⚠️ {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" name="email" id="email" placeholder="Contoh: admin@gokidz.id" required
                        value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password Anda" required>
                </div>

                <div class="remember-row">
                    <label class="remember-me">
                        <input type="checkbox" name="remember"> Ingat Saya
                    </label>
                </div>

                <button type="submit" class="login-btn">Masuk Sekarang</button>
            </form>

            <!-- <div class="demo-credentials">
                        <h4>💡 Akun Demo / Uji Coba:</h4>
                        <p><strong>Email:</strong> admin@gokidz.id</p>
                        <p><strong>Password:</strong> password</p>
                        <p style="color: var(--text-muted); font-size: 0.8rem; margin-top: 5px;">* Sistem akan otomatis membuat akun di atas jika database masih kosong.</p>
                    </div> -->
        </div>
    </div>
@endsection