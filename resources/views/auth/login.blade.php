<x-layouts.guest title="Login">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Poli</b>klinik</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login ke akun anda</p>

                {{-- Menampilkan error jika login gagal --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    {{-- EMAIL --}}
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>

                <p class="mt-3 mb-1 text-center">
                    {{-- Diperbaiki: 'Register' menjadi 'register' (huruf kecil) --}}
                    Belum punya akun? <a href="{{ route('register') }}">Register</a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.guest>