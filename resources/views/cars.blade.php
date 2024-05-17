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
            <x-modal name="car_create" :show="$errors->isNotEmpty()" focusable>
                <form method="post" action="{{ route('car_create_post') }}"
                    class="mt-6 flex items-center flex-col gap-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <input type="hidden" x-model="car_id" name="car_id" class="block mt-1 w-full" />
                    <div class="flex flex-col">

                        <x-input-label for="manufacturer" :value="__('Manufacturer')" class="dark:text-gray-200" />
                        <select id="manufacturer" name="manufacturer_id", x-model="manufacturer_id"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg  w-80">
                            <option hidden disabled selected value=""> -- select an option -- </option>
                            @foreach ($manufacturers as $manufacturer)
                                <option class="dark:text-gray-200 bg-white dark:bg-gray-800"
                                    value={{ $manufacturer->id }}
                                    :selected="manufacturer_id === {{ $manufacturer->id }}">
                                    {{ $manufacturer->manufacturer_name }}</option>
                            @endforeach
                        </select>

                        @error('manufacturer_id')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <div>
                            <x-input-label for="car_model" :value="__('Model')" class="dark:text-gray-200" />
                            <x-text-input id="car_model" name="car_model" class="field" x-model="car_model"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800  w-80" />
                        </div>
                        <div>
                            @error('car_model')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-between max-w-80 gap-y-4">
                        <div class="flex flex-col">
                            <x-input-label for="mtsurface_fender_distance" :value="__('Wheel-Fender Gap')"
                                class="dark:text-gray-200" />
                            <x-text-input id="mtsurface_fender_distance" type="number" name="mtsurface_fender_distance"
                                x-model="mtsurface_fender_distance" step="0.1"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            @error('mtsurface_fender_distance')
                                <small class="text-red-600 max-w-32">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-label for="engine_size" :value="__('Engine size')" class="dark:text-gray-200" />
                            <x-text-input id="engine_size" type="number" name="engine_size" x-model="engine_size"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800  w-32" />
                            @error('engine_size')
                                <small class="text-red-600 w-32">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-label for="car_year" :value="__('Manufacturing year')" class="dark:text-gray-200" />
                            <x-text-input id="car_year" type="number" name="car_year" x-model="car_year"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800  w-32" />
                            @error('car_year')
                                <small class="text-red-600 w-32">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <x-input-label for="center_bore" :value="__('Center_bore')" class="dark:text-gray-200" />
                            <x-text-input id="center_bore" type="number" name="center_bore" step="0.1"
                                x-model="center_bore"
                                class=" field dark:text-gray-200 bg-white dark:bg-gray-800  w-32" />
                            @error('center_bore')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <x-input-label for="bolt_pattern" :value="__('Bolt pattern')" class="dark:text-gray-200" />
                    <select id="bolt_pattern" name="bolt_pattern_id" x-model="bolt_pattern_id"
                        class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                        <option hidden disabled selected value=""> -- select an option -- </option>
                        @foreach ($boltPatterns as $boltPattern)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $boltPattern->id }}>
                                {{ $boltPattern->bolt_pattern }}</option>
                        @endforeach
                    </select>
                    @error('bolt_pattern_id')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror

                    <x-input-label for="nut_bolt" :value="__('Nut OR Bolt')" class="dark:text-gray-200" />
                    <select id="nut_bolt" name="nut_bolt_id" x-model="nut_bolt_id"
                        class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                        <option hidden disabled selected value=""> -- select an option -- </option>
                        @foreach ($nutBolts as $nutBolt)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value={{ $nutBolt->id }}>
                                {{ $nutBolt->type }}</option>
                        @endforeach
                    </select>
                    @error('nut_bolt_id')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                    @if (Auth::check() && Auth::user()->is_admin)
                        <div class="flex justify-center gap-8 mt-5">
                            <div class="flex items-center">
                                <label for="accepted-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Accepted</label>
                                <input id="accepted-1" type="radio" value="1" name="accepted" x-model="accepted"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                            <div class="flex items-center">
                                <label for="accepted-2"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Not
                                    Accepted</label>
                                <input checked id="accepted-2" type="radio" value="0" name="accepted"
                                    x-model="accepted"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
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
            <div class="md:w-1/4 md:border-r-2 border-white">
                {{-- md:érték -> md mérettől felfelé alkalmazza --}}
                <h1 class="dark:text-white font-semibold text-xl text-center mb-5">Filters</h1>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg mb-10">
                    <div class="overflow-hidden shadow-sm">
                        <a href="bolt_patterns/cars">
                            <div class="flex flex-row sm:rounded-lg text-center  mb-2 bg-gray-800">
                                <?xml version="1.0" standalone="no"?>
                                <!DOCTYPE svg
                                    PUBLIC "-//W3C//DTD SVG 20010904//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                                <svg class="mt-2 w-1/4 pr-0 " version="1.0" xmlns="http://www.w3.org/2000/svg"
                                    width="50px" height="50px" viewBox="0 0 283.000000 289.000000"
                                    preserveAspectRatio="xMidYMid meet">
                                    <metadata>
                                        Created by potrace 1.10, written by Peter Selinger 2001-2011
                                    </metadata>
                                    <g transform="translate(0.000000,289.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path d="M0 2880 c0 -7 478 -10 1415 -10 937 0 1415 3 1415 10 0 7 -478 10
        -1415 10 -937 0 -1415 -3 -1415 -10z" />
                                        <path d="M780 2411 l0 -380 -60 -68 c-90 -101 -211 -318 -225 -403 -4 -25 -11
        -52 -15 -60 -13 -24 -29 -166 -31 -260 -1 -92 17 -258 30 -275 5 -5 11 -28 15
        -50 4 -22 13 -53 21 -70 81 -175 99 -209 154 -289 61 -88 229 -243 311 -286
        26 -14 53 -30 61 -37 8 -6 55 -28 104 -48 92 -37 179 -59 295 -75 75 -10 289
        -3 305 10 6 5 20 9 30 9 82 0 269 75 400 160 199 131 366 359 450 614 24 73
        52 285 46 347 -15 153 -31 262 -41 275 -4 6 -11 26 -15 45 -4 19 -11 41 -16
        50 -4 8 -26 55 -49 103 -23 48 -60 111 -81 140 l-39 51 0 432 c0 385 -2 433
        -16 438 -9 3 -18 6 -20 6 -2 0 -4 -185 -4 -412 l0 -412 -47 50 c-148 154 -338
        259 -563 312 -122 29 -383 23 -485 -10 -16 -5 -52 -16 -80 -23 -101 -27 -303
        -142 -359 -204 -11 -12 -22 -21 -25 -21 -3 0 -6 161 -6 358 l0 357 -22 3 -23
        3 0 -380z m939 -150 c102 -15 181 -40 286 -92 118 -59 264 -173 343 -267 l42
        -50 0 -195 c0 -164 -2 -196 -15 -201 -8 -3 -15 -15 -15 -26 0 -12 -4 -19 -9
        -15 -5 3 -12 -4 -16 -15 -6 -19 -10 -22 -37 -24 -7 -1 -16 -5 -19 -10 -11 -14
        -42 2 -36 19 4 9 1 12 -7 9 -19 -7 -28 68 -9 79 7 4 13 15 13 22 0 18 39 20
        75 3 14 -6 25 -17 25 -25 0 -18 19 -16 27 3 10 27 -39 66 -87 69 -35 2 -47 -3
        -76 -30 -27 -25 -34 -40 -34 -69 0 -50 23 -91 61 -110 40 -20 48 -20 86 -1 41
        21 54 38 55 74 2 52 18 34 18 -19 0 -45 2 -50 23 -50 l22 0 -5 212 c-5 219 -1
        268 20 213 6 -16 22 -51 35 -77 55 -106 97 -268 111 -425 6 -71 -18 -247 -46
        -344 -26 -87 -119 -269 -177 -344 -47 -62 -144 -156 -204 -200 -51 -36 -185
        -113 -211 -120 -13 -3 -32 -10 -43 -15 -172 -76 -544 -76 -700 -1 -11 6 -48
        21 -82 35 -34 13 -97 48 -140 77 -90 62 -265 234 -293 290 -11 21 -31 54 -45
        75 -14 20 -25 43 -25 50 0 8 -11 37 -24 64 -14 28 -28 65 -31 83 -4 18 -11 37
        -16 43 -11 14 -32 157 -34 239 -3 86 14 230 36 304 10 35 19 69 19 75 0 6 16
        43 35 81 19 39 35 75 35 80 1 6 27 48 58 94 60 87 91 115 79 70 -4 -13 -7 -97
        -7 -187 l0 -162 -25 -10 c-31 -12 -65 -66 -65 -102 0 -16 13 -42 31 -62 48
        -56 112 -58 167 -7 46 44 17 171 -39 171 -10 0 -19 6 -19 13 0 6 -1 104 -1
        216 l-1 205 38 33 c60 52 177 131 241 162 77 38 205 78 273 87 30 4 64 10 75
        14 28 10 166 6 264 -9z m-899 -806 c0 -41 0 -78 1 -82 0 -12 -33 -16 -40 -5
        -3 5 -5 44 -3 86 3 67 6 76 23 76 17 0 19 -8 19 -75z" />
                                        <path d="M1492 2080 c-93 -57 -50 -213 55 -202 52 5 82 21 99 54 29 56 8 125
        -47 152 -42 21 -67 20 -107 -4z m73 -29 c-3 -5 4 -11 16 -13 15 -2 26 -15 35
        -42 12 -33 12 -37 0 -27 -12 10 -13 8 -9 -10 4 -14 2 -20 -5 -16 -5 4 -12 2
        -14 -4 -5 -14 -78 -21 -78 -8 0 6 -4 7 -10 4 -6 -4 -10 13 -10 44 0 40 4 51
        16 51 8 0 13 4 9 9 -3 5 3 12 12 14 31 8 44 7 38 -2z" />
                                        <path d="M1470 1671 c-30 -4 -64 -12 -75 -18 -11 -6 -39 -19 -62 -28 -80 -33
        -192 -173 -218 -270 -15 -59 -17 -71 -17 -120 -1 -55 5 -91 21 -145 41 -134
        165 -259 296 -298 61 -19 211 -27 239 -14 12 6 42 17 67 26 52 19 134 77 171
        121 128 154 143 371 38 535 -32 50 -154 170 -172 170 -6 0 -24 6 -41 14 -40
        18 -129 36 -165 35 -15 -1 -52 -5 -82 -8z m205 -66 c131 -49 238 -168 262
        -290 22 -117 7 -208 -50 -300 -48 -79 -87 -115 -162 -151 -64 -31 -77 -34
        -162 -34 -114 0 -182 21 -260 82 -59 45 -85 81 -123 168 -19 45 -24 73 -24
        151 -1 89 1 100 33 162 59 116 121 172 239 217 61 23 178 21 247 -5z" />
                                        <path d="M1537 1313 c-4 -3 -7 -19 -7 -34 0 -24 -4 -28 -27 -26 -19 1 -28 -3
        -28 -13 0 -10 8 -14 28 -12 24 2 27 0 27 -28 0 -20 5 -30 15 -30 10 0 15 10
        15 31 0 27 3 30 28 27 19 -2 27 2 27 12 0 9 -10 15 -25 15 -21 0 -26 6 -28 33
        -3 31 -11 39 -25 25z" />
                                        <path d="M1020 662 c-29 -28 -40 -48 -40 -69 0 -42 39 -95 82 -111 33 -13 41
        -12 75 4 53 26 78 78 63 133 -13 48 -42 70 -99 78 -37 5 -44 2 -81 -35z m104
        -14 c31 -13 40 -38 32 -83 -10 -51 -73 -62 -112 -19 -19 19 -22 29 -14 43 5
        10 7 21 3 24 -11 12 20 38 39 34 10 -3 18 -1 18 4 0 12 4 11 34 -3z" />
                                        <path d="M1925 676 c-48 -21 -70 -53 -70 -101 0 -82 81 -134 158 -102 44 19
        60 48 59 105 -1 78 -77 128 -147 98z m89 -61 c23 -19 24 -25 16 -57 -8 -27
        -17 -37 -38 -41 -49 -10 -80 2 -92 36 -7 22 -7 33 0 35 5 2 10 12 10 22 0 35
        65 38 104 5z" />
                                        <path d="M860 2730 l-25 -19 30 -27 c24 -20 31 -23 33 -10 2 9 16 16 35 18 42
        4 41 22 0 26 -21 2 -33 9 -33 18 0 19 -10 17 -40 -6z" />
                                        <path d="M2320 2735 c0 -10 -11 -15 -35 -15 -25 0 -35 -4 -35 -16 0 -11 8 -15
        30 -12 18 2 34 -3 39 -11 7 -11 13 -10 35 4 l27 18 -22 23 c-26 28 -39 30 -39
        9z" />
                                        <path d="M1000 2705 c0 -13 13 -15 80 -13 107 4 108 22 3 26 -70 2 -83 0 -83
        -13z" />
                                        <path d="M1200 2705 c0 -12 16 -15 85 -15 69 0 85 3 85 15 0 12 -16 15 -85 15
        -69 0 -85 -3 -85 -15z" />
                                        <path d="M1410 2705 c0 -13 14 -15 87 -13 58 2 88 7 91 16 3 9 -19 12 -87 12
        -75 0 -91 -3 -91 -15z" />
                                        <path d="M1620 2705 c0 -13 14 -15 87 -13 58 2 88 7 91 16 3 9 -19 12 -87 12
        -75 0 -91 -3 -91 -15z" />
                                        <path d="M1830 2705 c0 -13 14 -15 87 -13 58 2 88 7 91 16 3 9 -19 12 -87 12
        -75 0 -91 -3 -91 -15z" />
                                        <path d="M2040 2705 c0 -13 13 -15 85 -13 48 2 85 7 85 13 0 6 -37 11 -85 13
        -72 2 -85 0 -85 -13z" />
                                    </g>
                                </svg>


                                <div class="w-3/4 p-6 pl-0 text-gray-900 dark:text-gray-100">
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Bolt patterns
                                    </h1>
                                </div>
                            </div>
                        </a>
                        <a href="manufacturers/cars">
                            <div class="flex flex-row text-center sm:rounded-lg  mb-2 bg-gray-800">
                                <?xml version="1.0" ?>

                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                <svg class="mt-2 w-1/4 pr-0 " fill="#000000" width="50px" height="50px"
                                    viewBox="0 0 56 56" id="Layer_1" version="1.1" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                    <g>

                                        <path
                                            d="M48.2,25.3c-0.3-0.2-0.8-0.1-1.1,0.1l-7.7,6.1v-5.8c0-0.4-0.2-0.7-0.5-0.9c-0.3-0.2-0.7-0.1-1,0.1l-9.4,6.8L28,25.4   c0-0.3-0.2-0.7-0.5-0.8c-0.3-0.2-0.7-0.1-1,0l-11.3,6.8v-9.2c0.7-0.4,1.3-0.9,1.7-1.6c0.5,0.2,1.1,0.2,1.7,0.2c2.2,0,4.1-1.2,5.1-3   c0.3,0,0.6,0.1,1,0.1c4.1,0,7.4-3.3,7.4-7.4c0-4.1-3.3-7.5-7.4-7.5c-3.7,0-6.7,2.6-7.3,6.2c-2.6,0.5-4.5,2.7-4.7,5.4   c-1.9,0.3-3.4,2-3.4,4c0,0.1,0,0.2,0,0.2h-1c-0.6,0-1,0.4-1,1V52c0,0.6,0.4,1,1,1h39.5c0.6,0,1-0.4,1-1V26.2   C48.7,25.8,48.5,25.5,48.2,25.3z M11.3,18.6c0-1.2,0.9-2.1,2.1-2.1c0.1,0,0.2,0,0.3,0c0.3,0,0.6-0.1,0.8-0.3   c0.2-0.2,0.3-0.5,0.3-0.8c0-0.2,0-0.3,0-0.5c0-2,1.6-3.8,3.6-3.9c0.5,0,0.9-0.4,0.9-0.9C19.4,7.2,21.8,5,24.7,5   c3,0,5.4,2.4,5.4,5.5c0,3-2.4,5.4-5.4,5.4c-0.4,0-0.9-0.1-1.3-0.2c-0.5-0.1-1,0.1-1.2,0.6c-0.6,1.5-2,2.5-3.6,2.5   c-0.6,0-1.2-0.1-1.8-0.4c-0.3-0.1-0.6-0.1-0.9,0c-0.3,0.1-0.5,0.4-0.6,0.7c0,0.2-0.1,0.4-0.2,0.6c-0.1-0.5-0.5-0.8-1-0.8h-2.9   C11.3,18.8,11.3,18.7,11.3,18.6z M10.5,20.8C10.5,20.8,10.5,20.8,10.5,20.8h2.7v1.6H9.3v-1.6H10.5z M46.7,51H9.3V24.5h3.9v8.7   c0,0.4,0.2,0.7,0.5,0.9c0.3,0.2,0.7,0.2,1,0l11.4-6.8l0.5,6.4c0,0.4,0.2,0.7,0.6,0.8c0.3,0.2,0.7,0.1,1-0.1l9.3-6.7v5.9   c0,0.4,0.2,0.7,0.6,0.9c0.3,0.2,0.8,0.1,1.1-0.1l7.7-6.1V51z" />

                                        <path
                                            d="M40.3,48h4.3c0.6,0,1-0.4,1-1v-4.3c0-0.6-0.4-1-1-1h-4.3c-0.6,0-1,0.4-1,1V47C39.3,47.6,39.7,48,40.3,48z M41.3,43.7h2.3   V46h-2.3V43.7z" />

                                        <path
                                            d="M27.7,41.7h-4.3c-0.6,0-1,0.4-1,1V47c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1v-4.3C28.7,42.2,28.2,41.7,27.7,41.7z M26.7,46   h-2.3v-2.3h2.3V46z" />

                                        <path
                                            d="M19.3,36.3h-4.3c-0.6,0-1,0.4-1,1v4.3c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1v-4.3C20.3,36.8,19.8,36.3,19.3,36.3z    M18.3,40.7h-2.3v-2.3h2.3V40.7z" />

                                        <path
                                            d="M36.1,36.3h-4.3c-0.6,0-1,0.4-1,1v4.3c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1v-4.3C37.1,36.8,36.7,36.3,36.1,36.3z    M35.1,40.7h-2.3v-2.3h2.3V40.7z" />

                                    </g>

                                </svg>

                                <div class="w-3/4 p-6 pl-0 text-gray-900 dark:text-gray-100">
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Manufacturers
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-3/4 mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                <h1 class="dark:text-white font-semibold text-xl text-center mb-5">Cars</h1>
                @foreach ($cars as $car)
                    @if ($car->car_id != 1)
                        <a href="cars/{{ $car->car_id }}">
                            <div
                                class="bg-white overflow-hidden flex flex-row shadow-sm sm:rounded-lg  {{ $car->CA == 0 ? 'dark:bg-red-600' : 'dark:bg-gray-800' }} mb-1">
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
                <x-modal name="car_update_post" :show="$errors->kuki->isNotEmpty()" focusable>
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
                                        <input checked id="accepted-2" type="radio" value="0" name="accepted"
                                            x-model="accepted"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </div>
                            @endif
                        </div>
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
