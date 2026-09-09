<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Logo -->
    <div class='flex justify-center mb-4'>
        <a href="/">
            <img src="{{ asset('images/logo_C-GIS.png') }}" alt="Logo" class="h-16" />
        </a>
    </div>
    <h2 class="text-2xl font-bold text-center text-gray-800">Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label class="block text-sm font-medium text-gray-700" for="email" :value="__('Email')" />
            <x-text-input
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="block text-sm font-medium text-gray-700" for="password" :value="__('Password')" />

            <x-text-input
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <x-primary-button
            class="w-full bg-orange-400 text-white py-2 px-4 text-center rounded-lg hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            {{ __('Log in') }}
        </x-primary-button>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>

</x-guest-layout>