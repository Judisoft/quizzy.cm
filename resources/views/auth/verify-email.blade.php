<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 font-medium text-md rounded-md p-3" style="color:rgb(2 132 199);border:1px solid rgb(2 132 199);background-color:rgb(224 242 254);">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-bold text-md rounded-md p-3" style="color:rgb(2 132 199);border:1px solid rgb(2 132 199);background-color:rgb(224 242 254);">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-center">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
