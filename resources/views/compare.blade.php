<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
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
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                Compare
            </h1>
        </div>
    </x-slot>
    <div>
        <div>
            <livewire:DependentDropdownForCompare />
        </div>
        {{-- <div class="flex flex-row justify-evenly" x-data="width = 100, { wheel_id: '', model: '', price: 0, wheel_type_id: 0, diameter: 0, ET_number: 0, bolt_pattern_id: 0, kba_number: '', center_bore: 0, nut_bolt_id: 0, multipiece: 0, note: '', accepted: 0 }">
            <canvas id="canvas" class="bg-white mt-8" width="650" height="500"></canvas>
            <div style="display:none;">
                <img id="source1" style="z-index: -100;" src="{{ asset('bal_felni.png') }}" />
                <img id="source2" style="z-index: -100;" src="{{ asset('jobb_felni.png') }}" />
                <img style="z-index: 100;" id="source3" src="{{ asset('suspension_photoshop2.png') }}" />
            </div>
        </div> --}}
    </div>

    {{-- <script>
        // bal:7.62+2=9.62, jobb: 7.62-2=5.62
        //  3= 50 4 =66.66  5 = 83.33 6 = 100 7 = 116.667 8 = 133.32 9 = 149.98 10 = 166,64 11= 183.3  12 = 200
        let felniwidth = 150; //6j = 15.24
        let felnibal = felniwidth / 2; //50 7.62
        let felnijobb = felniwidth / 2; //50 7.62
        let felniET = 20; //-20
        let distance = 70;
        //6J->15.24cm ->bal és jobb is 7.62cm
        let balposition = 0;
        //ha 0 nincs korrekció
        //ha 1 tehát + ET szám van akkor a baloldalit
        if (felniET == 0) {} else if (felniET > 0) {
            felnibal = felnibal - felniET; //44
            felnijobb = felnijobb + felniET; //84

            //pozitív ET
        } else if (felniET < 0) { //-20-as ET mellett
            felnibal = felnibal - felniET; //84 50+20 = 70
            felnijobb = felnijobb + felniET; //44 50-20 = 30
            //negatív ET
        }

        //csak bal oldalt értinti
        if (felnibal == 50) {
            balposition = 400;
        } else if (felnibal > 50) {
            balposition = 400 - (felnibal - 50);
        } else {
            balposition = 400 + (50 - felnibal);
        }
        const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext("2d");
        const image1 = document.getElementById("source1");
        const image2 = document.getElementById("source2");
        const image3 = document.getElementById("source3");

        ctx.beginPath();
        ctx.moveTo(450, 200);
        ctx.lineTo(450, 430);
        ctx.strokeStyle = '#ff0000';
        ctx.stroke();
        //Felfekvési pont

        ctx.beginPath();
        ctx.moveTo(balposition + felniwidth / 2, 200);
        ctx.lineTo(balposition + felniwidth / 2, 430);
        ctx.strokeStyle = 'blue';
        ctx.stroke();
        //felni középvonala

        ctx.beginPath();
        ctx.moveTo(450 - distance, 200);
        ctx.lineTo(450 - distance, 430);
        ctx.strokeStyle = 'purple';
        ctx.stroke();
        image1.addEventListener("load", (e) => {
            ctx.drawImage(image1, balposition, 221, felnibal, 200);
            //x,y, x-szél, y-szél
            //386+felniszélesség+korrekció = 450
            //x = 64
            //1. felniszélesség
        });
        image2.addEventListener("load", (e) => {
            ctx.drawImage(image2, 450, 220, felnijobb, 200);
            // 4.2641509434
        });

        image3.addEventListener("load", (e) => {
            ctx.drawImage(image3, 450, 50, 200, 344);
        });
    </script> --}}
</x-app-layout>
