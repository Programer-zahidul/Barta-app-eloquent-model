<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

  <div class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">

    <!-- Barta Create Post Card -->
    <form method="POST" action="<?php echo e(route('posts.store')); ?>" enctype="multipart/form-data"
      class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6 space-y-3">
      <?php echo csrf_field(); ?>
      <!-- Create Post Card Top -->
      <div>
        <div class="flex items-start /space-x-3/">
          <!-- User Avatar -->
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full object-cover" src="<?php echo e(asset($currentUser->img)); ?>"
              alt="<?php echo e($currentUser->fname); ?>" />
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


      <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
          <!-- Barta Card Top -->
          <header>
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-3">
                <!-- User Avatar -->
                <div class="flex-shrink-0">
                  <img class="h-10 w-10 rounded-full object-cover" src="<?php echo e(asset($post->user->img)); ?>"
                    alt="<?php echo e($post->user->fname . ' ' . $post->user->lname); ?>" />-->
                </div>
                <!-- /User Avatar -->

                <!-- User Info -->
                <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                  <a href="profile.html" class="hover:underline font-semibold line-clamp-1">
                    <?php echo e(ucwords($post->user->fname . ' ' . $post->user->lname)); ?>

                  </a>

                  <a href="profile.html" class="hover:underline text-sm text-gray-500 line-clamp-1">
                    <?php echo e('@' . $post->user->username); ?>

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
                    <a href="<?php echo e(route('posts.show', $post->id)); ?>"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1"
                      id="user-menu-item-0"> <?php echo e(__('Show')); ?> </a>
                    <?php if($post->user_id === auth()->id()): ?>
                      <a href="<?php echo e(route('posts.edit', $post->id)); ?>"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1"
                        id="user-menu-item-0"> <?php echo e(__('Edit')); ?> </a>
                      <div class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                        tabindex="-1" id="user-menu-item-1">
                        <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="post">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('delete'); ?>

                          <input class="w-full text-left cursor-pointer" type="submit" value="<?php echo e(__('Delete')); ?>">
                        </form>
                      </div>
                    <?php endif; ?>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                      tabindex="-1" id="user-menu-item-1"> <?php echo e(__('Share')); ?> </a>
                  </div>
                </div>

              </div>
              <!-- /Card Action Dropdown -->
            </div>
          </header>

          <!-- Content -->
          <?php if($post->image != null): ?>
            <div class="flex flex-col content-center">
              <img class="max-h-96 px-4 rounded-lg" src="<?php echo e(asset($post->image)); ?>" alt="Post Image">
            </div>
          <?php endif; ?>

          <div class="py-4 text-gray-700 font-normal">
            <p>
              <?php echo e($post->description); ?>

            </p>
          </div>

          <!-- Date Created & View Stat -->
          <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
            <span class=""><?php echo e($post->created_at->diffForHumans()); ?></span>
            <span class="">•</span>
            <span><?php echo e($post->no_views . ' views'); ?></span>
          </div>


        </article>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
      <?php endif; ?>

    </section>
    <!-- /Newsfeed -->
  </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH E:\Workspaces\Laravel Project\Practice\Barta-app\resources\views/dashboard.blade.php ENDPATH**/ ?>