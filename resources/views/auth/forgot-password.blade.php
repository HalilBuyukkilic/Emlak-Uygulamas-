<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Şifrenizi mi unuttunuz? Hemen mail adresinizi girin şifrenizi sıfırlamanız için bir bağlantı gönderelim.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Şifre Sıfırlama Linki Gönder') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
