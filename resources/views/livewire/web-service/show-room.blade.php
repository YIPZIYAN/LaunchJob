<div>
    @if($room!=null)
        <header class="bg-gray-50 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-lg font-semibold uppercase">
                <p> {{$room->name}}</p>
                <x-wireui-badge label="{{$room->location}}" positive icon="map-pin"/>
            </div>
        </header>
        <div class="max-w-[85rem] py-4 sm:px-6 mx-auto">
            <div class="grid gap-4 justify-items-center">
                <div>
                    <img class="h-72 max-w-full rounded-lg"
                         src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="">
                </div>
                <div class="flex flex-nowrap gap-4 overflow-x-auto">
                    <div class="flex-none ">
                        <img class=" h-36 max-w-full rounded-lg"
                             src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="sm:flex  mt-4 space-x-2 ">
                <div class="space-y-2 grow">
                    <x-wireui-card class="max-w-[85rem] p-4 mx-auto">
                        <x-slot name="title" class="text-xl font-semibold">
                            <span class="mr-2">{{__('Rental & Deposit')}}</span>
                        </x-slot>

                        <p>
                            Monthly Rental Fees: RM 750 per month
                        </p>
                        <p class="mt-4 text-sm text-gray-600 dark:text-neutral-400 flex items-center space-x-2">
                            <x-heroicons::outline.home-modern/>
                            <span> Master room</span>
                        </p>

                    </x-wireui-card>
                    <x-wireui-card class="max-w-[85rem] p-4 mx-auto">
                        <x-slot name="title" class="text-xl font-semibold">
                            <span class="mr-2">{{__('Description')}}</span>
                        </x-slot>
<div class="space-y-2">
    <p><strong>Spacious Room for Rent in a Quiet Neighborhood</strong></p>

    <p>Looking for a cozy and affordable room in a prime location? This spacious room is perfect for students, professionals, or anyone seeking a comfortable living space in a quiet and secure neighborhood.</p>

    <p><strong>Key Features:</strong></p>
    <ul>
        <li><strong>Size:</strong> The room is bright and airy with plenty of space for a bed, desk, and personal storage.</li>
        <li><strong>Furnished/Unfurnished:</strong> Choose between furnished (including a bed, wardrobe, and desk) or bring your own furniture to make the space your own.</li>
        <li><strong>Location:</strong> Centrally located, just minutes away from public transportation, supermarkets, and restaurants.</li>
        <li><strong>Shared Amenities:</strong> Access to a fully equipped kitchen, shared living room, and laundry facilities.</li>
        <li><strong>Utilities:</strong> All utilities included (electricity, water, high-speed Wi-Fi).</li>
        <li><strong>Parking:</strong> On-street parking available (off-street parking can be arranged).</li>
    </ul>

    <p><strong>Rent Details:</strong></p>
    <ul>
        <li><strong>Monthly rent:</strong> $X (deposit required)</li>
        <li><strong>Available from:</strong> [Date]</li>
        <li><strong>Ideal for:</strong> Single occupant (no pets allowed)</li>
    </ul>

    <p>If you're interested in a peaceful home with easy access to local amenities, contact us today to schedule a viewing!</p>

</div>
                    </x-wireui-card>
                </div>
                <div class="w-[20rem] flex-none h-fit bg-white relative block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8" >
                    <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>

                    <div class="sm:flex sm:justify-between sm:gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
                                Contact Person
                            </h3>
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="text-pretty text-sm text-gray-500">
                            Name: Yip Zi Yan
                        </p>
                        <p class="text-pretty text-sm text-gray-500">
                            Phone No: 012-2223333
                        </p>
                        <p class="text-pretty text-sm text-gray-500">
                            Email: yipzy-wm21@student.tarc.edu.mt
                        </p>
                    </div>
                </div>
            </div>

        </div>
    @else
        <div class="max-w-[85rem] py-4 sm:px-6 mx-auto">
            <x-wireui-alert warning title="Sorry, this room is missing."/>
        </div>
    @endif
</div>

