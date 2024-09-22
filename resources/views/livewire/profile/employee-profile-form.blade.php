<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Employee Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your employee information here.') }}
        </p>
    </header>

    <form wire:submit.prevent="submit" class="mt-6 space-y-6">

        <div>
            <x-wireui-select
                wire:model="profileData.profession"
                label="Profession"
                placeholder="Select a profession"
                :options="$profession_list"
            />
        </div>

        <div>
            <x-input-label for="resume" value="Resume"/>

            @if (Auth::user()->employee->resume)
                <div class="mt-2">
                    <a href="{{ asset('storage/' . Auth::user()->employee->resume) }}"
                       class="text-blue-500 hover:underline"
                       download>
                        {{ basename(Auth::user()->employee->resume) }}
                    </a>
                </div>
            @endif
            <div class="flex space-x-2 mt-2">
                <div>
                    <input
                        wire:model="resume"
                        class="block m-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file">
                    @error('resume')
                    <div class="text-sm text-red-500">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <x-wireui-textarea
            wire:model="profileData.about"
            label="About"
            placeholder="Enter about"
        />

        <div class="flex items-center gap-4">
            <x-wireui-button type="submit" label="Save"/>
        </div>
    </form>
</section>
