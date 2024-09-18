<x-guest-layout>

    <div class="container mx-auto flex flex-wrap xl:px-24 mt-2">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="w-full flex flex-col shadow my-4">
                <!-- Article Image -->
                <div class="bg-white flex flex-col justify-start pt-6 px-6 pb-2">
                    <p class="text-3xl font-bold hover:text-gray-700 pb-3">{{$jobPost->name}}</p>
                    <p class="text-sm pb-6">Posted {{$jobPost->created_at->diffForHumans()}}</p>
                    <p class="text-blue-700 text-sm font-bold uppercase pb-2">Job Description</p>
                    <p class="pb-6 text-justify">{{$jobPost->description}}</p>
                    <div class=" flex flex-col flex-wrap lg:flex-row">
                        <div class="flex-1">
                            <p class="text-blue-700 text-sm font-bold uppercase pb-2">Location</p>
                            <p class="pb-6 text-justify">{{$jobPost->location}}</p>
                        </div>
                        <div class="flex-1">
                            <p class="text-blue-700 text-sm font-bold uppercase pb-2">Period</p>
                            <p class="pb-6 text-justify">{{$jobPost->period}}</p>

                        </div>
                    </div>
                    <div class=" flex flex-col flex-wrap lg:flex-row">
                        <div class="flex-1">
                            <p class="text-blue-700 text-sm font-bold uppercase pb-2">Salary</p>
                            <p class="pb-6 text-justify">RM {{$jobPost->min_salary}} - RM {{$jobPost->max_salary}}</p>
                        </div>
                        <div class="flex-1">
                            <p class="text-blue-700 text-sm font-bold uppercase pb-2">Mode</p>
                            <p class="pb-6 text-justify">{{$jobPost->mode}}</p>
                        </div>
                    </div>
                    <p class="text-blue-700 text-sm font-bold uppercase pb-2">Type</p>
                    <p class="pb-6 text-justify">{{$jobPost->type}}</p>
                </div>
            </article>
        </section>
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow justify-center flex flex-col my-4 p-6">

                <x-wireui-avatar
                    xl
                    icon="building-office-2"
                    :src="$jobPost->company->avatar == null ? '': asset('storage/'.$jobPost->company->avatar)"
                />

                <p class="text-xl font-semibold mt-4">{{$jobPost->company->name}}</p>
                <p class="text-sm pb-4 text-justify">{{$jobPost->company->address}}</p>
                <p class="text-justify ">{{$jobPost->company->description}}</p>
                <x-wireui-button
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4"
                    label="Apply Now"
                />
            </div>
        </aside>
    </div>
</x-guest-layout>
