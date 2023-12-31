<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)"
                    required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <div class="relative">
                    <x-input id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" type="password"
                        name="password" required autocomplete="new-password" />
                    <button type="button" id="togglePasswordVisibility"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <div class="relative">
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <button type="button" id="togglePasswordConfirmationVisibility"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <i class="far fa-eye"></i>
                    </button>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
        </form>



    </x-authentication-card>
</x-guest-layout>
