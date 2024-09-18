<x-wireui-card class="max-w-[85rem] m-8 p-4 mx-auto">
    <x-slot name="title" class="text-xl font-semibold">
        <span class="mr-2">{{__('Job Details')}}</span>
        <x-wireui-badge flat icon="clock" sm label="{{$jobApplication->jobPost->period}}"/>
        <x-wireui-badge flat icon="computer-desktop" sm label="{{$jobApplication->jobPost->mode}}"/>
        <x-wireui-badge flat icon="tag" sm label="{{$jobApplication->jobPost->type}}"/>
    </x-slot>
    <!-- List -->
    <div class="space-y-3">
        <dl class="flex flex-col sm:flex-row gap-1">
            <dt class="min-w-40">
                <span class="block text-gray-500 dark:text-neutral-500">Job Title:</span>
            </dt>
            <dd>
                <ul>
                    <li>
                        {{$jobApplication->jobPost->name}}
                    </li>
                </ul>
            </dd>
        </dl>
        <dl class="flex flex-col sm:flex-row gap-1">
            <dt class="min-w-40">
                <span class="block text-gray-500 dark:text-neutral-500">Salary:</span>
            </dt>
            <dd>
                <ul>
                    <li>
                        RM {{$jobApplication->jobPost->min_salary}} - {{$jobApplication->jobPost->max_salary}}
                    </li>
                </ul>
            </dd>
        </dl>
        <dl class="flex flex-col sm:flex-row gap-1">
            <dt class="min-w-40">
                <span class="block text-gray-500 dark:text-neutral-500">Location:</span>
            </dt>
            <dd>
                <ul>
                    <li>
                        {{$jobApplication->jobPost->location}}
                    </li>
                </ul>
            </dd>
        </dl>
        <dl class="flex flex-col sm:flex-row gap-1">
            <dt class="min-w-40">
                <span class="block text-gray-500 dark:text-neutral-500">Application Status:</span>
            </dt>
            <dd>
                <x-state-badge :status="$jobApplication->status"/>
            </dd>
        </dl>
        <dl class="flex flex-col sm:flex-row gap-1">
            <dt class="min-w-40">
                <span class="block text-gray-500 dark:text-neutral-500">Description:</span>
            </dt>
            <dd>
                <ul>
                    <li>
                        {{$jobApplication->jobPost->description}}
                    </li>
                </ul>
            </dd>
        </dl>
    </div>
</x-wireui-card>
