<div>
    @if($isApplied)
        <x-wireui-button wire:click="apply()" lg full
                         class="uppercase mt-4"
                         label="Apply Now"
                         disabled/>
    @else
        <x-wireui-button wire:click="apply()" lg full
                         class="uppercase mt-4"
                         label="Apply Now"
        />
    @endif
</div>
