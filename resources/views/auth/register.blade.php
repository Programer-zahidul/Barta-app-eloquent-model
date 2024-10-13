<x-guest-layout>


  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <a href="./index.html" class="text-center text-6xl font-bold text-gray-900">
        <h1>Barta</h1>
      </a>

      <h1 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
        Sign in to your account
      </h1>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
            autofocus autocomplete="name" placeholder="Alp Arslan" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Username -->
        <div>
          <x-input-label for="username" :value="__('Username')" />
          <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
            required autofocus autocomplete="username" placeholder="alparslan1029" />
          <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
            required autocomplete="username" placeholder="alp.arslan@mail.com" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
          <x-input-label for="password" :value="__('Password')" />

          <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="new-password" placeholder="********" />

          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
          <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

          <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
            name="password_confirmation" required autocomplete="new-password" placeholder="********" />

          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
          {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('login') }}">
            {{ __('Already registered?') }}
          </a> --}}

          <x-primary-button class="ms-4">
            {{ __('Register') }}
          </x-primary-button>
        </div>
      </form>
      <p class="mt-10 text-center text-sm text-gray-500">
        Already a member?
        <a href="{{ route('login') }}" class="font-semibold leading-6 text-black hover:text-black">Sign In</a>
      </p>
    </div>
  </div>
</x-guest-layout>
