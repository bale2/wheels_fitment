<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Wheels Page') }}
            </h2>
            @if (Auth::user())
                <div
                    class="bg-slate-200 font-semibold text-xl text-gray-800 leading-tight rounded-3xl px-5 text-center max-w-fit mx-auto">
                    <a href="/wheel_create">Add wheel</a>
                </div>
            @endif
        </div>
    </x-slot>
    <div x-data="{ wheel_id: '', manufacturer_id: 0, model: '', price: 0, wheel_type_id: 0, diameter: 0, width: 0, ET_number: 0, bolt_pattern_id: 0, kba_number: '', center_bore: 0, nut_bolt_id: 0, multipiece: 0, note: '', accepted: 0 }">
        <div class="flex flex-row flex-wrap-reverse py-12 justify-center">
            @include('components.left-side-filters')
            <div class="w-3/4 mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                <h1 class="dark:text-white font-semibold text-xl text-center mb-5">Wheels</h1>
                @foreach ($wheels as $wheel)
                    @if ($wheel->id != 1)
                        <a href="wheels/{{ $wheel->id }}">
                            <div
                                class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 mb-1 dark:hover:bg-blue-900">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                                        {{ $wheel->title }}
                                    </h1>
                                    <h1>Manufacturer: {{ $wheel->manufacturer->manufacturer_name }}</h1>
                                    <h1>Model :{{ $wheel->model }}</h1>
                                    <h1>Bolt pattern:{{ $wheel->boltPattern->bolt_pattern }}</h1>
                                    <h1>Diameter: {{ $wheel->diameter }} &emsp; Width: {{ $wheel->width }}</h1>
                                </div>
                                <div>
                                    <img src="{{ asset('photos/' . $wheel->photos()[0]) }}" alt="image of the ad"
                                        class="mt-10 mb-auto mx-auto h-20 w-auto ">
                                </div>
                            </div>
                        </a>
                        <div class="flex justify-evenly text-center mb-5">
                            @can('delete', $wheel)
                                <form method="post" action="{{ route('wheel_delete_post') }}">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" value="{{ $wheel->id }}" name="wheel_id"
                                        class="block mt-1 w-full" />
                                    <x-primary-button class="w-[20vw]">
                                        Delete wheel
                                    </x-primary-button>
                                </form>
                            @endcan
                            @can('update', $wheel)
                                <x-primary-button class="w-[20vw]" x-data="" {{-- x-on:click.prevent="$dispatch('open-modal','wheel_update_post'),wheel_id={{ $wheel->id }},manufacturer_id={{ $wheel->manufacturer->id }},model='{{ $wheel->model }}', price={{ $wheel->price }}, wheel_type_id={{ $wheel->wheel_type_id }}, diameter={{ $wheel->diameter }}, width={{ $wheel->width }}, ET_number={{ $wheel->ET_number }}, bolt_pattern_id={{ $wheel->bolt_pattern_id }}, kba_number='{{ $wheel->kba_number }}', center_bore={{ $wheel->center_bore }}, nut_bolt_id={{ $wheel->nut_bolt_id }}, multipiece={{ $wheel->multipiece }}, note='{{ $wheel->note }}', accepted='{{ $wheel->accepted }}'"> --}}
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
                    <form method="post" action="{{ route('wheel_update_post') }}"
                        class="flex items-center flex-col gap-y-4" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <input type="hidden" x-model="wheel_id" name="wheel_id" class="block mt-1 w-full" />

                        <div>
                            <x-input-label for="manufacturer" :value="__('Manufacturer')" class="dark:text-gray-200 pt-3" />
                            <select required id="manufacturer" name="manufacturer_id", x-model="manufacturer_id"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80">
                                @foreach ($manufacturers as $manufacturer)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80"
                                        value={{ $manufacturer->id }}
                                        :selected="manufacturer_id === {{ $manufacturer->id }}">
                                        {{ $manufacturer->manufacturer_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="model" :value="__('Model')" class="dark:text-gray-200" />
                            <x-text-input required x-model="model" id="model" name="model" class="field"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80" />
                        </div>
                        <div class="flex flex-wrap justify-between max-w-80 gap-y-4">
                            <div>
                                <x-input-label for="price" :value="__('Price')" class="dark:text-gray-200" />
                                <x-text-input required x-model="price" id="price" name="price" class="field"
                                    type="number" class="dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div>
                                <x-input-label for="diameter" :value="__('Diameter')" class="dark:text-gray-200" />
                                <x-text-input required x-model="diameter" id="diameter" name="diameter" class="field"
                                    class="dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div>
                                <x-input-label for="width" :value="__('Width')" class="dark:text-gray-200" />
                                <x-text-input required x-model="width" id="width" type="number" name="width"
                                    class="dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div>
                                <x-input-label for="ET_number" :value="__('ET_number')" class="dark:text-gray-200" />
                                <x-text-input required x-model="ET_number" id="ET_number" type="number" name="ET_number"
                                    class="dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>

                            <div>
                                <x-input-label for="kba_number" :value="__('KBA number')" class="dark:text-gray-200" />
                                <x-text-input required x-model="kba_number" id="kba_number" name="kba_number"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div>
                                <x-input-label for="center_bore" :value="__('Centerbore')" class="dark:text-gray-200" />
                                <x-text-input required x-model="center_bore" id="center_bore" name="center_bore"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div class="flex justify-center gap-8 w-80">
                                <div class="flex items-center">
                                    <label for="multipiece-0"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Single
                                        Piece</label>
                                    <input required id="multipiece-1" type="radio" value="0" name="multipiece"
                                        x-model="multipiece"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="flex items-center">
                                    <label for="multipiece-1"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Multipiece
                                    </label>
                                    <input id="multipiece-1" type="radio" value="1" name="multipiece"
                                        x-model="multipiece"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </div>
                        </div>
                        <div>

                            <x-input-label for="wheel_type_id" :value="__('Wheel Type')" class="dark:text-gray-200" />
                            <select required id="wheel_type_id" name="wheel_type_id" x-model="wheel_type_id"
                                class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                                @foreach ($wheelTypes as $wheelType)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80"
                                        value={{ $wheelType->id }}>
                                        {{ $wheelType->wheel_type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="bolt_pattern" :value="__('Bolt pattern')" class="dark:text-gray-200" />
                            <select required id="bolt_pattern" name="bolt_pattern_id" x-model="bolt_pattern_id"
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
                            <select required id="nut_bolt" name="nut_bolt_id" x-model="nut_bolt_id"
                                class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                                @foreach ($nutBolts as $nutBolt)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80"
                                        value={{ $nutBolt->id }}>
                                        {{ $nutBolt->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-label for="note" :value="__('Note')" class="dark:text-gray-200 mt-5" />
                        <textarea required id="note" type="text" value="{{ old('note') }}" x-model="note" name="note"
                            class="w-80 resize-y border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm ">{{ old('description') }}</textarea>
                        @error('note')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror

                        @if (Auth::check() && Auth::user()->is_admin)
                            <div class="flex justify-center gap-8 mt-5">
                                <div class="flex items-center">
                                    <label for="accepted-1"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Accepted
                                    </label>
                                    <input id="accepted-1" type="radio" value="1" name="accepted"
                                        x-model="accepted"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="flex items-center">
                                    <label for="accepted-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Not
                                        accepted
                                    </label>
                                    <input required id="accepted-2" type="radio" value="0" name="accepted"
                                        x-model="accepted"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </div>
                        @endif
                        <input type="submit" value="upload"
                            class="mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                    </form>
                </x-modal>
            @endisset
        </div>
    </div>
</x-app-layout>
