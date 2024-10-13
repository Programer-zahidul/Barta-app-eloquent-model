<x-app-layout>
  <div class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto">

      <div class="p-8 max-w-md bg-white rounded-lg border shadow-md sm:p-8 border-gray-800 min-h-[400px] space-y-8">
        <div class="flex justify-between mb-4">
          <h3 class="text-xl font-bold leading-none text-gray-900">People</h3>
          <div class="flex justify-between items-center mb-4">
            <form action="{{ route('search') }}"
              class="flex justify-between items-center bg-white mx-auto max-w-none px-1.5 sm:px-6" method="get">
              @csrf
              <input type="text" name="search" id="search"
                class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 mr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="Search">
              <!-- Search Button -->
              <button type="submit"
                class="-ml-10 flex text-xs items-center rounded-full px-4 py-2.5 font-semibold bg-gray-800 hover:bg-black text-white">
                Search
              </button>
              <!-- /Search Button -->
            </form>
          </div>
        </div>

        <div class="flow-root">
          <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">

            @forelse ($users as $user)
              <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                  <div class="flex-shrink-0">
                    <img class="w-8 h-8 rounded-full" src="{{ asset($user->img) }}" alt="Neil image">
                  </div>
                  <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">
                      {{ $user->fname . ' ' . $user->lname }}
                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                      {{ $user->email }}
                    </p>
                  </div>
                  <div class="inline-flex items-center text-base font-semibold text-gray-900">
                    <a class="text-sm font-medium text-blue-600 hover:border-gray-900 dark:text-blue-500 p-1.5 rounded-lg border"
                      href="{{ route('person', [$user->id]) }}">View</a>
                  </div>
                </div>
              </li>
            @empty
              <li class="py-3 w-full text-center text-3xl text-gray-100 bg-gray-800 rounded">Not Found!</li>
            @endforelse

          </ul>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
