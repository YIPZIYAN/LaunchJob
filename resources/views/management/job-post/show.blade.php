<x-app-layout>
    <div class="p-4 space-y-8">
        @include('management.job-post.partials.show-job-details')
        <div class="flex justify-end">
            <livewire:xsl.applicant-x-m-l :job-post="$jobPost" />
        </div>
        @include('management.job-post.partials.show-applicant')
    </div>
</x-app-layout>
