<x-app-layout>
  <div class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">

    <!-- Newsfeed -->
    <section id="newsfeed" class="space-y-6">

      <!-- Barta Card -->
      <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
        <!-- Barta Card Top -->
        <header>
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <!-- User Avatar -->
              <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full object-cover" src=" {{ asset($post->user->img) }} "
                  alt=" {{ $post->user->fname }} " />-->
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
          </div>
        </header>

        <!-- Content -->
        <div class="py-4 text-gray-700 font-normal">
          <p>
            {{ $post->description }}
          </p>
        </div>

        <!-- Date Created & View Stat -->
        <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
          <span class="">6 minutes ago</span>
          <span class="">•</span>
          <span>450 views</span>
        </div>


      </article>

    </section>
    <!-- /Newsfeed -->
  </div>
</x-app-layout>
