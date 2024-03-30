<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2" x-data="{ car_id: '', manufacturer_id: '', car_model: '', engine_size: '', car_year: '', center_bore: '', nut_bolt_id: '', mtsurface_fender_distance: '', bolt_pattern_id: 0 }">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Cars') }}
            </h2>
            @if (Auth::user())
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal','car_create')">
                    Adding a car
                </x-primary-button>
            @endif
            {{-- Create Modal --}}
            <x-modal name="car_create" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('car_create_post') }}"
                    class="mt-6 flex items-center flex-col gap-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <input type="hidden" x-model="car_id" name="car_id" class="block mt-1 w-full" />

                    <x-input-label for="manufacturer" :value="__('Manufacturer')" class="dark:text-gray-200" />
                    <select id="manufacturer" name="manufacturer_id", x-model="manufacturer_id"
                        class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg  w-80">
                        <option hidden disabled selected value> -- select an option -- </option>
                        @foreach ($manufacturers as $manufacturer)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $manufacturer->id }}
                                :selected="manufacturer_id === {{ $manufacturer->id }}">
                                {{ $manufacturer->manufacturer_name }}</option>
                        @endforeach
                    </select>

                    <x-input-label for="car_model" :value="__('Model')" class="dark:text-gray-200" />
                    <x-text-input id="car_model" name="car_model" class="field" x-model="car_model"
                        class="dark:text-gray-200 bg-white dark:bg-gray-800  w-80" />


                    <div class="flex flex-wrap justify-between max-w-80 gap-y-4">
                        <div>
                            <x-input-label for="mtsurface_fender_distance" :value="__('Wheel-Fender Gap')"
                                class="dark:text-gray-200" />
                            <x-text-input id="mtsurface_fender_distance" type="number" name="mtsurface_fender_distance"
                                x-model="mtsurface_fender_distance"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                        </div>
                        <div>
                            <x-input-label for="engine_size" :value="__('Engine size')" class="dark:text-gray-200" />
                            <x-text-input id="engine_size" type="number" name="engine_size" x-model="engine_size"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800  w-32" />
                        </div>
                        <div>
                            <x-input-label for="car_year" :value="__('Manufacturing year')" class="dark:text-gray-200" />
                            <x-text-input id="car_year" type="number" name="car_year" x-model="car_year"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800  w-32" />

                        </div>
                        <div>
                            <x-input-label for="center_bore" :value="__('Center_bore')" class="dark:text-gray-200" />
                            <x-text-input id="center_bore" type="number" name="center_bore" x-model="center_bore"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800  w-32" />
                        </div>
                    </div>


                    <x-input-label for="bolt_pattern" :value="__('Bolt pattern')" class="dark:text-gray-200" />
                    <select id="bolt_pattern" name="bolt_pattern_id" x-model="bolt_pattern_id"
                        class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                        @foreach ($boltPatterns as $boltPattern)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $boltPattern->id }}>
                                {{ $boltPattern->bolt_pattern }}</option>
                        @endforeach
                    </select>

                    <x-input-label for="nut_bolt" :value="__('Nut OR Bolt')" class="dark:text-gray-200" />
                    <select id="nut_bolt" name="nut_bolt_id" x-model="nut_bolt_id"
                        class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                        @foreach ($nutBolts as $nutBolt)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $nutBolt->id }}>
                                {{ $nutBolt->type }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="feltöltés"
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
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                @foreach ($cars as $car)
                    @if ($car->id != 1)
                        <a href="cars/{{ $car->id }}">
                            <div
                                class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 mb-12">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h1>ID: {{ $car->id }}</h1>
                                    <h1>Gyártó: {{ $car->manufacturer->manufacturer_name }}</h1>
                                    <h1>Model :{{ $car->car_model }}</h1>
                                    <h1>Engine size :{{ $car->engine_size }}</h1>
                                    <h1>Manufactured :{{ $car->car_year }}</h1>
                                    <h1>Center Bore :{{ $car->center_bore }}</h1>
                                    <h1>Thread Size :{{ $car->nutBolt->type }}</h1>
                                    <h1>Space for wheel :{{ $car->mtsurface_fender_distance }}</h1>
                                    <h1>bolt_pattern :{{ $car->boltPattern->bolt_pattern }}</h1>
                                </div>
                            </div>
                        </a>
                        <div class="grid grid-cols-2 text-center">
                            @can('delete', $car)
                                <form method="post" action="{{ route('car_delete_post') }}">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" value="{{ $car->id }}" name="car_id"
                                        class="block mt-1 w-full" />
                                    <x-primary-button>
                                        Delete car
                                    </x-primary-button>
                                </form>
                            @endcan
                            @can('update', $car)
                                <x-primary-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal','car_update_post'),
                                     car_id='{{ $car->id }}',
                                     manufacturer_id='{{ $car->manufacturer_id }}',
                                     car_model='{{ $car->car_model }}',
                                    engine_size={{ $car->engine_size }},
                                     car_year={{ $car->car_year }},
                                      center_bore={{ $car->center_bore }},
                                       nut_bolt_id={{ $car->nut_bolt_id }},
                                        mtsurface_fender_distance={{ $car->mtsurface_fender_distance }},
                                        bolt_pattern_id={{ $car->bolt_pattern_id }},
                                         accepted={{ $car->accepted }}
                                        ">
                                    Update car{{ $car->accepted }}
                                </x-primary-button>
                            @endcan
                        </div>
                    @endif
                @endforeach
                {{ $cars->links() }}
            </div>
        </div>
        <div>
            @isset($car)
                {{-- Update Modal --}}
                <x-modal name="car_update_post" :show="$errors->kuki->isNotEmpty()" focusable>
                    <form class="flex items-center flex-col gap-y-4" method="post" action="{{ route('car_update_post') }}"
                        class="mt-6 space-y-6 " enctype="multipart/form-data">
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
                            {{-- @foreach ($car_data as $k => $v)
                                {{ $k }} => {{ $v }} <br>
                            @endforeach --}}
                        </div>
                        <div>
                            <x-input-label for="car_model" :value="__('Model')" class="dark:text-gray-200" />
                            <x-text-input id="car_model" name="car_model" class="field" x-model="car_model"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80" />
                        </div>
                        <div class="flex flex-wrap justify-between max-w-80 gap-y-4">
                            <div>
                                <x-input-label for="engine_size" :value="__('Engine size')" class="dark:text-gray-200" />
                                <x-text-input id="engine_size" type="number" name="engine_size" x-model="engine_size"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div class="max-w-32">
                                <x-input-label for="car_year" :value="__('Manufacturing year')" class="dark:text-gray-200" />
                                <x-text-input id="car_year" type="number" name="car_year" x-model="car_year"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                                <x-input-error :messages="$errors->kuki->get('car_year')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="center_bore" :value="__('Center bore')" class="dark:text-gray-200" />
                                <x-text-input id="center_bore" type="number" step="0.1" name="center_bore"
                                    x-model="center_bore"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div>
                                <x-input-label for="mtsurface_fender_distance" :value="__('Wheel-Fender Gap')"
                                    class="dark:text-gray-200" />
                                <x-text-input id="mtsurface_fender_distance" type="number"
                                    name="mtsurface_fender_distance" x-model="mtsurface_fender_distance"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
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
                        </div>
                        <div>
                            @if (Auth::check() && Auth::user()->is_admin)
                                <x-input-label for="accepted" :value="__('Accepted')" class="dark:text-gray-200" />
                                <input type="checkbox" name="accepted" id="accepted" @checked($car->accepted)
                                    class="block mx-auto rounded-2xl dark:text-gray-200 bg-white dark:bg-gray-800" />
                            @endif
                        </div>
                        {{ $car->accepted }}
                        <div>
                            <input type="submit" value="feltöltés"
                                class="mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                        </div>
                    </form>
                </x-modal>
            @endisset
        </div>
    </div>
</x-app-layout>
