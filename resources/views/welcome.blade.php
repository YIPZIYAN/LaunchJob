<x-app-layout>

    <x-searchbar/>
    <div class="flex px-12 py-8">
        <div class="flex flex-col">
            <x-scroll-filter title="Category">
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="checkbox-item-11" type="checkbox" value=""
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="checkbox-item-11"
                               class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Bonnie
                            Green</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input checked id="checkbox-item-12" type="checkbox" value=""
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="checkbox-item-12"
                               class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Jese
                            Leos</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="checkbox-item-13" type="checkbox" value=""
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="checkbox-item-13"
                               class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Michael
                            Gough</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="checkbox-item-14" type="checkbox" value=""
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="checkbox-item-14"
                               class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Robert
                            Wall</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="checkbox-item-15" type="checkbox" value=""
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="checkbox-item-15"
                               class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Joseph
                            Mcfall</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="checkbox-item-16" type="checkbox" value=""
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="checkbox-item-16"
                               class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Leslie
                            Livingston</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="checkbox-item-17" type="checkbox" value=""
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="checkbox-item-17"
                               class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Roberta
                            Casas</label>
                    </div>
                </li>
            </x-scroll-filter>

            <x-filter title="Job Type">
                <li class="flex items-center">
                    <input id="full-time" type="checkbox" value=""
                           class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"/>

                    <label for="full-time" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                        Full-time
                    </label>
                </li>
                <li class="flex items-center">
                    <input id="part-time" type="checkbox" value=""
                           class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"/>

                    <label for="part-time" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                        Part-time
                    </label>
                </li>
                <li class="flex items-center">
                    <input id="contract" type="checkbox" value=""
                           class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"/>

                    <label for="contract" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                        Contract
                    </label>
                </li>
                <li class="flex items-center">
                    <input id="internship" type="checkbox" value=""
                           class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"/>

                    <label for="internship" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                        Internship
                    </label>
                </li>
                <li class="flex items-center">
                    <input id="freelance" type="checkbox" value=""
                           class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"/>

                    <label for="freelance" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                        Freelance
                    </label>
                </li>
            </x-filter>

            <x-filter title="Workplace">
                <li class="flex items-center">
                    <input id="remote" type="checkbox" value=""
                           class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"/>

                    <label for="remote" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                        Remote
                    </label>
                </li>
                <li class="flex items-center">
                    <input id="on-site" type="checkbox" value=""
                           class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"/>

                    <label for="on-site" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                        On-site
                    </label>
                </li>
                <li class="flex items-center">
                    <input id="hybrid" type="checkbox" value=""
                           class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"/>

                    <label for="hybrid" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                        Hybrid
                    </label>
                </li>
            </x-filter>

            <x-filter title="Salary (RM)">
                <li>
                    <input id="default-radio-1" type="radio" value="" name="default-radio"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1"
                           class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">1K+</label>
                </li>
                <li>
                    <input id="default-radio-2" type="radio" value="" name="default-radio"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2"
                           class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">2K+</label>
                </li>
                <li>
                    <input id="default-radio-3" type="radio" value="" name="default-radio"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-3"
                           class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">3K+</label>
                </li>
                <li>
                    <input id="default-radio-4" type="radio" value="" name="default-radio"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-4"
                           class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">4K+</label>
                </li>
                <li>
                    <input id="default-radio-5" type="radio" value="" name="default-radio"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-5"
                           class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">5K+</label>
                </li>
                <li>
                    <input id="default-radio-6" type="radio" value="" name="default-radio"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-6"
                           class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">8K+</label>
                </li>
                <li>
                    <input id="default-radio-7" type="radio" value="" name="default-radio"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-7"
                           class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">10K+</label>
                </li>
            </x-filter>
        </div>
        <div class="flex-1 overflow-y-auto h-[860px]">
            <x-job-card/>
            <x-job-card/>
            <x-job-card/>
            <x-job-card/>
            <x-job-card/>
        </div>

    </div>


</x-app-layout>
