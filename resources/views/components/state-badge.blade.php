@php
    use App\StateMachine\JobApplication\JobApplicationState;
@endphp

@props(['status'])
<div class="uppercase">
    @switch(JobApplicationState::tryFrom($status))
        @case(JobApplicationState::NEW)
        @case(JobApplicationState::SHORTLISTED)
        @case(JobApplicationState::OFFER_ACCEPTED)
            <x-wireui-badge :label="$status" flat positive/>
            @break
        @case(JobApplicationState::REJECTED)
        @case(JobApplicationState::OFFER_REJECTED)
            <x-wireui-badge :label="$status" negative/>
            @break
        @default
            <x-wireui-badge :label="$status" light/>
    @endswitch
</div>
