<div class="max-w-7xl mx-auto px-4 space-y-6">
    <div class="max-w-xl">
        <form class="mt-6 space-y-6" wire:submit.prevent="submit">
            <x-wireui-datetime-picker
                wire:model="date"
                without-time
                display-format="YYYY-MM-DD"
                label="Interview Date"
                :min="now()"
                placeholder="Select interview date"
            />

            <x-wireui-time-picker
                wire:model="start_time"
                label="Start Time"
                placeholder="Select start time"
                without-seconds
            />

            <x-wireui-time-picker
                wire:model="end_time"
                label="End Time"
                placeholder="Select end time"
                without-seconds
            />


            <x-wireui-toggle
                wire:model.live="isOnline"
                left-label="Physical"
                label="Online"
                xl/>
            @if($isOnline)
                <x-wireui-input
                    wire:model="inputLink"
                    label="Link"
                    placeholder="Enter video conferencing link"
                    prefix="https://www."/>
            @else
                <x-wireui-input
                    wire:model="location"
                    label="Location"
                    placeholder="Enter location"
                />
                <x-wireui-checkbox
                    label="Use Company Address"
                    wire:model="isCompanyAddress"
                    wire:click="enterCompanyAddress"
                    value="label"/>
            @endif

            <x-wireui-textarea
                wire:model="description"
                label="Description"
                placeholder="Enter description"
            />
            <x-wireui-button type="submit" label="Schedule"/>
        </form>
    </div>
</div>

