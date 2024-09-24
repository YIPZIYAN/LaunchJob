<x-app-layout>
    <div class="px-4 text-gray-900">
        <div class="my-4 flex justify-between items-center">
            <div class="space-x-2">
                <x-wireui-button class="mb-4" label="POST JOB"
                                 right-icon="plus"
                                 href="{{ route('management.job-post.create') }}"/>
                <x-wireui-button class="mb-4" label="View Archived Jobs"
                                 outline
                                 right-icon="trash"
                                 href="{{ route('management.job-post.archived') }}"/>
            </div>
            <x-wireui-dropdown>

                <x-slot name="trigger">
                    <x-wireui-button label="Export" />
                </x-slot>

                <x-wireui-dropdown.item label="Download XML" href="{{ route('management.job-post.download') }}"/>
                <x-wireui-dropdown.item label="View" href="{{ route('management.job-post.view-xml') }}" />
            </x-wireui-dropdown>

        </div>


        <livewire:table.job-post-table/>
    </div>
</x-app-layout>
