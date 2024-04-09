<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around ">
            <div class="w-3 ">
                <a href="/wheels"><svg fill="#000000" class="h-5 w-5" version="1.1" id="Capa_1"
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
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center dark:text-gray-200">
                    {{ $wheel->model }}
                </h2>
            </div>
            @if (Auth::user())
                <div>
                    <a href="/ad_create">
                        <div
                            class="bg-slate-200 font-semibold text-xl text-gray-800 leading-tight rounded-3xl pl-5 mr-1 text-center">
                            Hirdetésfeladás</div>
                    </a>
                </div>
            @endif
        </div>
    </x-slot>
    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 grid grid-cols-2 dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Gyártó: {{ $wheel->manufacturer->manufacturer_name }}</h1>
                    <h1>Model: {{ $wheel->model }}</h1>
                    <h1>Ár: {{ $wheel->price }}</h1>
                    <h1>Osztókör: {{ $wheel->boltPattern->bolt_pattern }}</h1>
                    <h1>Átmérő: {{ $wheel->diameter }} &emsp; Szélesség: {{ $wheel->width }}</h1>
                    {{-- <h1>Szélesség: {{ $wheel->width }}</h1> --}}
                    <h1>ET szám: {{ $wheel->ET_number }} &emsp; KBA szám: {{ $wheel->kba_number }}</h1>
                    <h1>Középfurat: {{ $wheel->center_bore }}</h1>
                    <h1>Felfogatás: {{ $wheel->nutBolt->type }}</h1>
                    @if ($wheel->multipiece == 0)
                        <h1>Felépítés: Egyrészes</h1>
                    @else
                        <h1>Felépítés: Többrészes</h1>
                    @endif
                    <h1>Megjegyzés: {{ $wheel->note }}</h1>
                    <h1>Típusa: {{ $wheel->wheelType->wheel_type }}</h1>
                    <h1>Feltöltés dátuma: {{ $wheel->created_at }}</h1>
                    <h1>ID: {{ $wheel->id }}</h1>
                    {{-- <h1>{{ $wheel->updated_at }}</h1> --}}
                    {{-- <h1>{{ $wheel->photo }}</h1> --}}
                </div>
                <div>
                    <img src="{{ asset('photos/' . $wheel->photo) }}" alt="image of the ad"
                        class="mt-10 mb-auto mx-auto h-40 w-auto ">
                </div>

            </div>
            <div
                class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                <h1>Elfogadott autótípusok:</h1>
                @foreach ($collection as $one)
                    <a href='/cars/{{ $one->id }}'>
                        <h3 class="dark:text-white">{{ $one['manufacturer_name'] . ' ' . $one['car_model'] }}</h3>
                    </a>
                @endforeach
            </div>
            <div
                class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">

                @if (Auth::user())
                    <form method="post" action="{{ route('car_wheel_post') }}" class="mt-6 space-y-6 "
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <input type="hidden" value="{{ $wheel->id }}" name="car_id" class="block mt-1 w-full" />
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
            </div>
        </div>
    </div>
</x-app-layout>
