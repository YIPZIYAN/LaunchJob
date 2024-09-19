<x-auth-layout>
    <a
        href="{{route('job-application.show',$jobApplication)}}"
        class="bg-white relative block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8"
    >
  <span
      class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"
  ></span>

        <div class="sm:flex sm:justify-between sm:gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
                    {{$jobApplication->jobPost->name}}
                </h3>

                <p class="mt-1 text-xs font-medium text-gray-600">By {{$jobApplication->jobPost->company->name}}</p>
            </div>

            <div class="hidden sm:block sm:shrink-0">
                <x-wireui-avatar xl
                                 icon="building-office-2"
                                 :src="$jobApplication->jobPost->company->avatar == null ? '': asset('storage/'.$jobApplication->jobPost->company->avatar )"/>
            </div>
        </div>

        <div class="mt-4">
            <p class="text-pretty text-sm text-gray-500">
                We are hiring you as a {{$jobApplication->jobPost->name}}!
            </p>
        </div>

        <dl class="mt-6 flex gap-4 sm:gap-6">
            <div class="flex flex-col-reverse">
                <dt class="text-sm font-medium text-gray-600">Click to view details.</dt>
            </div>
        </dl>
    </a>

</x-auth-layout>
