<x-wireui-card class="max-w-[85rem] p-4 mx-auto">
    <x-slot name="title" class="text-xl font-semibold">
        <span class="mr-2">{{__('Company Details')}}</span>
    </x-slot>

    <!-- Profile -->
    <div class="flex items-center gap-x-3">
        <div class="shrink-0">
            <x-wireui-avatar xl
                             icon="building-office-2"
                             :src="$jobApplication->jobPost->company->avatar == null ? '': asset('storage/'.$jobApplication->jobPost->company->avatar)"/>
        </div>

        <div class="grow">
            <h1 class="text-lg font-medium text-gray-800 dark:text-neutral-200">
                {{$jobApplication->jobPost->company->name}}
            </h1>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                {{$jobApplication->jobPost->company->address}}
            </p>
        </div>
    </div>
    <!-- End Profile -->

    <!-- About -->
    <div class="mt-8">
        <p class="text-sm text-gray-600 dark:text-neutral-400">
            {{$jobApplication->jobPost->company->description}}
        </p>
    </div>
    <!-- End About -->
</x-wireui-card>
