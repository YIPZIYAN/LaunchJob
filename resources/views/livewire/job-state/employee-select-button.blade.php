@php
    use App\StateMachine\JobApplication\JobApplicationState;
@endphp

<div class="flex justify-end space-x-2 px-12">
   @if($applicationState == JobApplicationState::OFFERING)
        <x-wireui-button
            flat
            wire:click="download"
            label="Download Offer Leter" right-icon="document"/>
        <x-wireui-button
            wire:click="acceptOffer"
            wire:confirm="Are you sure you want to accept this offer?"
            label="Accept" right-icon="check-circle"/>
        <x-wireui-button
            negative
            wire:click="rejectOffer"
            wire:confirm="Are you sure you want to reject this offer?"
            label="Reject" right-icon="no-symbol"/>
   @endif

</div>
