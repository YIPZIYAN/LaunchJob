<div>
    <x-wireui-dropdown>
        <x-slot name="trigger">
            <x-wireui-button label="Export"/>
        </x-slot>
        <x-wireui-dropdown.item label="Download XML" wire:click="download"/>
        <x-wireui-dropdown.item label="View" wire:click="viewXSLT"/>
    </x-wireui-dropdown>
</div>
