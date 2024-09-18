<x-app-layout>
    <div class="px-4 text-gray-900">
            <x-wireui-button class="mb-4" label="POST JOB" href="{{ route('job-post.create') }}"/>
        <livewire:table.job-post-table>
    </div>
</x-app-layout>
