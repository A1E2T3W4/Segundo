
@extends("layout.main")

@section("TESTE", "Wanandumbo")

@section("content")

<div class="login-page">
    <div class="login-card">

        <div class="login-logo">
            <x-jet-authentication-card-logo />
        </div>

        <h1 class="login-heading">Bem-vindo de volta!</h1>

        <p class="login-subtitle">
            Inicia sessão na tua conta para continuares.
        </p>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="login-status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="login-field">
                <x-jet-label for="email" value="{{ __('Email') }}" />

                <x-jet-input
                    id="email"
                    class="login-input"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                />
            </div>

            <div class="login-field">
                <x-jet-label for="password" value="{{ __('Password') }}" />

                <x-jet-input
                    id="password"
                    class="login-input"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />
            </div>

            <div class="login-remember">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />

                    <span class="ml-2 text-sm text-gray-600">
                        {{ __('Remember me') }}
                    </span>
                </label>
            </div>

            <div class="login-actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="login-forgot">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="login-button">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>

        <div class="login-footer">
            WANANDUMBO GROUP · Acesso seguro
        </div>

    </div>
</div>

@endsection
```