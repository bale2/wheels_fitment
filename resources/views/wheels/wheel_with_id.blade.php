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
                            </g>
                        </g>
                    </svg></a>
            </div>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center dark:text-gray-200">
                    {{ $wheel->model }}
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
                            <h1 class="font-bold text-3xl"> {{ $wheel->manufacturer->manufacturer_name }}</h1>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Model:</h1>
                            <h1 class="font-bold text-3xl   "> {{ $wheel->model }}</h1>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">Osztókör: </h1>
                            <h1 class="text-lg">{{ $wheel->boltPattern->bolt_pattern }}</h1>
                            <hr>
                        </div>
                        <div class="
                                w-52">
                            <h1 class="text-slate-400 text-base">Középfurat: </h1>
                            <h1 class="text-lg">{{ $wheel->center_bore }}</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Átmérő: </h1>
                            <h1 class="text-lg">{{ $wheel->diameter }}</h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base"> Szélesség: </h1>
                            <h1 class="text-lg">{{ $wheel->width }}</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">ET szám: </h1>
                            <h1 class="text-lg">{{ $wheel->ET_number }} </h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base"> KBA szám: </h1>
                            <h1 class="text-lg">{{ $wheel->kba_number }}</h1>
                            <hr>
                        </div>
                    </div>

                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">Felfogatás: </h1>
                            <h1 class="text-lg">{{ $wheel->nutBolt->type }}</h1>
                            <hr>
                        </div>
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">Felépítés:</h1>
                            @if ($wheel->multipiece == 0)
                                <h1 class="text-lg"> Egyrészes</h1>
                                <hr>
                            @else
                                <h1 class="text-lg"> Többrészes</h1>
                                <hr>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly mb-5">
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Típusa: </h1>
                            <h1 class="text-lg">{{ $wheel->wheelType->wheel_type }}</h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Becsült ár:</h1>
                            <h1 class="text-lg">{{ $wheel->price }}</h1>
                            <hr>
                        </div>
                    </div>
                    <h1 class="mx-[17%] text-slate-400 text-base">Megjegyzés: </h1>
                    <div class=" mx-[17%]">
                        <div class="flex flex-wrap text-base">
                            <p>{{ $wheel->note }}</p>
                        </div>

                    </div>

                    <h1 class="text-base mt-10">Feltöltés dátuma: {{ $wheel->created_at }}</h1>
                    <h1 class="text-base">ID: {{ $wheel->id }}</h1>
                </div>
                <div class="md:my-auto lg:ml-10 mx-auto">
                    <img src="{{ asset('photos/' . $wheel->photo) }}" alt="image of the wheel" class="h-40 w-auto ">
                </div>

            </div>
            <div
                class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                <h1 class="text-slate-400 text-lg">Elfogadott autótípusok:</h1>
                @foreach ($wheel->cars as $one)
                    <a href='/cars/{{ $one->id }}'>
                        <h3 class="dark:text-white pl-5">-{{ $one->manufacturer->manufacturer_name }}
                            {{ $one->car_model }}
                        </h3>
                    </a>
                @endforeach
            </div>
            <div
                class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                <h1 class="text-slate-400 text-lg">Add car to the wheel:</h1>
                <div class="pl-5">
                    @if (Auth::user())
                        @livewire('DependentDropdownForWheels', ['wheel_id' => $wheel->id])
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
