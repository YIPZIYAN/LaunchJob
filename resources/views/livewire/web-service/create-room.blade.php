<x-wireui-card class="max-w-[85rem] p-4 mx-auto mt-8">
    <x-slot name="title" class="text-xl font-semibold">
        <span class="mr-2">{{__('Post a Room')}}</span>
    </x-slot>
    </h1>
    <form class="space-y-4 md:space-y-6" wire:submit.prevent="submit">
        <p class="text-md font-semibold">Personal Information</p>
        <div class="grid sm:grid-cols-2 gap-4">
            <x-wireui-input
                wire:model="owner"
                label="Name"
                placeholder="Enter your name"
            />
            <x-wireui-input
                wire:model="email"
                label="Email"
                placeholder="Enter your email"
            />
            <x-wireui-phone
                id="multiple-mask"
                wire:model="phone"
                label="Phone"
                placeholder="Enter phone number"
                :mask="['###-#######','###-########']"
            />
        </div>

        <p class="text-md font-semibold">Room Information</p>
        <div class="grid sm:grid-cols-2 gap-4">
            <x-wireui-input
                wire:model="name"
                label="Room Name"
                placeholder="Enter room name"
            />
            <x-wireui-currency
                wire:model="price"
                label="Price per month"
                placeholder="Enter rental price"
                prefix="RM"
            />
            <x-wireui-select
                wire:model="type"
                label="Room Type"
                placeholder="Select room type"
                :options="['Small Room', 'Medium Room', 'Master Room', 'Studio']"
            />
            <x-wireui-select
                wire:model="prefer"
                label="Tenant Preference"
                placeholder="Select tenant preference"
                :options="['Student','Worker','Any']"
            />
            <x-wireui-input
                class="sm:col-span-2"
                wire:model="location"
                label="Location"
                placeholder="Enter room location"
            />

            <div class="sm:col-span-2">
                <input id="x" wire:ignore wire:model="description" type="hidden" name="description">
                <trix-editor wire:ignore input="x"></trix-editor>
                @error('description')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>


            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                    Thumbnail
                </label>
                <input
                    wire:model="thumbnail"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file">
                @error('thumbnail')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gallery_input">
                    Gallery
                </label>
                <input
                    wire:model="gallery"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="gallery_input" type="file" multiple>
                @error('gallery.*')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
            @if($thumbnail)
                <div class="py-4 sm:px-6 mx-auto sm:col-span-2">
                    Preview Room Images
                    <div class="grid gap-4 justify-items-center">
                        <div>
                            <img class="h-72 max-w-full rounded-lg"
                                 src="{{$this->getUrl($thumbnail)}}"
                                 alt="">
                        </div>
                        <div class="flex flex-nowrap gap-4 overflow-x-auto">
                            @if($gallery)
                                @foreach($gallery as $image)
                                    <div class="flex-none ">
                                        <img class=" h-36 max-w-full rounded-lg"
                                             src="{{$this->getUrl($image)}}"
                                             alt="">
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            @endif


        </div>
        <x-wireui-button type="submit" class="w-full" right-icon="rocket-launch" label="Launch For Rooms!"/>

    </form>

    <script>
        var trixEditor = document.getElementById("x")

        addEventListener("trix-blur", function (event) {
            @this.
            set('description', trixEditor.getAttribute('value'))
        })
    </script>
</x-wireui-card>
