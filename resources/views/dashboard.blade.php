<x-app-layout>

  <div class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">

    <!-- Barta Create Post Card -->
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data"
      class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6 space-y-3">
      @csrf
      <!-- Create Post Card Top -->
      <div>
        <div class="flex items-start /space-x-3/">
          <!-- User Avatar -->
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full object-cover" src="{{ asset($currentUser->img) }}"
              alt="{{ $currentUser->fname }}" />
          </div>
          <!-- /User Avatar -->

          <!-- Content -->
          <div class="flex flex-col w-full">
            <div class="text-gray-700 font-normal w-full">
              <textarea
                class="block w-full p-2 pt-2 text-gray-900 rounded-lg border-none outline-none focus:ring-0 focus:ring-offset-0"
                name="description" rows="2" placeholder="What's going on, Shamim?"></textarea>
            </div>
            <div class="mt-2">
              <input type="file" name="image" id="image">
            </div>
          </div>
          <!-- Create Post Card Bottom -->
          <!-- Card Bottom Action Buttons -->
          <div class="flex items-center justify-end">

            <div class="mt-[220%]">
              <!-- Post Button -->
              <button type="submit"
                class="-m-2 flex gap-2 text-xs items-center rounded-full px-4 py-2 font-semibold bg-gray-800 hover:bg-black text-white">
                Post
              </button>
              <!-- /Post Button -->
            </div>
          </div>
          <!-- /Card Bottom Action Buttons -->
          <!-- /Create Post Card Bottom -->

        </div>
      </div>
    </form>
    <!-- /Barta Create Post Card -->

    <!-- Newsfeed -->
    <section id="newsfeed" class="space-y-6">


      @forelse ($posts as $post)
        <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
          <!-- Barta Card Top -->
          <header>
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-3">
                <!-- User Avatar -->
                <div class="flex-shrink-0">
                  <img class="h-10 w-10 rounded-full object-cover" src="{{ asset($post->user->img) }}"
                    alt="{{ $post->user->fname . ' ' . $post->user->lname }}" />-->
                </div>
                <!-- /User Avatar -->

                <!-- User Info -->
                <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                  <a href="profile.html" class="hover:underline font-semibold line-clamp-1">
                    {{ ucwords($post->user->fname . ' ' . $post->user->lname) }}
                  </a>

                  <a href="profile.html" class="hover:underline text-sm text-gray-500 line-clamp-1">
                    {{ '@' . $post->user->username }}
                  </a>
                </div>
                <!-- /User Info -->
              </div>

              <!-- Card Action Dropdown -->
              <div class="flex flex-shrink-0 self-center" x-data="{ open: false }">
                <div class="relative inline-block text-left">
                  <div>
                    <button @click="open = !open" type="button"
                      class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600"
                      id="menu-0-button">
                      <span class="sr-only">Open options</span>
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path
                          d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z">
                        </path>
                      </svg>
                    </button>
                  </div>
                  <!-- Dropdown menu -->
                  <div x-show="open" @click.away="open = false"
                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <a href="{{ route('posts.show', $post->id) }}"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1"
                      id="user-menu-item-0"> {{ __('Show') }} </a>
                    @if ($post->user_id === auth()->id())
                      <a href="{{ route('posts.edit', $post->id) }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1"
                        id="user-menu-item-0"> {{ __('Edit') }} </a>
                      <div class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                        tabindex="-1" id="user-menu-item-1">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                          @csrf
                          @method('delete')

                          <input class="w-full text-left cursor-pointer" type="submit" value="{{ __('Delete') }}">
                        </form>
                      </div>
                    @endif
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                      tabindex="-1" id="user-menu-item-1"> {{ __('Share') }} </a>
                  </div>
                </div>

              </div>
              <!-- /Card Action Dropdown -->
            </div>
          </header>

          <!-- Content -->
          @if ($post->image != null)
            <div class="flex flex-col content-center">
              <img class="max-h-96 px-4 rounded-lg" src="{{ asset($post->image) }}" alt="Post Image">
            </div>
          @endif

          <div class="py-4 text-gray-700 font-normal">
            <p>
              {{ $post->description }}
            </p>
          </div>

          <!-- Date Created & View Stat -->
          <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
            <span class="">{{ $post->created_at->diffForHumans() }}</span>
            <span class="">•</span>
            <span>{{ $post->no_views . ' views' }}</span>
          </div>


        </article>

      @empty
        <!-- Barta Card -->
        <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">

          <!-- Content -->
          <div class="py-4 text-gray-700 font-normal">
            <p class="text-center">
              Oopsss! No Post found.
            </p>
          </div>

        </article>

        <!-- Barta Card -->
      @endforelse

    </section>
    <!-- /Newsfeed -->
  </div>
</x-app-layout>
