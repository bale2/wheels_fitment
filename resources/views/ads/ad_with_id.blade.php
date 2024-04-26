<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around ">
            <div class="w-3 ">
                <a href="/ads"><svg fill="#000000" class="h-5 w-5" version="1.1" id="Capa_1"
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
                    {{ $ad->title }}
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
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto mb-10">
                @foreach ($ad->photos() as $photo)
                    <img src="{{ asset('photos/' . $photo) }}" alt="image of the ad"
                        class="mt-10 mb-auto mx-auto h-20 w-auto ">
                @endforeach
            </div>
            <div
                class=" bg-white overflow-hidden shadow-sm sm:rounded-lg justify-between dark:bg-gray-800 max-w-3xl mx-auto">
                <div class=" w-full text-gray-900 dark:text-gray-100 ">
                    <div class=" justify-evenly pb-2 mt-2">
                        <h1 class="mx-[17%] font-bold text-3xl">{{ $ad->title }}</h1>
                    </div>
                    <div>
                        <h1 class="mx-[17%] font-bold text-xl">{{ $ad->price }}€</h1>
                    </div>
                </div>
                {{--  --}}
                <div class="flex flex-row justify-start mx-[17%]">
                    <div class="w-56">
                        <h1 class="text-slate-400 text-base">Eladó: {{ $ad->user->name }} </h1>
                        <h1 class="text-lg"></h1>
                        <hr>
                    </div>
                    <div class="w-56
                            ">
                        <h1 class="text-slate-400 text-base">Hely: {{ $ad->place }}</h1>
                        <h1 class="text-lg"></h1>
                        <hr>
                    </div>
                </div>
                <div class="mx-[17%]">
                    <div class="max-w-[28rem]">
                        <h1 class="text-slate-400 text-base">Uploaded: {{ $ad->updated_at }} </h1>
                        <hr>
                    </div>

                </div>
                {{--  --}}
                <h1 class="mx-[17%] text-slate-400 text-base mb-5">Leírás: </h1>
                <div class=" mx-[17%] text-base">
                    <p>{{ $ad->description }}
                    </p>
                </div>
                <h1 class="mt-5 inline-block mx-[17%] text-slate-400 text-base">Wheel associated with ad: </h1>
                <a href="/wheels/{{ $ad->wheel->id }}">
                    <p class="inline text-base text-white">{{ $ad->wheel->manufacturer->manufacturer_name }}
                        {{ $ad->wheel->model }}</p>
                </a>
            </div>
            <div
                class="border border-green-500 bg-white overflow-hidden shadow-sm sm:rounded-lg justify-between dark:bg-gray-800 max-w-3xl h-[40vh] mx-auto">
                <iframe class="w-full h-full" style="border:0" loading="lazy" allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed/v1/place?key={{ $google_api }}
              &q={{ $ad->place }}">
                </iframe>
            </div>

        </div>
    </div>
</x-app-layout>
