<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Cars') }}
            </h2>
            @if (Auth::user())
                <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                    <a href="/wheel_create">Kerék hozzáadása</a>
                </div>
            @endif
        </div>
    </x-slot>
    <div x-data="{ wheel_id: '', manufacturer_id: 0, model: '', price: 0, wheel_type_id: 0, diameter: 0, width: 0, ET_number: 0, bolt_pattern_id: 0, kba_number: '', center_bore: 0, nut_bolt_id: 0, multipiece: 0, note: '', accepted: 0 }">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                @foreach ($wheels as $wheel)
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
                        <div class="grid grid-cols-2 text-center">
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
                                <x-primary-button x-data="" {{-- x-on:click.prevent="$dispatch('open-modal','wheel_update_post'),wheel_id={{ $wheel->id }},manufacturer_id={{ $wheel->manufacturer->id }},model='{{ $wheel->model }}', price={{ $wheel->price }}, wheel_type_id={{ $wheel->wheel_type_id }}, diameter={{ $wheel->diameter }}, width={{ $wheel->width }}, ET_number={{ $wheel->ET_number }}, bolt_pattern_id={{ $wheel->bolt_pattern_id }}, kba_number='{{ $wheel->kba_number }}', center_bore={{ $wheel->center_bore }}, nut_bolt_id={{ $wheel->nut_bolt_id }}, multipiece={{ $wheel->multipiece }}, note='{{ $wheel->note }}', accepted='{{ $wheel->accepted }}'"> --}}
                                    x-on:click.prevent="$dispatch('open-modal','wheel_update_post'),wheel_id='{{ $wheel->id }}', manufacturer_id='{{ $wheel->manufacturer_id }}',model='{{ $wheel->model }}',price={{ $wheel->price }},wheel_type_id={{ $wheel->wheel_type_id }},diameter={{ $wheel->diameter }},width={{ $wheel->width }},ET_number={{ $wheel->ET_number }}, bolt_pattern_id={{ $wheel->bolt_pattern_id }}, kba_number='{{ $wheel->kba_number }}', center_bore={{ $wheel->center_bore }}, nut_bolt_id={{ $wheel->nut_bolt_id }}, multipiece={{ $wheel->multipiece }}, note='{{ $wheel->note }}', accepted='{{ $wheel->accepted }}'">
                                    Update wheel
                                </x-primary-button>
                            @endcan
                        </div>
                    @endif
                @endforeach
                {{ $wheels->links() }}
            </div>
        </div>
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

                        <x-input-label for="model" :value="__('Model')" class="dark:text-gray-200" />
                        <x-text-input x-model="model" id="model" name="model" class="field"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="price" :value="__('Price')" class="dark:text-gray-200" />
                        <x-text-input x-model="price" id="price" name="price" class="field" type="number"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="wheel_type_id" :value="__('wheel_type_id')" class="dark:text-gray-200" />
                        <x-text-input x-model="wheel_type_id" id="wheel_type_id" type="number" name="wheel_type_id"
                            class="field" class="dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="diameter" :value="__('Diameter')" class="dark:text-gray-200" />
                        <x-text-input x-model="diameter" id="diameter" name="diameter" class="field"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="width" :value="__('Width')" class="dark:text-gray-200" />
                        <x-text-input x-model="width" id="width" type="number" name="width"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="ET_number" :value="__('ET_number')" class="dark:text-gray-200" />
                        <x-text-input x-model="ET_number" id="ET_number" type="number" name="ET_number"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="bolt_pattern_id" :value="__('Bolt_pattern_id')" class="dark:text-gray-200" />
                        <x-text-input x-model="bolt_pattern_id" id="bolt_pattern_id" type="number" name="bolt_pattern_id"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="kba_number" :value="__('KBA number')" class="dark:text-gray-200" />
                        <x-text-input x-model="kba_number" id="kba_number" name="kba_number"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="center_bore" :value="__('Centerbore')" class="dark:text-gray-200" />
                        <x-text-input x-model="center_bore" id="center_bore" name="center_bore"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="nut_bolt_id" :value="__('Nut_bolt_id')" class="dark:text-gray-200" />
                        <x-text-input x-model="nut_bolt_id" id="nut_bolt_id" name="nut_bolt_id"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        <x-input-label for="multipiece" :value="__('Multipiece')" class="dark:text-gray-200" />
                        <x-text-input type="checkbox" id="multipiece" name="multipiece"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        {{-- <x-input-label for="photo" :value="__('Photo')" class="dark:text-gray-200" />
                    <x-text-input id="photo" name="photo[]" multiple type="file"
                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800" /> --}}

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
</x-app-layout>
