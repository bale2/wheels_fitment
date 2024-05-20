<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('DESHboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::user())
                        {{ __("You're logged in!") }}
                    @else
                        {{ __('Log in to access everything!') }}
                    @endif
                    <div class="flex flex-col md:flex-row md:justify-evenly">
                        <div class="mx-auto">
                            <h1>Search a vehicle to get fitting wheels </h1>
                            <livewire:DependentDropdown />
                        </div>
                        <div class="mx-auto">
                            <h1>Search a Wheel to get fitting cars </h1>
                            <livewire:DependentDropdownC />
                        </div>
                    </div>
                    {{-- <div class="flex flex-row gap-x-5">
                        <div class="mt-5">
                            <x-input-label for="manufacturer_id" :value="__('Manufacturer')" class="dark:text-gray-200" />
                            <select id="manufacturer_id" name="manufacturer_id"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg">
                                @foreach ($manufacturers as $manufacturer)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800"
                                        value={{ $manufacturer->id }}
                                        :selected="manufacturer_id === {{ $manufacturer->id }}">
                                        {{ $manufacturer->manufacturer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-5">
                            <x-input-label for="model" :value="__('Model')" class="dark:text-gray-200" />
                            <select id="model" name="model"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg">
                                @foreach ($cars as $car)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800"
                                        value={{ $car->id }}
                                        :selected="manufacturer_id === {{ $manufacturer->id }}">
                                        {{ $car->car_model }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                </div>

            </div>

            <div class="p-6 text-gray-900 dark:text-gray-100 w-96 flex flex-row">
                <div class="shadow-">
                    <h1 class="text-white">The site provides a database of rims for cars. Search for a car and
                        find
                        out
                        which wheels are right for it. If you can't find the wheel you are looking, use our
                        calculator
                        with the wheel's details.</h1>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
