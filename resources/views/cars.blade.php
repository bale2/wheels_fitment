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
    <div x-data="{ id: '', car_make: '', car_model: '', engine_size: 0, center_bore: 0, thread_size: '', mtsurface_fender_distance: 0, bolt_pattern_id: 0, accepted: 0 }">
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
                                    x-on:click.prevent="$dispatch('open-modal','car_update_post'), id='{{ $car->id }}', car_make='{{ $car->car_make }}', car_model='{{ $car->car_model }}', engine_size={{ $car->engine_size }}, center_bore={{ $car->center_bore }}, thread_size='{{ $car->thread_size }}', mtsurface_fender_distance={{ $car->mtsurface_fender_distance }}, bolt_pattern_id={{ $car->bolt_pattern_id }}, accepted={{ $car->accepted }}">
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

                <x-modal name="car_update_post" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('car_update_post') }}" class="mt-6 space-y-6 "
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <input type="hidden" x-model="car_id" name="car_id" class="block mt-1 w-full" />

                        <x-input-label for="manufacturer_id" :value="__('Manufacturer')" class="dark:text-gray-200" />
                        <select id="manufacturer_id" name="manufacturer_id"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg">
                            @foreach ($manufacturers as $manufacturer)
                                <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $manufacturer->id }}
                                    :selected="manufacturer_id === {{ $manufacturer->id }}">
                                    {{ $manufacturer->manufacturer_name }}</option>
                            @endforeach
                        </select>

                        <x-input-label for="model" :value="__('Model')" class="dark:text-gray-200" />
                        <x-text-input x-model="model" id="model" name="model" class="field"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="bolt_pattern_id" :value="__('Bolt_pattern_id')" class="dark:text-gray-200" />
                        <x-text-input x-model="bolt_pattern_id" id="bolt_pattern_id" type="number" name="bolt_pattern_id"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        {{-- <x-input-label for="photo" :value="__('Photo')" class="dark:text-gray-200" />
                    <x-text-input id="photo" name="photo[]" multiple type="file"
                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800" /> --}}


                        @if (Auth::check() && Auth::user()->is_admin)
                            <x-input-label for="accepted" :value="__('Accepted')" class="dark:text-gray-200" />
                            <input type="checkbox" id="accepted" @checked($car->accepted) name="accepted"
                                class="block mx-auto rounded-2xl dark:text-gray-200 bg-white dark:bg-gray-800" />
                        @endif

                        <input type="submit" value="feltöltés"
                            class="mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                    </form>
                </x-modal>
            @endisset
        </div>
    </div>
</x-app-layout>
