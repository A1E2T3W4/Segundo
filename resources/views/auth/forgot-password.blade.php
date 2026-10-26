
@extends("layout.main")

@section("TESTE", "Recuperar Palavra-passe | Wanandumbo Group")

@section("content")
<div class="login-page forgot-page">
    <div class="login-card forgot-card">

        <div class="login-logo">
            <x-jet-authentication-card-logo />
        </div>

        <div class="forgot-icon">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="32" height="32" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor"
                 stroke-width="1.8" stroke-linecap="round"
                 stroke-linejoin="round">
                <rect x="3" y="5" width="18" height="14" rx="3"/>
                <path d="m3 7 9 6 9-6"/>
            </svg>
        </div>

        <h1 class="login-heading">Recuperar palavra-passe</h1>

        <p class="login-subtitle">
            Esqueceste-te da tua palavra-passe?
            Introduz o teu e-mail e enviaremos um link para criares uma nova.
        </p>

        @if (session('status'))
            <div class="forgot-status">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="forgot-field">
                <x-jet-label for="email" value="Endereço de e-mail" />

                <x-jet-input
                    id="email"
                    class="login-input"
                    type="email"
                    name="email"
                    :value="old('email')"
                    placeholder="exemplo@email.com"
                    required
                    autofocus
                    autocomplete="email"
                />
            </div>

            <div class="forgot-actions">
                <x-jet-button class="login-button">
                    Enviar link de recuperação
                </x-jet-button>
            </div>
        </form>

        <div class="forgot-back">
            <a href="{{ route('login') }}" class="login-forgot">
                &larr; Voltar ao início de sessão
            </a>
        </div>

        <div class="login-footer">
            WANANDUMBO GROUP · Recuperação segura
        </div>
    </div>
</div>
@endsection
