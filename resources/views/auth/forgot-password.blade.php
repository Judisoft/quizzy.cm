<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-md rounded-md p-3" style="color:rgb(2 132 199);border:1px solid rgb(2 132 199);background-color:rgb(224 242 254);">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="text-left">
                <h1 class="py-2" style="font-size:20px;font-weight:700;">Forgot password? </h1>
                <p class="py-2 text-gray-600">Enter the email associated with your account</p>
            </div>
            <div class="block">
                <x-jet-input id="email" class="block mt-1 w-full" type="email" placeholder="Email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
