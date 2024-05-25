<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around" x-data="{ car_id: '', manufacturer_id: '', car_model: '', engine_size: '', car_year: '', center_bore: '', nut_bolt_id: '', mtsurface_fender_distance: '', bolt_pattern_id: '' }">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Cars') }}
            </h2>
            @if (Auth::user())
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal','car_create')">  
                    Add car
                </x-primary-button>
            @endif
            {{-- Create Modal --}}
            <x-modal name="car_create" :show="$errors->create_bag->isNotEmpty()" focusable>
                <form method="post" action="{{ route('car_create_post') }}"
                    class="mt-6 flex items-center flex-col gap-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <input type="hidden" x-model="car_id" name="car_id" class="block mt-1 w-full" />
                    <div class="flex flex-col">

                        <x-input-label for="manufacturer" :value="__('Manufacturer')" class="dark:text-gray-200" />
                        <select required id="manufacturer" name="manufacturer_id", x-model="manufacturer_id"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg  w-80">
                            <option hidden disabled selected value=""> -- select an option -- </option>
                            @foreach ($manufacturers as $manufacturer)
                                <option class="dark:text-gray-200 bg-white dark:bg-gray-800"
                                    value={{ $manufacturer->id }}
                                    :selected="manufacturer_id === {{ $manufacturer->id }}">
                                    {{ $manufacturer->manufacturer_name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->create_bag->get('manufacturer_id')" class="mt-2" />
                    </div>
                    <div class="flex flex-col">
                        <div>
                            <x-input-label for="car_model" :value="__('Model')" class="dark:text-gray-200" />
                            <x-text-input required id="car_model" name="car_model" class="field" x-model="car_model"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800  w-80" />
                        </div>
                        <div>
                            <x-input-error :messages="$errors->create_bag->get('car_model')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-between max-w-80 gap-y-4">
                        <div class="flex flex-col">
                            <x-input-label for="mtsurface_fender_distance" :value="__('Wheel-Fender Gap')"
                                class="dark:text-gray-200" />
                            <x-text-input required id="mtsurface_fender_distance" type="number"
                                name="mtsurface_fender_distance" x-model="mtsurface_fender_distance" step="0.1"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            <x-input-error :messages="$errors->create_bag->get('mtsurface_fender_distance')" class="mt-2 w-32" />
                        </div>
                        <div class="flex flex-col">
                            <x-input-label for="engine_size" :value="__('Engine size')" class="dark:text-gray-200" />
                            <x-text-input required id="engine_size" type="number" name="engine_size"
                                x-model="engine_size"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800  w-32" />
                            <x-input-error :messages="$errors->create_bag->get('engine_size')" class="mt-2 w-32" />
                        </div>
                        <div class="flex flex-col">
                            <x-input-label for="car_year" :value="__('Manufacturing year')" class="dark:text-gray-200" />
                            <x-text-input required id="car_year" type="number" name="car_year" x-model="car_year"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800  w-32" />
                            <x-input-error :messages="$errors->create_bag->get('car_year')" class="mt-2 w-32" />
                        </div>
                        <div class="flex flex-col">
                            <x-input-label for="center_bore" :value="__('Center_bore')" class="dark:text-gray-200" />
                            <x-text-input required id="center_bore" type="number" name="center_bore" step="0.1"
                                x-model="center_bore"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800  w-32" />
                            <x-input-error :messages="$errors->create_bag->get('center_bore')" class="mt-2 w-32" />
                        </div>
                    </div>


                    <x-input-label for="bolt_pattern" :value="__('Bolt pattern')" class="dark:text-gray-200" />
                    <select required id="bolt_pattern" name="bolt_pattern_id" x-model="bolt_pattern_id"
                        class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                        <option hidden disabled selected value=""> -- select an option -- </option>
                        @foreach ($boltPatterns as $boltPattern)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $boltPattern->id }}>
                                {{ $boltPattern->bolt_pattern }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->create_bag->get('bolt_pattern_id')" class="mt-2" />

                    <x-input-label for="nut_bolt" :value="__('Nut OR Bolt')" class="dark:text-gray-200" />
                    <select required id="nut_bolt" name="nut_bolt_id" x-model="nut_bolt_id"
                        class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                        <option hidden disabled selected value=""> -- select an option -- </option>
                        @foreach ($nutBolts as $nutBolt)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $nutBolt->id }}>
                                {{ $nutBolt->type }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->create_bag->get('nut_bolt_id')" class="mt-2" />

                    @if (Auth::check() && Auth::user()->is_admin)
                        <div class="flex flex-col">
                            <div class="flex justify-center gap-8">
                                <div class="flex items-center w-32">
                                    <label for="accepted-1"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Accepted</label>
                                    <input required id="accepted-1" type="radio" value="1" name="accepted"
                                        x-model="accepted"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="flex items-center w-32">
                                    <label for="accepted-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Not
                                        Accepted</label>
                                    <input id="accepted-2" type="radio" value="0" name="accepted"
                                        x-model="accepted"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </div>
                            <x-input-error :messages="$errors->create_bag->get('accepted')" class="mt-2 text-center" />
                        </div>
                    @elseif (Auth::check() && !Auth::user()->is_admin)
                        <x-text-input id="accepted" type="hidden" value=0 name="accepted"
                            class="block mt-1 mx-52" />
                    @endif
                    <input type="submit" value="upload"
                        class="mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                </form>
            </x-modal>
        </div>
    </x-slot>
    @php
        $car_data = session()->get('car_data', [
            'car_id' => 0,
            'manufacturer_id' => '',
            'car_model' => '',
            'engine_size' => 0,
            'car_year' => 0,
            'center_bore' => 0,
            'nut_bolt_id' => 1,
            'mtsurface_fender_distance' => 0,
            'bolt_pattern_id' => 1,
            'accepted' => 0,
            'updated_at' => now(),
        ]);
    @endphp
    <div x-data="{ car_id: '{{ $car_data['car_id'] }}', manufacturer_id: '{{ $car_data['manufacturer_id'] }}', car_model: '{{ $car_data['car_model'] }}', engine_size: '{{ $car_data['engine_size'] }}', car_year: {{ $car_data['car_year'] }}, center_bore: {{ $car_data['center_bore'] }}, nut_bolt_id: {{ $car_data['nut_bolt_id'] }}, mtsurface_fender_distance: {{ $car_data['mtsurface_fender_distance'] }}, bolt_pattern_id: {{ $car_data['bolt_pattern_id'] }}, accepted: {{ $car_data['accepted'] }} }">
        <div class="flex flex-row flex-wrap-reverse py-12 justify-center">
            @include('components.left-side-filters')
            <div class="w-3/4 mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                <div class="mb-5 -mt-4">
                </div>
                <h1 class="dark:text-white font-semibold text-xl text-center mb-5">Cars</h1>
                @foreach ($cars as $car)
                    @if ($car->car_id != 1)
                        <a href="cars/{{ $car->car_id }}">
                            <div
                                class="bg-white overflow-hidden flex flex-row shadow-sm sm:rounded-lg  {{ $car->CA == 0 ? 'dark:bg-red-600' : 'dark:bg-gray-800' }} dark:hover:bg-blue-900 mb-1">
                                <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                <svg class="my-auto pl-3" width="100px" height="100px" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 8L5.72187 10.2682C5.90158 10.418 6.12811 10.5 6.36205 10.5H17.6379C17.8719 10.5 18.0984 10.418 18.2781 10.2682L21 8M6.5 14H6.51M17.5 14H17.51M8.16065 4.5H15.8394C16.5571 4.5 17.2198 4.88457 17.5758 5.50772L20.473 10.5777C20.8183 11.1821 21 11.8661 21 12.5623V18.5C21 19.0523 20.5523 19.5 20 19.5H19C18.4477 19.5 18 19.0523 18 18.5V17.5H6V18.5C6 19.0523 5.55228 19.5 5 19.5H4C3.44772 19.5 3 19.0523 3 18.5V12.5623C3 11.8661 3.18166 11.1821 3.52703 10.5777L6.42416 5.50772C6.78024 4.88457 7.44293 4.5 8.16065 4.5ZM7 14C7 14.2761 6.77614 14.5 6.5 14.5C6.22386 14.5 6 14.2761 6 14C6 13.7239 6.22386 13.5 6.5 13.5C6.77614 13.5 7 13.7239 7 14ZM18 14C18 14.2761 17.7761 14.5 17.5 14.5C17.2239 14.5 17 14.2761 17 14C17 13.7239 17.2239 13.5 17.5 13.5C17.7761 13.5 18 13.7239 18 14Z"
                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <div class="p-6 pl-3 text-gray-900 dark:text-gray-100">
                                    <h1>Manufacturer: {{ $car->manufacturer_name }}</h1>
                                    <h1>Model :{{ $car->car_model }}</h1>
                                    <h1>Engine size :{{ $car->engine_size }}</h1>
                                    <h1>Manufactured :{{ $car->car_year }}</h1>
                                    <h1>Accepted:{{ $car->CA }}</h1>
                                </div>
                            </div>
                        </a>
                    @endif
                    <div class="flex justify-evenly text-center mb-5">
                        @can('delete', $car)
                            <form method="post" action="{{ route('car_delete_post') }}">
                                @csrf
                                @method('post')
                                <input type="hidden" value="{{ $car->car_id }}" name="car_id"
                                    class="block mt-1 w-full" />
                                <x-primary-button class="w-[20vw]">
                                    Delete car
                                </x-primary-button>
                            </form>
                        @endcan
                        @can('update', $car)
                            <x-primary-button class="w-[20vw]" x-data=""
                                x-on:click.prevent="$dispatch('open-modal','car_update_post'),
                                     car_id='{{ $car->car_id }}',
                                     manufacturer_id='{{ $car->manufacturer_id }}',
                                     car_model='{{ $car->car_model }}',
                                    engine_size={{ $car->engine_size }},
                                     car_year={{ $car->car_year }},
                                      center_bore={{ $car->center_bore }},
                                       nut_bolt_id={{ $car->nut_bolt_id }},
                                        mtsurface_fender_distance={{ $car->mtsurface_fender_distance }},
                                        bolt_pattern_id={{ $car->bolt_pattern_id }},
                                         accepted={{ $car->CA }}
                                        ">
                                Update car
                            </x-primary-button>
                        @endcan
                    </div>
                @endforeach
                {{ $cars->links() }}
            </div>
        </div>
        <div>
            @isset($car)
                {{-- Update Modal --}}
                <x-modal name="car_update_post" :show="$errors->update_bag->isNotEmpty()" focusable>
                    <form class="flex items-center flex-col gap-y-4" method="post"
                        action="{{ route('car_update_post') }}" class="mt-6 space-y-6 " enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <input type="hidden" x-model="car_id" name="car_id" class="block mt-1 w-full" />
                        <div>
                            <x-input-label for="manufacturer" :value="__('Manufacturer')" class="dark:text-gray-200 pt-3" />
                            <select id="manufacturer" name="manufacturer_id", x-model="manufacturer_id"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80">
                                @foreach ($manufacturers as $manufacturer)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80"
                                        value={{ $manufacturer->id }}
                                        :selected="manufacturer_id === {{ $manufacturer->id }}">
                                        {{ $manufacturer->manufacturer_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->update_bag->get('manufacturer_id')" class="mt-2 text-center" />
                        </div>
                        <div>
                            <x-input-label for="car_model" :value="__('Model')" class="dark:text-gray-200" />
                            <x-text-input required id="car_model" name="car_model" class="field" x-model="car_model"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80" />
                            <x-input-error :messages="$errors->update_bag->get('car_model')" class="mt-2 text-center" />
                        </div>
                        <div class="flex flex-wrap justify-between max-w-80 gap-y-4">
                            <div>
                                <x-input-label for="engine_size" :value="__('Engine size')" class="dark:text-gray-200" />
                                <x-text-input required id="engine_size" type="number" name="engine_size"
                                    x-model="engine_size"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                                <x-input-error :messages="$errors->update_bag->get('engine_size')" class="mt-2 w-32" />
                            </div>
                            <div class="max-w-32">
                                <x-input-label for="car_year" :value="__('Manufacturing year')" class="dark:text-gray-200" />
                                <x-text-input required id="car_year" type="number" name="car_year" x-model="car_year"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                                <x-input-error :messages="$errors->update_bag->get('car_year')" class="mt-2 w-32" />
                            </div>
                            <div>
                                <x-input-label for="center_bore" :value="__('Center bore')" class="dark:text-gray-200" />
                                <x-text-input required id="center_bore" type="number" step="0.1" name="center_bore"
                                    x-model="center_bore"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                                <x-input-error :messages="$errors->update_bag->get('center_bore')" class="mt-2 w-32" />
                            </div>
                            <div>
                                <x-input-label for="mtsurface_fender_distance" :value="__('Wheel-Fender Gap')"
                                    class="dark:text-gray-200" />
                                <x-text-input required id="mtsurface_fender_distance" type="number"
                                    name="mtsurface_fender_distance" x-model="mtsurface_fender_distance"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                                <x-input-error :messages="$errors->update_bag->get('mtsurface_fender_distance')" class="mt-2 w-32" />
                            </div>
                        </div>
                        <div>
                            <x-input-label for="bolt_pattern" :value="__('Bolt pattern')" class="dark:text-gray-200" />
                            <select id="bolt_pattern" name="bolt_pattern_id" x-model="bolt_pattern_id"
                                class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                                @foreach ($boltPatterns as $boltPattern)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80"
                                        value={{ $boltPattern->id }}>
                                        {{ $boltPattern->bolt_pattern }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->update_bag->get('bolt_pattern_id')" class="mt-2 w-32" />
                        </div>
                        <div>
                            <x-input-label for="nut_bolt" :value="__('Nut OR Bolt')" class="dark:text-gray-200" />
                            <select id="nut_bolt" name="nut_bolt_id" x-model="nut_bolt_id"
                                class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                                @foreach ($nutBolts as $nutBolt)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80"
                                        value={{ $nutBolt->id }}>
                                        {{ $nutBolt->type }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->update_bag->get('nut_bolt_id')" class="mt-2 w-32" />
                        </div>
                        <div>
                            @if (Auth::check() && Auth::user()->is_admin)
                                <div class="flex justify-center gap-8 mt-5">
                                    <div class="flex items-center">
                                        <label for="accepted-1"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Accepted</label>
                                        <input id="accepted-1" type="radio" value="1" name="accepted"
                                            x-model="accepted"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="accepted-2"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Not
                                            Accepted</label>
                                        <input id="accepted-2" type="radio" value="0" name="accepted"
                                            x-model="accepted"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <x-input-error :messages="$errors->update_bag->get('accepted')" class="mt-2 w-32" />
                                </div>
                            @endif
                        </div>
                        <div>
                            <input type="submit" value="upload"
                                class="mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                        </div>
                    </form>
                </x-modal>
            @endisset
        </div>
    </div>
</x-app-layout>
