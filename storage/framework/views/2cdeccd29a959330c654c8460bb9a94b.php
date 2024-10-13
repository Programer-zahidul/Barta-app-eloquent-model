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
    <!-- This is an example component -->
    <div class="max-w-2xl mx-auto">

      <div class="p-8 max-w-md bg-white rounded-lg border shadow-md sm:p-8 border-gray-800 min-h-[400px] space-y-8">
        <div class="flex justify-between mb-4">
          <h3 class="text-xl font-bold leading-none text-gray-900">People</h3>
          <div class="flex justify-between items-center mb-4">
            <form action="<?php echo e(route('search')); ?>"
              class="flex justify-between items-center bg-white mx-auto max-w-none px-1.5 sm:px-6" method="get">
              <?php echo csrf_field(); ?>
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

            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                  <div class="flex-shrink-0">
                    <img class="w-8 h-8 rounded-full" src="<?php echo e(asset($user->img)); ?>" alt="Neil image">
                  </div>
                  <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">
                      <?php echo e($user->fname . ' ' . $user->lname); ?>

                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                      <?php echo e($user->email); ?>

                    </p>
                  </div>
                  <div class="inline-flex items-center text-base font-semibold text-gray-900">
                    <a class="text-sm font-medium text-blue-600 hover:border-gray-900 dark:text-blue-500 p-1.5 rounded-lg border"
                      href="<?php echo e(route('person', [$user->id])); ?>">View</a>
                  </div>
                </div>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <li class="py-3 w-full text-center text-3xl text-gray-100 bg-gray-800 rounded">Not Found!</li>
            <?php endif; ?>

          </ul>
        </div>
      </div>
    </div>
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
<?php /**PATH E:\Workspaces\Laravel Project\Practice\Barta-app\resources\views/people.blade.php ENDPATH**/ ?>