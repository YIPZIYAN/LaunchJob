<div class="flex items-center justify-left pr-12 pb-4">
    <div id="dropdown" class="z-10 w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
        <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
            {{ $title }}
        </h6>
        <ul class="h-48 overflow-y-auto text-sm text-gray-700 dark:text-gray-200">
            {{ $slot }}
        </ul>


    </div>
</div>
