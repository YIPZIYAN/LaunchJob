<div class="max-w-7xl mx-auto px-4 space-y-6">
    <div class="max-w-xl">
        <form class="mt-6 space-y-6" wire:submit.prevent="submit">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                offer letter</label>
            <input
                wire:model="letter"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="file">
            @error('letter') <div class="text-sm text-red-500">{{ $message }}</div> @enderror
            <x-wireui-button type="submit" label="Send"/>
        </form>
    </div>
</div>

