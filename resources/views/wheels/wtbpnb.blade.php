<x-app-layout>
    <x-slot name="header" >
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Datas') }}
            </h2>
            <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                <a href="/wheel_create">Datas</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 mb-12">
                <a href="wheels/wheel_types">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Wheel Types</h1>
                    </div>
                </a>

                <a href="wheels/bolt_patterns">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Bolt patterns</h1>
                    </div>
                </a>

                <a href="wheels/nut_bolts">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Nut Bolt</h1>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
