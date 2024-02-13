<x-app-layout>
    <x-slot name="header" >
        <div class="mx-auto">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Data') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 mb-12">
                <a href="wheel_types">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Wheel Types</h1>
                    </div>
                </a>

                <a href="bolt_patterns">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Bolt patterns</h1>
                    </div>
                </a>

                <a href="nut_bolts">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Nut Bolt</h1>
                    </div>
                </a>
                <a href="/manufacturers">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Manufacturers</h1>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
