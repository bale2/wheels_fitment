<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around ">
            <div class="w-3 ">
                <a href="/cars"><svg fill="#000000" class="h-5 w-5" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 26.676 26.676" xml:space="preserve">

                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path
                                    d="M26.105,21.891c-0.229,0-0.439-0.131-0.529-0.346l0,0c-0.066-0.156-1.716-3.857-7.885-4.59 c-1.285-0.156-2.824-0.236-4.693-0.25v4.613c0,0.213-0.115,0.406-0.304,0.508c-0.188,0.098-0.413,0.084-0.588-0.033L0.254,13.815 C0.094,13.708,0,13.528,0,13.339c0-0.191,0.094-0.365,0.254-0.477l11.857-7.979c0.175-0.121,0.398-0.129,0.588-0.029 c0.19,0.102,0.303,0.295,0.303,0.502v4.293c2.578,0.336,13.674,2.33,13.674,11.674c0,0.271-0.191,0.508-0.459,0.562 C26.18,21.891,26.141,21.891,26.105,21.891z" />
                            </g>
                        </g>
                    </svg></a>
            </div>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center dark:text-gray-200">
                    {{ $car->car_model }}
                </h2>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class=" bg-jordy-blue overflow-hidden shadow-sm sm:rounded-lg flex flex-row flex-wrap-reverse mt-5 justify-between dark:bg-gray-800">
                <div class=" md:w-3/4 w-full  p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="flex flex-row justify-evenly pb-5 mt-2">
                        <div class="w-52">
                            <h1 class="dark:text-slate-400 text-base">Manufacturer:</h1>
                            <a href="/manufacturers/cars/{{ $car->manufacturer->id }}">
                                <h1 class="font-bold text-3xl"> {{ $car->manufacturer->manufacturer_name }}</h1>
                            </a>
                        </div>
                        <div class="w-52">
                            <h1 class="dark:text-slate-400 text-base">Model:</h1>
                            <h1 class="font-bold text-3xl   "> {{ $car->car_model }}</h1>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="dark:text-slate-400 text-base">Engine size: </h1>
                            <h1 class="text-lg">{{ $car->engine_size }} cm3</h1>
                            <hr>
                        </div>
                        <div class="
                                w-52">
                            <h1 class="dark:text-slate-400 text-base">Manufactured: </h1>
                            <h1 class="text-lg">{{ $car->car_year }}</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class="w-52">
                            <h1 class="dark:text-slate-400 text-base">Center Bore: </h1>
                            <h1 class="text-lg">{{ $car->center_bore }} cm</h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="dark:text-slate-400 text-base"> Bolt pattern : </h1>
                            <h1 class="text-lg">{{ $car->boltPattern->bolt_pattern }}</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="dark:text-slate-400 text-base">Thread Size: </h1>
                            <h1 class="text-lg">{{ $car->nutBolt->type }} </h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="dark:text-slate-400 text-base">Space for wheel: </h1>
                            <h1 class="text-lg">{{ $car->mtsurface_fender_distance }} mm</h1>
                            <hr>
                        </div>
                    </div>

                    <h1 class="text-base mt-10">Date of upload: {{ $car->created_at }}</h1>
                    <h1 class="text-base">ID: {{ $car->id }}</h1>
                </div>
                <svg class="md:my-auto lg:ml-10 mx-auto" width="100px" height="100px" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z"
                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            @include('components.wheels_cars')
            {{-- @endif --}}
            @if (Auth::user())
                <div
                    class="p-6 bg-jordy-blue overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <h1 class="dark:dark:text-slate-400 text-lg">Add wheel to the car:</h1>
                    <div class="pl-5">
                        @livewire('DependentDropdownForCars', ['car_id' => $car->id])
                    </div>
                </div>
            @elseif (!Auth::user())
                <div
                    class="p-6 bg-jordy-blue overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <h1 class="dark:dark:text-slate-400 text-lg">To add compatible wheels to this car, please <a
                            href="/login" class="underline underline-offset-2">
                            log in</a> or <a href="/register" class="underline underline-offset-2">register</a>
                    </h1>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
