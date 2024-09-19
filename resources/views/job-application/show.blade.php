<x-guest-layout>
    <div class="p-8 space-y-8">
        <livewire:job-state.employee-select-button :job-application="$jobApplication" />
        @include('job-application.partials.show-job-details')
        @include('job-application.partials.show-company-details')
        @if($jobApplication->interviews->isNotEmpty())
            @include('job-application.partials.show-interview-details')
        @endif
    </div>
</x-guest-layout>
