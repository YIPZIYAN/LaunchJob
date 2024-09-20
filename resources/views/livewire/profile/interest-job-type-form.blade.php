<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Interest Job Type') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('We will send email notification to you when there are new job post of the selected type.') }}
        </p>
    </header>

    <form wire:submit.prevent="submit" class="mt-6 space-y-6">

        <div>
            <x-wireui-select
                wire:model="job_type_id"
                label="Job Type"
                placeholder="Select maximum 3 job types"
                multiselect
                :options="$type_list"
                option-value="value"
                option-label="label"
            />
        </div>


        <div class="flex items-center gap-4">
            <x-wireui-button type="submit" label="Save"/>
        </div>
    </form>
</section>
