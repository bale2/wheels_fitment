<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-around">
            <div class="w-3 mx-auto">
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
            <div class="mx-auto">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center dark:text-gray-200">
                    {{ $ad->title }}
                </h2>
            </div>
            <div class="mx-auto">
                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    href="/ad_create">Post an ad</a>
            </div>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="slider max-w-3xl mx-auto mb-10">
                <div class="slides" onclick="stopPropagation(event)">
                    @foreach ($ad->photos() as $photo)
                        <a href="{{ asset('photos/' . $photo) }}" target="_blank">
                            <img src="{{ asset('photos/' . $photo) }}" alt="image of the ad"
                                class="slide mt-10 mb-auto mx-auto h-20 w-auto">
                        </a>
                    @endforeach
                </div>
                <button class="previous absolute top-1/2 dark:text-white left-0 w-8"
                    onclick="previousSlide(event)">&#10094</button>
                <button class="next absolute top-1/2 right-0 w-8 dark:text-white"
                    onclick="nextSlide(event)">&#10095</button>

            </div>
            <div
                class="
                    bg-white overflow-hidden shadow-sm sm:rounded-lg justify-between dark:bg-gray-800 max-w-3xl
                    mx-auto pb-5">
                <div class=" w-full text-gray-900 dark:text-gray-100 ">
                    <div class=" justify-evenly pb-2 mt-2">
                        <h1 class="mx-[17%] font-bold text-3xl">{{ $ad->title }}</h1>
                    </div>
                    <div>
                        <h1 class="mx-[17%] font-bold text-xl mb-5">{{ $ad->price }}€</h1>
                    </div>
                </div>
                {{--  --}}
                <div class="flex flex-row justify-start mx-[17%]">
                    <a href="/users/{{ $ad->user->id }}">
                        <div class="w-56">
                            <h1 class="text-slate-400 text-base underline underline-offset-2">Seller:
                                {{ $ad->user->name }} </h1>
                            <h1 class="text-lg"></h1>

                        </div>
                    </a>
                    <a href="https://www.google.com/maps/search/?api=1&query={{ $ad->place }}" target="_blank">
                        <div class="w-56
                            ">
                            <h1 class="text-slate-400 text-base underline underline-offset-2">Place: {{ $ad->place }}
                            </h1>
                            <h1 class="text-lg"></h1>
                        </div>
                    </a>
                </div>

                <div class="w-full pt-0 px-6 text-gray-900 dark:text-gray-100 ">
                    <h1 class="mx-[17%] mb-0 mt-5 text-3xl">Information about the wheel:</h1>
                    <div class="flex flex-row justify-evenly mt-2">
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Manufacturer:</h1>
                            <a href="/manufacturers/wheels/{{ $ad->wheel->manufacturer->id }}">
                                <h1 class="font-bold text-lg"> {{ $ad->wheel->manufacturer->manufacturer_name }}</h1>
                            </a>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Model:</h1>
                            <h1 class="font-bold text-lg   "> {{ $ad->wheel->model }}</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">Bolt Pattern: </h1>
                            <h1 class="text-lg">{{ $ad->wheel->boltPattern->bolt_pattern }}</h1>
                            <hr>
                        </div>
                        <div class="
                                w-52">
                            <h1 class="text-slate-400 text-base">Center Bore: </h1>
                            <h1 class="text-lg">{{ $ad->wheel->center_bore }} cm</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Diameter: </h1>
                            <h1 class="text-lg">{{ $ad->wheel->diameter }} inch</h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base"> Width: </h1>
                            <h1 class="text-lg">{{ $ad->wheel->width }} inch</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">ET number: </h1>
                            <h1 class="text-lg">{{ $ad->wheel->ET_number }} </h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base"> KBA number: </h1>
                            <h1 class="text-lg">{{ $ad->wheel->kba_number }}</h1>
                            <hr>
                        </div>
                    </div>

                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">Mounting type: </h1>
                            <h1 class="text-lg">{{ $ad->wheel->nutBolt->type }}</h1>
                            <hr>
                        </div>
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">Wheel design:</h1>
                            @if ($ad->wheel->multipiece == 0)
                                <h1 class="text-lg"> One piece</h1>
                                <hr>
                            @else
                                <h1 class="text-lg"> Multipiece</h1>
                                <hr>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly mb-5">
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Type: </h1>
                            <h1 class="text-lg">{{ $ad->wheel->wheelType->wheel_type }}</h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Estimated price:</h1>
                            <h1 class="text-lg">{{ $ad->wheel->price }}</h1>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="mx-[17%]">
                    <div class="max-w-[28rem]">
                        <h1 class="mt-1 inline-block text-slate-400 text-base">Wheel associated with ad: </h1>
                        <a href="/wheels/{{ $ad->wheel->id }}">
                            <p class="inline text-base text-white underline underline-offset-2">
                                {{ $ad->wheel->manufacturer->manufacturer_name }}
                                {{ $ad->wheel->model }}</p>
                        </a>
                    </div>

                </div>
                {{--  --}}
                <h1 class="mx-[17%] text-slate-400 text-base">Description: </h1>
                <div class=" mx-[17%] text-base">
                    <p class="dark:text-white mb-10">{{ $ad->description }}
                    </p>
                </div>
                <div class=" mx-[17%] text-base">
                    <h1 class="text-slate-400 text-base">Uploaded: {{ $ad->updated_at }} </h1>
                </div>
            </div>

            <div
                class=" bg-white overflow-hidden shadow-sm sm:rounded-lg justify-between dark:bg-gray-800 max-w-3xl h-[40vh] mx-auto">
                <iframe class="w-full h-full" style="border:0" loading="lazy" allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed/v1/place?key={{ $google_api }}
              &q={{ $ad->place }}">
                </iframe>
            </div>

        </div>
    </div>
    <script>
        const slides = document.querySelectorAll(".slides img");
        const buttons = document.querySelectorAll(".slider button");
        let slideIndex = 0;
        let intervalId = null;

        document.addEventListener("DOMContentLoaded", initializeSlider)

        // initializeSlider();

        function stopPropagation(event) {
            event.stopPropagation();
        }

        function previousSlide(event) {
            // Add your previous slide logic here
            event.stopPropagation();
        }

        function nextSlide(event) {
            // Add your next slide logic here
            event.stopPropagation();
        }

        function initializeSlider() {
            if (slides.length > 0) {
                slides[slideIndex].classList.add("displaySlide");
                intervalId = setInterval(nextSlide, 5000);
            }

        }

        function showSlide(index) {

            if (index >= slides.length) {
                slideIndex = 0;
            } else if (index < 0) {
                slideIndex = slides.length - 1;
            }

            slides.forEach(slide => {
                slide.classList.remove("displaySlide");
            });
            slides[slideIndex].classList.add("displaySlide");
        }

        function previousSlide() {
            clearInterval(intervalId);
            slideIndex--;
            showSlide(slideIndex);
        }

        function nextSlide() {
            slideIndex++;
            showSlide(slideIndex);
        }
    </script>
</x-app-layout>
