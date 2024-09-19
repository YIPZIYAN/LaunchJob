@php
    use App\StateMachine\JobApplication\JobApplicationState;
@endphp

<div class="flex justify-end space-x-2">
    @switch($applicationState)
        @case(JobApplicationState::NEW)
            <x-wireui-button
                wire:click="shortlist"
                wire:confirm="Are you sure you want to shortlist this applicant?"
                label="Shortlist" right-icon="check-circle"/>
            <x-wireui-button
                negative
                wire:click="reject"
                wire:confirm="Are you sure you want to reject this applicant?"
                label="Reject" right-icon="no-symbol"/>
            @break
        @case(JobApplicationState::SHORTLISTED)
            <x-wireui-button
                target="_blank"
                href="{{route('management.job-application.interview.create', $jobApplication)}}"
                label="Schedule Interview" right-icon="plus"/>
            @break
        @case(JobApplicationState::INTERVIEWING)
            <x-wireui-button
                target="_blank"
                href="{{route('management.job-application.interview.create', $jobApplication)}}"
                label="Schedule Interview" right-icon="plus"/>
            <x-wireui-button
                label="Send Offer Letter"
                wire:click="offer"
                wire:confirm="Are you sure you want to offer this applicant?"
                right-icon="document"/>
            <x-wireui-button
                negative
                wire:click="reject"
                wire:confirm="Are you sure you want to reject this applicant?"
                label="Reject" right-icon="no-symbol"/>
            @break
        @case(JobApplicationState::OFFERING)
            <x-wireui-button
                disabled
                label="Pending For Applicant" right-icon="ellipsis-horizontal-circle"/>
            @break
        @case(JobApplicationState::REJECTED)
            <x-wireui-button
                disabled negative
                label="Rejected By Company" right-icon="no-symbol"/>
            @break
        @case(JobApplicationState::OFFER_REJECTED)
            <x-wireui-button
                disabled negative
                label="Offer Rejected" right-icon="no-symbol"/>
            @break
        @case(JobApplicationState::OFFER_ACCEPTED)
            <x-wireui-button
                disabled positive
                label="Offer Accepted" right-icon="face-smile"/>
            @break

    @endswitch

</div>
