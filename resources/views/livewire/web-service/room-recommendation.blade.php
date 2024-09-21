<div>
    <header class="bg-gray-50 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-lg font-semibold uppercase">
            Room rental recommendation for you
        </div>
    </header>
    <div class="max-w-[85rem] py-4 sm:px-6 mx-auto">
        @if($rooms!=null)
            <!-- Grid -->
            <div class="grid gap-8 mt-4 p-4">
                @foreach($rooms as $room)
                    <!-- Card -->
                    <a class="group bg-white block rounded-xl overflow-hidden focus:outline-none"
                       href="{{route('ws.room.show',$room->id)}}">
                        <div class="flex flex-col sm:flex-row sm:items-stretch  gap-3 sm:gap-5">
                            <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-64 h-72">
                                <img
                                    class="p-2 group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out size-full absolute top-0 start-0 object-scale-down rounded-xl"
                                    src="{{config('app.web_services_api.base_url').$room->image}}"
                                    alt="Room Image">
                                <span
                                    class="absolute top-0 start-0  text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-neutral-900">
                                  RM 1000
                                </span>
                            </div>

                            <div class="grow py-8">
                                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                                    {{$room->name}}
                                </h3>
                                <p class=" text-sm italic">
                                    Posted
                                    At: {{\Illuminate\Support\Carbon::parse( $room->created_at)->format('Y-m-d H:i A')}}
                                </p>
                                <p class="mt-4 text-sm text-gray-600 dark:text-neutral-400 flex items-center space-x-2">
                                    <x-heroicons::outline.map-pin/>
                                    <span> {{$room->location}}</span>
                                </p>
                                <p class="mt-4 text-sm text-gray-600 dark:text-neutral-400 flex items-center space-x-2">
                                    <x-heroicons::outline.home-modern/>
                                    <span> Master room</span>
                                </p>
                                <p class="mt-4 text-sm text-gray-600 dark:text-neutral-400 flex items-center space-x-2">
                                    <x-heroicons::outline.tag/>
                                    <x-wireui-badge label="Student" flat/>
                                </p>
                                <p class="mt-8 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
                                    Read more
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"/>
                                    </svg>
                                </p>
                            </div>
                        </div>
                    </a>
                    <!-- End Card -->
                @endforeach
            </div>
            <!-- End Grid -->
        @else
            <x-wireui-alert warning title="Sorry, no room available now."/>
        @endif
    </div>
</div>
