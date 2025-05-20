<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Botões de login social -->
    <div class="mb-6">
        <a href="{{ url('auth/github') }}"
           class="w-full flex items-center justify-center px-4 py-2 mb-3 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path
                d="M12 .5C5.73.5.5 5.74.5 12.02c0 5.11 3.29 9.44 7.85 10.97.57.1.78-.25.78-.56v-2.1c-3.19.7-3.86-1.54-3.86-1.54-.52-1.32-1.27-1.67-1.27-1.67-1.04-.71.08-.7.08-.7 1.15.08 1.76 1.18 1.76 1.18 1.02 1.76 2.68 1.25 3.33.95.1-.74.4-1.25.73-1.54-2.55-.29-5.24-1.28-5.24-5.7 0-1.26.45-2.3 1.18-3.11-.12-.29-.51-1.45.11-3.03 0 0 .97-.31 3.18 1.18a11.1 11.1 0 012.9-.39c.98 0 1.97.13 2.9.39 2.2-1.5 3.17-1.18 3.17-1.18.62 1.58.23 2.74.11 3.03.74.8 1.18 1.85 1.18 3.11 0 4.43-2.7 5.4-5.26 5.68.41.35.78 1.03.78 2.08v3.08c0 .31.21.67.79.56A10.52 10.52 0 0023.5 12c0-6.28-5.22-11.5-11.5-11.5z"/>
            </svg>
            Login com GitHub
        </a>

        <a href="{{ url('auth/google') }}"
           class="w-full flex items-center justify-center px-4 py-2 bg-white text-gray-800 border border-gray-300 rounded hover:bg-gray-100 transition">
            <img class="w-5 h-5 mr-2" src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google logo">
            Login com Google
        </a>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
