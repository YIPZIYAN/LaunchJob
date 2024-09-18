<x-wireui-card class="max-w-[85rem] p-4 mx-auto">
    <x-slot name="title" class="text-xl font-semibold">
        <span class="mr-2">{{$header}}</span>
    </x-slot>
    <div
        class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-slate-800">
            <tr>
                @foreach($thead as $th)
                    <th scope="col" class="px-4 py-3 text-start">
                        <span
                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                            {{$th}}
                        </span>
                    </th>
                @endforeach
            </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            {{$slot}}
            </tbody>
        </table>
    </div>
    <!-- End Table -->
</x-wireui-card>
