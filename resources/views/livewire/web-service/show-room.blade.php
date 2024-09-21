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
                         src="{{config('app.web_services_api.base_url').$room->thumbnail}}"
                         alt="">
                </div>
                <div class="flex flex-nowrap gap-4 overflow-x-auto">
                    @foreach($room->galleries as $gallery)
                        <div class="flex-none ">
                            <img class=" h-36 max-w-full rounded-lg"
                                 src="{{config('app.web_services_api.base_url').$gallery->image}}"
                                 alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="sm:flex  mt-4 space-x-2 ">
                <div class="space-y-2 grow">
                    <x-wireui-card class="max-w-[85rem] p-4 mx-auto">
                        <x-slot name="title" class="text-xl font-semibold">
                            <span class="mr-2">{{__('Rental & Deposit')}}</span>
                        </x-slot>

                        <p>
                            Monthly Rental Fees: RM {{$room->price}} per month
                        </p>
                        <p class="mt-4 text-sm text-gray-600 dark:text-neutral-400 flex items-center space-x-2">
                            <x-heroicons::outline.home-modern/>
                            <span class="capitalize">{{$room->type}}</span>
                        </p>

                    </x-wireui-card>
                    <x-wireui-card class="max-w-[85rem] p-4 mx-auto">
                        <x-slot name="title" class="text-xl font-semibold">
                            <span class="mr-2">{{__('Description')}}</span>
                        </x-slot>
                        <div class="space-y-2">
                            {{$room->description}}
                        </div>
                    </x-wireui-card>
                </div>
                <div
                    class="w-[20rem] flex-none h-fit bg-white relative block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8">
                    <span
                        class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>

                    <div class="sm:flex sm:justify-between sm:gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
                                Contact Person
                            </h3>
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="text-pretty text-sm text-gray-500">
                            Name: {{$room->owner}}
                        </p>
                        <p class="text-pretty text-sm text-gray-500">
                            Phone No: {{$room->contact}}
                        </p>
                        <p class="text-pretty text-sm text-gray-500">
                            Email: {{$room->email}}
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

