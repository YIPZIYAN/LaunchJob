<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Company Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your company information here.') }}
        </p>
    </header>

    <form wire:submit.prevent="submit" class="mt-6 space-y-6">

        <div>
            <x-input-label for="avatar" value="Company Avatar"/>
            <div class="flex flex-row space-x-2 mt-2">
                <x-wireui-avatar lg
                                 icon="user"
                                 :src="Auth::user()->company->avatar == null ? '': asset('storage/'.Auth::user()->company->avatar)"/>
                <div class="flex flex-col">
                    <input
                        wire:model="avatar"
                        class="block m-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file">

                </div>
            </div>
            @error('avatar')
            <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

        </div>

        <div>
            <x-wireui-input
                wire:model="profileData.name"
                label="Company Name"
                placeholder="Enter company name"
            />
        </div>

        <div>
            <x-wireui-input
                wire:model="profileData.address"
                label="Address"
                placeholder="Enter address"
            />
        </div>

        <x-wireui-textarea
            wire:model="profileData.description"
            label="Description"
            placeholder="Enter description"
        />

        <div class="flex items-center gap-4">
            <x-wireui-button type="submit" label="Save"/>
        </div>
    </form>
</section>
