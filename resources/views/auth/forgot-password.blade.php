<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __("Mot de passe oublié ? Aucun problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d'en choisir un nouveau.") }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{-- {{ session('status') }} --}}
                Nous vous avons envoyé par e-mail un lien de réinitialisation de votre mot de passe.
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="flex items-center justify-end mt-4">
                <a class="ml-8 underline" href="{{ route('login')}}">
                {{__('Login')}}</a>
            </div>
            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" placeholder="xeeweulexpress@gmail.com" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('RÉINITIALISATION DU MOT DE PASSE PAR EMAIL') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
