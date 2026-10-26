
@extends("layout.main")

@section("TESTE", " Wanandumbo Group")

@section("content")

<div class="login-page reset-page">
    <div class="login-card reset-card">

        <div class="login-logo">
            <x-jet-authentication-card-logo />
        </div>

        <h1 class="login-heading">Redefinir palavra-passe</h1>

        <p class="login-subtitle">
            Cria uma nova palavra-passe para recuperares o acesso à tua conta.
        </p>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}"
            >

            <!-- Email -->
            <div class="login-field">
                <x-jet-label for="email" value="{{ __('Email') }}" />

                <x-jet-input
                    id="email"
                    class="login-input"
                    type="email"
                    name="email"
                    :value="old('email', $request->email)"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="exemplo@email.com"
                />
            </div>

            <!-- Nova palavra-passe -->
            <div class="login-field">
                <x-jet-label for="password" value="{{ __('Password') }}" />

                <x-jet-input
                    id="password"
                    class="login-input"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Introduz a nova palavra-passe"
                />
            </div>

            <!-- Confirmar palavra-passe -->
            <div class="login-field">
                <x-jet-label
                    for="password_confirmation"
                    value="{{ __('Confirm Password') }}"
                />

                <x-jet-input
                    id="password_confirmation"
                    class="login-input"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Repete a nova palavra-passe"
                />
            </div>

            <!-- Botão de redefinição -->
            <div class="reset-actions">
                <x-jet-button class="login-button">
                    Redefinir palavra-passe
                </x-jet-button>
            </div>
        </form>

        <div class="login-footer">
            WANANDUMBO GROUP · Recuperação segura da conta
        </div>

    </div>
</div>

@endsection
