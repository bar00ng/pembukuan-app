<!DOCTYPE html>
<html lang="en">

<head>
    {{-- {{asset('')}} --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Kedai Essentieel</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body>
    <div id="auth">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="{{ asset('assets/images/favicon.svg') }}" height="48" class='mb-4'>
                                <h3>Sign In</h3>
                                <p>Please sign in to continue.</p>
                            </div>
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- Email Address -->
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control" id="email" class="block mt-1 w-full"
                                        type="email" name="email" :value="old('email')" required />
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            href="{{ route('register') }}">
                                            {{ __('Buat Akun') }}
                                        </a>
                                    @endif

                                    <x-primary-button class="btn btn-primary float-end">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
