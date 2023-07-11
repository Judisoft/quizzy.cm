<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="text-left">
                <h1 class="py-2" style="font-size:20px;font-weight:700;">Password Reset</h1>
                <p class="text-gray-600">Create a new password for your account</p>
            </div>

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-input id="email" class="block mt-1 w-full" type="email" placeholder="Email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-input id="password" class="block mt-1 w-full" type="password" placeholder="Password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
