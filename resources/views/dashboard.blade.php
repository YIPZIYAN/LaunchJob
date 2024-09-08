<x-app-layout>
    <div class="px-4 text-gray-900">
        <a href={{ route('job-post.create') }}>
            <x-primary-button class="mb-4">{{ __('Post Job') }}</x-primary-button>
        </a>
        <livewire:job-post-table/>
    </div>
</x-app-layout>
