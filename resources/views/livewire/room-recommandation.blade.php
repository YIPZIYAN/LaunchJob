<div>
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto space-y-4">
       @foreach($rooms as $room)
            <a class="block bg-white border border-gray-200 rounded-lg hover:shadow-sm focus:outline-none dark:border-neutral-700"
               href="#">
                <div class="relative flex items-center overflow-hidden">
                    <img class="w-32 sm:w-48 h-full absolute inset-0 object-cover rounded-s-lg"
                         src="{{config('app.web_services_api.base_url').$room->image}}"
                         alt="Room Image">

                    <div class="grow p-4 ms-32 sm:ms-48">
                        <div class="min-h-24 flex flex-col justify-center">
                            <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-300">
                                {{$room->name}}
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                                 {{$room->location}}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
