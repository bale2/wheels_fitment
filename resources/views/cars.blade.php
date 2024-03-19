<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Cars') }}
            </h2>
            @if (Auth::user())
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal','car_create')">
                    Adding a car
                </x-primary-button>
            @endif
        </div>
    </x-slot>
    <div x-data="{ car_id: '', manufacturer_id: '', car_model: '', engine_size: 0, car_year: 0, center_bore: 0, thread_size: '', mtsurface_fender_distance: 0, bolt_pattern_id: 0 }">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                @foreach ($cars as $car)
                    @if ($car->id != 1)
                        <a href="car/{{ $car->id }}">
                            <div
                                class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 mb-12">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h1>ID: {{ $car->id }}</h1>
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                                        {{ $car->title }}
                                    </h1>
                                    <h1>Gyártó: {{ $car->manufacturer->manufacturer_name }}</h1>
                                    <h1>Model :{{ $car->car_model }}</h1>
                                    <h1>Car year :{{ $car->mtsurface_fender_distance }}</h1>
                                    <h1>Accepted :{{ $car->created_at }}</h1>
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
                                <x-primary-button x-data="" {{-- x-on:click.prevent="$dispatch('open-modal','car_update_post'),car_id={{ $car->id }},manufacturer_id={{ $car->manufacturer->id }},model='{{ $car->model }}', price={{ $car->price }}, car_type_id={{ $car->car_type_id }}, diameter={{ $car->diameter }}, width={{ $car->width }}, ET_number={{ $car->ET_number }}, bolt_pattern_id={{ $car->bolt_pattern_id }}, kba_number='{{ $car->kba_number }}', center_bore={{ $car->center_bore }}, nut_bolt_id={{ $car->nut_bolt_id }}, multipiece={{ $car->multipiece }}, note='{{ $car->note }}', accepted='{{ $car->accepted }}'"> --}}
                                    x-on:click.prevent="$dispatch('open-modal','car_update_post'), id='{{ $car->id }}', car_make='{{ $car->manufacturer_id }}', car_model='{{ $car->car_model }}', engine_size={{ $car->engine_size }}, center_bore={{ $car->center_bore }}, thread_size='{{ $car->thread_size }}', mtsurface_fender_distance={{ $car->mtsurface_fender_distance }}, bolt_pattern_id={{ $car->bolt_pattern_id }}, accepted={{ $car->accepted }}">
                                    Update car
                                </x-primary-button>
                            @endcan
                        </div>
                    @endif
                @endforeach
                {{ $cars->links() }}
            </div>
        </div>
        <div class="text-center">
            @isset($car)
                <x-modal name="car_create" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('car_create_post') }}" class="mt-6 space-y-6 "
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <input type="hidden" name="car_id" class="block mt-1 w-full" />

                        <x-input-label for="manufacturer" :value="__('Manufacturer')" class="dark:text-gray-200" />
                        <select id="manufacturer" name="manufacturer_id"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg">
                            @foreach ($manufacturers as $manufacturer)
                                <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $manufacturer->id }}
                                    :selected="manufacturer_id === {{ $manufacturer->id }}">
                                    {{ $manufacturer->manufacturer_name }}</option>
                            @endforeach
                        </select>

                        <x-input-label for="car_model" :value="__('Model')" class="dark:text-gray-200" />
                        <x-text-input id="car_model" name="car_model" class="field"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="engine_size" :value="__('Engine size')" class="dark:text-gray-200" />
                        <x-text-input id="engine_size" type="number" name="engine_size"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="car_year" :value="__('Manufacturing year')" class="dark:text-gray-200" />
                        <x-text-input id="car_year" type="number" name="car_year"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="center_bore" :value="__('Center_bore')" class="dark:text-gray-200" />
                        <x-text-input id="center_bore" type="number" name="center_bore"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="threadSizes" :value="__('Nut OR Bolt')" class="dark:text-gray-200" />
                        <select id="threadSizes" name="thread_size"
                            class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent">
                            @foreach ($threadSizes as $nutBolt)
                                <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $nutBolt->id }}>
                                    {{ $nutBolt->type }}</option>
                            @endforeach
                        </select>

                        <x-input-label for="mtsurface_fender_distance" :value="__('Space between wheel and fender')" class="dark:text-gray-200" />
                        <x-text-input id="mtsurface_fender_distance" type="number" name="mtsurface_fender_distance"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="bolt_pattern" :value="__('Bolt pattern')" class="dark:text-gray-200" />
                        <select id="bolt_pattern" name="bolt_pattern_id"
                            class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent">
                            @foreach ($boltPatterns as $boltPattern)
                                <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $boltPattern->id }}>
                                    {{ $boltPattern->bolt_pattern }}</option>
                            @endforeach
                        </select>


                        <input type="submit" value="feltöltés"
                            class="mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                    </form>
                </x-modal>
            @endisset
        </div>
    </div>
</x-app-layout>
