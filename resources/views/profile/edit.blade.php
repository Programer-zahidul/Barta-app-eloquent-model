<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Profile') }}
    </h2>
  </x-slot>

  <div class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
    <!-- Profile Edit Form -->
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-xl font-semibold leading-7 text-gray-900">
            {{ __('Edit Profile') }}
          </h2>
          <p class="mt-1 text-sm leading-6 text-gray-600">
            {{ __('This information will be displayed publicly so be careful what you share.') }}
          </p>

          <div class="mt-10 border-b border-gray-900/10 pb-12">
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <label for="first-name"
                  class="block text-sm font-medium leading-6 text-gray-900">{{ __('Change Your Profile Image') }}</label>
                <div class="mt-2">
                  <input type="file" name="img"
                    class="w-full text-gray-500 font-medium bg-white text-base bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2.5 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded" />
                </div>
              </div>
              <div class="sm:col-span-2 flex content-center justify-center">
                <img class="h-20 w-20 rounded-full" src="https://avatars.githubusercontent.com/u/831997"
                  alt="Ahmed Shamim Hasan Shaon" />
              </div>
              <div class="sm:col-span-3">
                <label for="first-name"
                  class="block text-sm font-medium leading-6 text-gray-900">{{ __('First name') }}</label>
                <div class="mt-2">
                  <input type="text" name="fname" id="first-name" autocomplete="given-name" required
                    value="{{ $user->fname }}"
                    class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6" />
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="last-name"
                  class="block text-sm font-medium leading-6 text-gray-900">{{ __('Last name') }}</label>
                <div class="mt-2">
                  <input type="text" name="lname" id="last-name" value="{{ $user->lname }}"
                    autocomplete="family-name"
                    class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6" />
                </div>
              </div>

              <div class="col-span-full">
                <label for="email"
                  class="block text-sm font-medium leading-6 text-gray-900">{{ __('Email address') }}</label>
                <div class="mt-2">
                  <input id="email" name="email" type="email" autocomplete="email" value="{{ $user->email }}"
                    required
                    class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6" />
                </div>
              </div>

              <div class="col-span-full">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900"> {{ __('Password') }}
                </label>
                <div class="mt-2">
                  <input type="password" name="password" id="password" autocomplete="password" required
                    placeholder="Enter new password"
                    class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6" />
                </div>
              </div>
            </div>
          </div>

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
              <label for="bio"
                class="block text-sm font-medium leading-6 text-gray-900">{{ __('Bio') }}</label>
              <div class="mt-2">
                <textarea id="bio" name="bio" rows="3"
                  class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6"> {{ $user->bio }}</textarea>
              </div>
              <p class="mt-3 text-sm leading-6 text-gray-600">
                {{ __('Write a few sentences about yourself.') }}
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit"
          class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
          {{ __('Save') }}
        </button>
      </div>
    </form>
    <!-- /Profile Edit Form -->

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
      <div class="max-w-xl">
        @include('profile.partials.delete-user-form')
      </div>
    </div>
  </div>

</x-app-layout>
