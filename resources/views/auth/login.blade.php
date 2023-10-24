<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" style=" color: #666;" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" style=" color: #666;" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600" style=" color: #666;">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button style="background-color: #E50914;">
                    {{ __('Log in') }}
                </x-button>
            </div>
            
            <div class="flex items-center justify-center mt-4" style=" color: #666;">
            Don't have an account?
            <a  style=" color: #FE3442;"  href="{{ route('register') }}">
                {{ __("Register here") }}
            </a>
        </div>
        </form>
        
    </x-authentication-card>
    @include('all_products.footer')

</x-guest-layout>
