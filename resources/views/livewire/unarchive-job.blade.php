<form wire:submit.prevent="submit">
    <div>
        <x-wireui-button data-modal-target="popup-modal"
                         data-modal-toggle="popup-modal" type="button" label="Unarchive"/>

        <x-confirm-modal id="popup-modal" :message="'Are you sure you want to unarchive this job?'">
            <x-wireui-button data-modal-hide="popup-modal" type="submit" label="Yes, I'm sure"
                             class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"/>
            <x-wireui-button data-modal-hide="popup-modal" type="button" label="No, cancel"
                             class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"/>        </x-confirm-modal>
    </div>
</form>
