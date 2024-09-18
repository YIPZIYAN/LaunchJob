<div>
    @if($isApplied)
        <x-wireui-button href="{{route('job-application.show',
$jobPost->jobApplications()->where('user_id', auth()->id())->first())}}"
                         lg full
                         class="uppercase mt-4"
                         label="View Application Status"
                         right-icon="arrow-right"
                         positive
        />
    @else
        <x-wireui-button wire:click="apply()" lg full
                         class="uppercase mt-4"
                         label="Apply Now"
                         right-icon="rocket-launch"
        />
    @endif
</div>
