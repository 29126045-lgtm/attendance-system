@extends('layouts.master-blank')

@section('content')

    <div class="wrapper-page">
        <div class="card overflow-hidden account-card mx-3">
            
            <!-- ===== HEADER DENGAN LOGO, IKON & TAJUK BAHASA MELAYU ===== -->
            <div class="bg-primary p-4 text-white text-center position-relative">
                
                <!-- Ikon -->
                <i class="fas fa-users-cog" style="font-size: 40px; color: white; margin-bottom: 10px;"></i>
                
                <!-- Tajuk Bahasa Melayu -->
                <h4 class="font-20 m-b-5" style="font-weight: 600;">Selamat Datang!</h4>
                <p class="text-white-50 mb-4">Log masuk sebagai Admin ke Sistem HR</p>
                
                <!-- Logo -->
                <a href="{{ route('welcome') }}" class="logo logo-admin">
                    <h1 style="background: white; color: #4e73df; padding: 10px 20px; border-radius: 50%; display: inline-block; font-size: 32px; font-weight: bold; margin: 0;">A</h1>
                </a>
            </div>
            
            <div class="account-card-content">
                
                <!-- ===== JAM / TARIKH LIVE ===== -->
                <div style="text-align: center; padding: 10px; background: #f8f9fc; border-radius: 10px; margin-bottom: 20px; border: 1px solid #e9ecef;">
                    <div id="loginDate" style="font-size: 14px; color: #6c757d;"></div>
                    <div id="loginTime" style="font-size: 28px; font-weight: bold; color: #4e73df; font-family: monospace;"></div>
                </div>
                
                <!-- ===== BORANG LOGIN ===== -->
                <form class="form-horizontal m-t-30" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                    <div class="form-group row m-t-20">
                        <div class="col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                </form>
                
                <!-- ===== DEMO CREDENTIALS ===== -->
                <div style="background: #f8f9fc; border-radius: 10px; padding: 12px 15px; margin-top: 20px; text-align: center; border: 1px solid #e9ecef;">
                    <i class="fas fa-key me-2" style="color: #4e73df;"></i>
                    <strong style="color: #4e73df;">Demo:</strong>
                    <span style="font-size: 13px; color: #6c757d;">admin@ams.com / password</span>
                </div>
                
                <!-- ===== LUPA KATA LALUAN ===== -->
                <div class="text-center mt-3">
                    <a href="#" class="text-primary text-decoration-none" style="font-size: 14px;">
                        Lupa kata laluan?
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- end wrapper-page -->

    <!-- ===== JAVASCRIPT UNTUK JAM LIVE ===== -->
    <script>
    function updateLoginClock() {
        const now = new Date();
        const dateOptions = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById('loginDate').innerHTML = now.toLocaleDateString('ms-MY', dateOptions);
        document.getElementById('loginTime').innerHTML = now.toLocaleTimeString('ms-MY');
    }
    setInterval(updateLoginClock, 1000);
    updateLoginClock();
    </script>

@endsection

@section('script')
@endsection