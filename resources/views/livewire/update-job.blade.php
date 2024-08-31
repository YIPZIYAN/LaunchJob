<div class="max-w-7xl mx-auto px-4 space-y-6">
    <div class="max-w-xl">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Edit Job Details') }}
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

            <form method="post" action="{{ route('job-post.destroy', $jobPost) }}" class="mt-6 space-y-6">
                @csrf
                @method('delete')

                <div class="flex items-center gap-4">
                    <x-danger-button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button">
                        {{ __('Archive') }}
                    </x-danger-button>

                    <x-confirm-modal id="popup-modal" :message="'Are you sure you want to archive this job?'">
                        <x-danger-button data-modal-hide="popup-modal" type="s"
                                         class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </x-danger-button>
                        <button data-modal-hide="popup-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            No, cancel
                        </button>
                    </x-confirm-modal>
                </div>
            </form>
        </section>
    </div>
</div>
