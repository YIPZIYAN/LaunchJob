<div class="max-w-7xl mx-auto px-4 space-y-6">
    <div class="max-w-xl">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Post a New Job') }}
                </h2>
            </header>

            <form class="mt-6 space-y-6" wire:submit.prevent="submit">
                <x-wireui-input
                    wire:model="name"
                    label="Job Name"
                    placeholder="Enter job name"
                />

                <x-wireui-textarea
                    wire:model="description"
                    label="Description"
                    placeholder="Enter description"
                />

                <x-wireui-input
                    wire:model="location"
                    label="Location"
                    placeholder="Enter location"
                />

                <x-wireui-input
                    wire:model="min_salary"
                    type="number"
                    label="Min Salary (RM)"
                    placeholder="Enter minimum salary"
                />

                <x-wireui-input
                    wire:model="max_salary"
                    type="number"
                    label="Max Salary (RM)"
                    placeholder="Enter maximum salary"
                />

                <x-wireui-select
                    wire:model="period"
                    label="Period"
                    placeholder="Select a period"
                    :options="$period_list"
                />

                <x-wireui-select
                    wire:model="mode"
                    label="Mode"
                    placeholder="Select a mode"
                    :options="$mode_list"
                />

                <x-wireui-select
                    wire:model="job_type_id"
                    label="Type"
                    placeholder="Select a type"
                    :options="$type_list"
                    option-value="value"
                    option-label="label"
                />

                <x-wireui-button type="submit" label="Post"/>
            </form>
        </section>
    </div>
</div>
