

<x-layouts.guest title="Register">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Poli</b>klinik</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register akun baru</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    {{-- NAMA LENGKAP --}}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" required placeholder="Nama Lengkap" name="name" value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    {{-- EMAIL --}}
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" required placeholder="Email" name="email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" required placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    {{-- KONFIRMASI PASSWORD --}}
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" required placeholder="Confirm Password" name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>

                <p class="mt-3 mb-1 text-center">
                    Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.guest>
