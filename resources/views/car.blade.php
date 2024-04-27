{{-- <x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
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
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                            </g>
                        </g>

                    </svg></a>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ $car->manufacturer->manufacturer_name }} {{ $car->car_model }}
            </h2>
            @if (Auth::user())
                <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                    <a href="# ">Wheel add to profile</a>
                </div>
            @endif
        </div>
    </x-slot>
    <div x-data="{ wheel_id: '', manufacturer_id: 0, model: '', price: 0, wheel_type_id: 0, diameter: 0, width: 0, ET_number: 0, bolt_pattern_id: 0, kba_number: '', center_bore: 0, nut_bolt_id: 0, multipiece: 0, note: '', accepted: 0 }">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                <div
                    class="p-6 text-gray-900 dark:text-gray-100 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800">
                    <h1 class="mb-2">Autó adatai:</h1>
                    <h1>Gyártó: {{ $car->manufacturer->manufacturer_name }}</h1>
                    <h1>Model :{{ $car->car_model }}</h1>
                    <h1>Engine size :{{ $car->engine_size }}</h1>
                    <h1>Manufactured :{{ $car->car_year }}</h1>
                    <h1>Space for wheel :{{ $car->mtsurface_fender_distance }}</h1>
                    <h1>Thread Size :{{ $car->nutBolt->type }}</h1>
                    <h1>Center Bore :{{ $car->center_bore }}</h1>
                    <h1>Bolt pattern :{{ $car->boltPattern->bolt_pattern }}</h1>
                    <h1>ID: {{ $car->id }}</h1>
                </div>
                <div
                    class="p-6 text-gray-900 dark:text-gray-100 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800">
                    <h1>Autóhoz elfogadott kerekek</h1>
                    @foreach ($collection as $one)
                        <h1 class="dark:text-white">{{ $one['manufacturer_name'] . ' ' . $one['model'] }}</h1>
                    @endforeach
                </div>
                @if (Auth::user())
                    <form method="post" action="{{ route('car_wheel_post') }}" class="mt-6 space-y-6 "
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <input type="hidden" value="{{ $car->id }}" name="car_id" class="block mt-1 w-full" />
                        <x-input-label for="wheel_car" :value="__('Select the wheel you want to add to the car')" class="dark:text-gray-200" />
                        <select id="wheel_car" name="wheel_car"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg">
                            @foreach ($wheels as $wheel)
                                <option hidden disabled selected value> -- select an option -- </option>
                                <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $wheel->id }}
                                    :selected="wheel_id === {{ $wheel->id }}">
                                    {{ $wheel->manufacturer->manufacturer_name }}
                                    {{ $wheel->model }}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="feltöltés"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                    </form>
                @endif

                {{-- @foreach ($wheels as $wheel)
                    @if ($wheel->id != 1)
                        <a href="wheels/{{ $wheel->id }}">
                            <div
                                class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 mb-12">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h1>ID: {{ $wheel->id }}</h1>
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                                        {{ $wheel->title }}
                                    </h1>
                                    <h1>Gyártó: {{ $wheel->manufacturer->manufacturer_name }}</h1>
                                    <h1>Model :{{ $wheel->model }}</h1>
                                    <h1>Típus: {{ $wheel->wheelType->wheel_type }}</h1>
                                    <h1>Átmérő: {{ $wheel->diameter }}</h1>
                                    <h1>Szélesség: {{ $wheel->width }}</h1>
                                    <h1>ET szám: {{ $wheel->ET_number }}</h1>
                                    <h1>Osztókör:{{ $wheel->boltPattern->bolt_pattern }}</h1>
                                    <h1>KBA szám:{{ $wheel->kba_number }}</h1>
                                    <h1>Középfurat: {{ $wheel->center_bore }}</h1>
                                    <h1>Felfogatás: {{ $wheel->nutBolt->type }}</h1>
                                    <h1>Felépítés:
                                        @if ($wheel->multipiece == 0)
                                            Egyrészes
                                        @else
                                            Többrészes
                                        @endif
                                    </h1>
                                    <h1>Kép: {{ $wheel->photo }}</h1>
                                </div>
                                <div>
                                    @foreach ($wheel->photos() as $photo)
                                        <img src="{{ asset('photos/' . $photo) }}" alt="image of the ad"
                                            class="mt-10 mb-auto mx-auto h-20 w-auto ">
                                    @endforeach
                                </div>
                            </div>
                        </a>
                        {{-- <div class="grid grid-cols-2 text-center">
                            @can('delete', $wheel)
                                <form method="post" action="{{ route('wheel_delete_post') }}">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" value="{{ $wheel->id }}" name="wheel_id"
                                        class="block mt-1 w-full" />
                                    <x-primary-button>
                                        Delete wheel
                                    </x-primary-button>
                                </form>
                            @endcan
                            @can('update', $wheel)

                        x-on:click.prevent="$dispatch('open-modal','wheel_update_post'),wheel_id='{{ $wheel->id }}', manufacturer_id='{{ $wheel->manufacturer_id }}',model='{{ $wheel->model }}',price={{ $wheel->price }},wheel_type_id={{ $wheel->wheel_type_id }},diameter={{ $wheel->diameter }},width={{ $wheel->width }},ET_number={{ $wheel->ET_number }}, bolt_pattern_id={{ $wheel->bolt_pattern_id }}, kba_number='{{ $wheel->kba_number }}', center_bore={{ $wheel->center_bore }}, nut_bolt_id={{ $wheel->nut_bolt_id }}, multipiece={{ $wheel->multipiece }}, note='{{ $wheel->note }}', accepted='{{ $wheel->accepted }}'">
                        Update wheel
                        </x-primary-button>
                    @endcan
                     </div>
                    @endif
                @endforeach --}}
{{-- {{ $wheels->links() }} --}}
{{-- </div> --}}
{{-- <p>{{ $data }}</p> --}}
{{-- </div> --}}
{{--
        <div class="text-center">
            @isset($wheel)

                <x-modal name="wheel_update_post" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('wheel_update_post') }}" class="mt-6 space-y-6 "
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <input type="hidden" x-model="wheel_id" name="wheel_id" class="block mt-1 w-full" />

                        <x-input-label for="manufacturer_id" :value="__('Manufacturer')" class="dark:text-gray-200" />
                        <select id="manufacturer_id" name="manufacturer_id"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg">
                            @foreach ($manufacturers as $manufacturer)
                                <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $manufacturer->id }}
                                    :selected="manufacturer_id === {{ $manufacturer->id }}">
                                    {{ $manufacturer->manufacturer_name }}</option>
                            @endforeach
                        </select>

                        <x-input-label for="photo" :value="__('Photo')" class="dark:text-gray-200" />
                    <x-text-input id="photo" name="photo[]" multiple type="file"
                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

        <x-input-label for="note" :value="__('note')" class="dark:text-gray-200" />
        <x-text-input x-model="note" id="note" name="note" type="text"
            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

        @if (Auth::check() && Auth::user()->is_admin)
            <x-input-label for="accepted" :value="__('Accepted')" class="dark:text-gray-200" />
            <input type="checkbox" id="accepted" @checked($wheel->accepted) name="accepted"
                class="block mx-auto rounded-2xl dark:text-gray-200 bg-white dark:bg-gray-800" />
        @endif

        <input type="submit" value="feltöltés"
            class="mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
        </form>
        </x-modal>
    @endisset
</div>

    </div>
</x-app-layout> --}}
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
                class=" bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-row flex-wrap-reverse mt-5 justify-between dark:bg-gray-800">
                <div class=" md:w-3/4 w-full  p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="flex flex-row justify-evenly pb-5 mt-2">
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Gyártó:</h1>
                            <h1 class="font-bold text-3xl"> {{ $car->manufacturer->manufacturer_name }}</h1>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Model:</h1>
                            <h1 class="font-bold text-3xl   "> {{ $car->car_model }}</h1>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">Engine size: </h1>
                            <h1 class="text-lg">{{ $car->engine_size }} cc</h1>
                            <hr>
                        </div>
                        <div class="
                                w-52">
                            <h1 class="text-slate-400 text-base">Manufactured: </h1>
                            <h1 class="text-lg">{{ $car->car_year }}</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Center Bore: </h1>
                            <h1 class="text-lg">{{ $car->center_bore }} cm</h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base"> Bolt pattern : </h1>
                            <h1 class="text-lg">{{ $car->boltPattern->bolt_pattern }}</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">Thread Size: </h1>
                            <h1 class="text-lg">{{ $car->nutBolt->type }} </h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Space for wheel: </h1>
                            <h1 class="text-lg">{{ $car->mtsurface_fender_distance }} mm</h1>
                            <hr>
                        </div>
                    </div>

                    <h1 class="text-base mt-10">Feltöltés dátuma: {{ $car->created_at }}</h1>
                    <h1 class="text-base">ID: {{ $car->id }}</h1>
                </div>
                <svg class="md:my-auto lg:ml-10 mx-auto" width="100px" height="100px" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z"
                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </div>
            <div
                class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                <h1 class="text-slate-400 text-lg">Accepted wheels:</h1>
                @foreach ($car->wheels as $one)
                    <a href='/cars/{{ $one->id }}'>
                        <h3 class="dark:text-white pl-5">-{{ $one->manufacturer->manufacturer_name }}
                            {{ $one->model }}
                        </h3>
                    </a>
                @endforeach
            </div>
            <div
                class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                <h1 class="text-slate-400 text-lg">Add wheel to the car:</h1>
                <div class="pl-5">
                    @if (Auth::user())
                        @livewire('DependentDropdownForCars', ['car_id' => $car->id])
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
