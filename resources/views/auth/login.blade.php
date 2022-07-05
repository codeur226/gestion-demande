<x-guest-layout>
    <x-auth-card>

        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div>

{{--        <div>
            <a href="{{route('admin')}}">
                <img class="w-20 h-30" style="margin:auto;" src="{{ asset('front-office/assets/img/ANPTIC.jpg') }}">
            </a>
          </div>--}}

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="part_res">
                
                <x-label class="label_res mt-6" for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full input_res" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                
                <x-label class="label_res" for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="block mt-1 w-full input_res"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            {{-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-center mt-10">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Vous avez oublié votre mot de passe?') }}
                    </a>
                @endif

                <x-button class="ml-3 btcon btn_res">
                    {{ __('Connecter') }}
                </x-button>
            </div>
        </form>
    </div>
    </x-auth-card>
</x-guest-layout>