<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Compatible Cars') }}
            </h2>
        </div>
    </x-slot>

    <div x-data="{ wheel_id: '', manufacturer_id: 0, model: '', price: 0, wheel_type_id: 0, diameter: 0, width: 0, ET_number: 0, bolt_pattern_id: 0, kba_number: '', center_bore: 0, nut_bolt_id: 0, multipiece: 0, note: '', accepted: 0 }">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                @foreach ($cars as $car)
                    @if ($car->id != 1)
                        <a href="/cars/{{ $car->id }}">
                            <div
                                class="bg-white overflow-hidden flex flex-row shadow-sm sm:rounded-lg dark:bg-gray-800 dark:hover:bg-blue-900 mb-1">
                                <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                <svg class="my-auto pl-3" width="100px" height="100px" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z"
                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <div class="p-6 pl-3 text-gray-900 dark:text-gray-100">
                                    <h1>Manufacturer: {{ $car->manufacturer->manufacturer_name }}</h1>
                                    <h1>Model :{{ $car->car_model }}</h1>
                                    <h1>Engine size :{{ $car->engine_size }}</h1>
                                    <h1>Manufactured :{{ $car->car_year }}</h1>

                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
                {{ $cars->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
