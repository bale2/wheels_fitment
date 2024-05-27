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
                <div class="md:w-3/4 w-full  p-6 text-gray-900 dark:text-gray-100 ">
                    <div class="flex flex-row justify-evenly pb-5 mt-2">
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Manufacturer:</h1>
                            <a href="/manufacturers/wheels/{{ $wheel->manufacturer->id }}">
                                <h1 class="font-bold text-3xl"> {{ $wheel->manufacturer->manufacturer_name }}</h1>
                            </a>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Model:</h1>
                            <h1 class="font-bold text-3xl   "> {{ $wheel->model }}</h1>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">Bolt Pattern: </h1>
                            <h1 class="text-lg">{{ $wheel->boltPattern->bolt_pattern }}</h1>
                            <hr>
                        </div>
                        <div class="
                                w-52">
                            <h1 class="text-slate-400 text-base">Center Bore: </h1>
                            <h1 class="text-lg">{{ $wheel->center_bore }} cm</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Diameter: </h1>
                            <h1 class="text-lg">{{ $wheel->diameter }} inch</h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base"> Width: </h1>
                            <h1 class="text-lg">{{ $wheel->width }} inch</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">ET number: </h1>
                            <h1 class="text-lg">{{ $wheel->ET_number }} </h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base"> KBA number: </h1>
                            <h1 class="text-lg">{{ $wheel->kba_number }}</h1>
                            <hr>
                        </div>
                    </div>

                    <div class="flex flex-row justify-evenly">
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">Mounting type: </h1>
                            <h1 class="text-lg">{{ $wheel->nutBolt->type }}</h1>
                            <hr>
                        </div>
                        <div class=" w-52">
                            <h1 class="text-slate-400 text-base">Wheel design:</h1>
                            @if ($wheel->multipiece == 0)
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
                            <h1 class="text-lg">{{ $wheel->wheelType->wheel_type }}</h1>
                            <hr>
                        </div>
                        <div class="w-52">
                            <h1 class="text-slate-400 text-base">Estimated price:</h1>
                            <h1 class="text-lg">{{ $wheel->price }}</h1>
                            <hr>
                        </div>
                    </div>
                    <h1 class="mx-[17%] text-slate-400 text-base">Note: </h1>
                    <div class=" mx-[17%]">
                        <div class="flex flex-wrap text-base">
                            <p>{{ $wheel->note }}</p>
                        </div>
                    </div>

                    <h1 class="text-base mt-10">Date of upload: {{ $wheel->created_at }}</h1>
                    <h1 class="text-base">ID: {{ $wheel->id }}</h1>
                </div>
                {{-- kép --}}
                <div class="slider md:-ml-10  md:w-1/4 md:my-auto mx-auto mt-5">
                    <div class="slides md:my-auto">
                        @foreach ($wheel->photos() as $photo)
                            <a href="{{ asset('photos/' . $photo) }}" target="_blank"><img
                                    src="{{ asset('photos/' . $photo) }}" alt="image of the wheel"
                                    class="slide h-40 w-40 object-cover mx-auto">
                            </a>
                        @endforeach
                    </div>
                    <div class="buttons flex justify-between">
                        <button id="prev" class="previous relative top-1/2 left-0 w-8"
                            onclick="previousSlide()">&#10094</button>
                        <button id="next" class="next relative right-0 w-8" onclick="nextSlide()">&#10095</button>
                    </div>
                </div>

            </div>
            @include('components.wheels_cars')
            @if (Auth::user())
                <div
                    class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <h1 class="text-slate-400 text-lg">Add car to the wheel:</h1>
                    <div class="pl-5">
                        @livewire('DependentDropdownForWheels', ['wheel_id' => $wheel->id])
                    </div>
                </div>
            @elseif (!Auth::user())
                <div
                    class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <h1 class="text-slate-400 text-lg">To add compatible cars to this wheel, please <a href="/login"
                            class="underline underline-offset-2">
                            log in</a> or <a href="/register" class="underline underline-offset-2">register</a>
                    </h1>
                </div>
            @endif
        </div>
    </div>
    <script>
        const slides = document.querySelectorAll(".slides img");
        const prevbutton = document.getElementById("prev");
        const nextbutton = document.getElementById("next");
        let slideIndex = 0;
        let intervalId = null;

        document.addEventListener("DOMContentLoaded", initializeSlider);

        console.log(slides.length);

        function initializeSlider() {
            if (slides.length == 1) {
                console.log("length = 1");
                slides[slideIndex].classList.add("displaySlide");
                prevbutton.style.display = "none";
                nextbutton.style.display = "none";

            }
            if (slides.length > 1) {
                console.log("length > 1");
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
