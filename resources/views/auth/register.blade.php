
    @extends("layout.main")

    @section("TESTE", "Criar Conta | Wanandumbo Group")

    @section("content")

    <div class="login-page register-page">
        <div class="login-card register-card">

            <div class="login-logo">
                <x-jet-authentication-card-logo />
            </div>

            <h1 class="login-heading">Criar uma conta</h1>

            <p class="login-subtitle">
                Junta-te à WANANDUMBO GROUP e começa a participar nos eventos.
            </p>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nome -->
                <div class="login-field">
                    <x-jet-label for="name" value="{{ __('Name') }}" />

                    <x-jet-input
                        id="name"
                        class="login-input"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="O teu nome completo"
                    />
                </div>

                <!-- Email -->
                <div class="login-field">
                    <x-jet-label for="email" value="{{ __('Email') }}" />

                    <x-jet-input
                        id="email"
                        class="login-input"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username"
                        placeholder="exemplo@email.com"
                    />
                </div>

                <!-- Palavra-passe -->
                <div class="login-field">
                    <x-jet-label for="password" value="{{ __('Password') }}" />

                    <x-jet-input
                        id="password"
                        class="login-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Cria uma palavra-passe"
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
                        placeholder="Repete a palavra-passe"
                    />
                </div>

                <!-- Termos e política de privacidade -->
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="register-terms">
                        <x-jet-label for="terms">
                            <div class="register-terms-content">
                                <x-jet-checkbox
                                    name="terms"
                                    id="terms"
                                />

                                <div class="register-terms-text">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="register-link">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="register-link">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <!-- Botões -->
                <div class="register-actions">
                    <a
                        href="{{ route('login') }}"
                        class="login-forgot"
                    >
                        Já tens uma conta? Entrar
                    </a>

                    <x-jet-button class="login-button">
                        Criar conta
                    </x-jet-button>
                </div>
            </form>

            <div class="login-footer">
                WANANDUMBO GROUP · Acesso seguro
            </div>

        </div>
    </div>

    @endsection
