<div class="max-w-7xl mx-auto px-4 space-y-6">
    <div class="max-w-xl">
        <section>

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
                    :options="['Full-time', 'Part-time', 'Contract', 'Internship',
                    'Freelance']"
                />

                <x-wireui-select
                    wire:model="mode"
                    label="Mode"
                    :options="['On-site', 'Remote', 'Hybrid']"
                />

                <x-wireui-select
                    wire:model="type"
                    label="Type"
                    :options="['Information Technology', 'Accounting', 'Other']"
                />

                <x-wireui-button type="submit" label="Update"/>

            </form>

            <livewire:job-post.archive-job :jobPost="$jobPost"/>

        </section>
    </div>
</div>
