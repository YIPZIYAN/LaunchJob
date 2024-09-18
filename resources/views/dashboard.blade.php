<x-app-layout>
    <div class="px-4 text-gray-900">
        <div class="my-4 space-x-2">
            <x-wireui-button class="mb-4" label="POST JOB"
                             right-icon="plus"

                             href="{{ route('management.job-post.create') }}"/>
            <x-wireui-button class="mb-4" label="View Archived Jobs"
                             outline
                             right-icon="trash"
                             href="{{ route('management.job-post.archived') }}"/>
        </div>


        <livewire:table.job-post-table/>
    </div>
</x-app-layout>
