<x-guest-layout>

    <div class="container mx-auto flex flex-wrap px-16">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Technology</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$jobPost->name}}</a>
                    <p href="#" class="text-sm pb-3">
                        By <a href="#" class="font-semibold hover:text-gray-800">David Grzyb</a>, Published on April
                        25th, 2020
                    </p>
                    <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta
                        dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet
                        posuere magna..</a>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                                class="fas fa-arrow-right"></i></a>
                </div>
            </article>
        </section>
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <x-wireui-avatar xl
                                 icon="building-office-2"
                                 :src="$jobPost->company->avatar == null ? '': asset('storage/'.$jobPost->company->avatar)"/>

                <p class="text-xl font-semibold pb-5">{{$jobPost->company->name}}</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio
                    sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>

                <form action="{{route('job-application.apply',$jobPost)}}" method="post">
                    @method('POST')
                    @csrf
                    <x-wireui-button type="submit" lg full class="uppercase mt-4" label="Apply Now"/>
                </form>
            </div>
        </aside>
    </div>
</x-guest-layout>
