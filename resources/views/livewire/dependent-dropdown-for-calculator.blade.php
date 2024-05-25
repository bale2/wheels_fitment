<div> {{-- egész oldal --}}
    <div class="flex flex-row"> {{-- megjelenített részeket --}}
        <div class="lg:w-1/3 text-white"> {{-- bal szöveg --}}
            <div class="flex flex-row flex-wrap mx-2 px-2 py-2  sm:rounded-lg mt-5 mb-2 bg-gray-800">
                <h1 class="text-3xl font-bold text-center pt-2 mx-auto">See how your wheels will fit!</h1>
                <p class="mb-4">This visualizer helps you see how much space there will be between your fender and your
                    wheels. Just choose both the wheel and cars and we'll show you a simulated the fender clearances.
                </p>
                <p class="mb-2">This is a visual estimate and may not perfectly reflect the exact fit on your car. It's
                    always recommended to consult a professional or try a test fit before making any modifications.</p>
                <div class="space-y-2">
                    <div class="flex items-center space-x-4 ">
                        <div class="w-4 h-8 bg-red-600 rounded-full"></div>
                        <span class="text-lg font-semibold text-gray-500">wheel contact plane</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-4 h-8 bg-blue-700 rounded-full"></div>
                        <span class="text-lg font-semibold text-gray-500 ">rim centerline</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-4 h-8 bg-green-600 rounded-full"></div>
                        <span class="text-lg font-semibold text-gray-500">distance of the fender from the contact
                            plane</span>
                    </div>
                </div>
            </div>
            {{-- car data --}}
            <div class="flex flex-row flex-wrap mx-2 px-2 py-2  sm:rounded-lg mt-5 mb-2 bg-gray-800">
                <h1 class="text-3xl font-bold text-center pt-2 mx-auto">Wheel's attributes!</h1>
                <div
                    class=" bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-row flex-wrap-reverse mt-5 justify-between dark:bg-gray-800">
                    <div class="md:w-3/4 w-full  mx-auto text-gray-900 dark:text-gray-100 ">
                        <div class="flex flex-row justify-evenly">
                            <div class="w-52">
                                <h1 class="text-slate-400 text-base"> Width: </h1>
                                <h1 id="wheel_width" class="text-lg"></h1>
                                <hr>
                            </div>
                            <div class=" w-52">
                                <h1 class="text-slate-400 text-base">ET number: </h1>
                                <h1 id="wheel_et" class="text-lg"></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="flex flex-row justify-evenly">
                            <div class=" w-52">
                                <h1 class="text-slate-400 text-base">Inner space needed: </h1>
                                <h1 id="inner_space" class="text-lg"></h1>
                                <hr>
                            </div>
                            <div class="w-52">
                                <h1 class="text-slate-400 text-base"> Outer space needed: </h1>
                                <h1 id="outer_space" class="text-lg"></h1>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-col mx-auto lg:w-2/3 mt-4"> {{-- dropdownok + canvas --}}
            <div class="flex flex-row"> {{-- dropdownok --}}
                <div class="mx-auto"> {{-- első dropdown CAR!  --}}
                    <div class="mx-auto">
                        <label for="category"
                            class="col-md-4 text-md-right dark:text-gray-200 text-white"><strong>Manufacturer
                                (Car)</strong></label>
                        <div class="col-md-6">
                            <select id="man_id" wire:model.live="selectedManufacturerCar"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control">
                                <option value="" selected>Select category</option>
                                @foreach ($manufacturersCar as $manufacturer)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800"
                                        value="{{ $manufacturer->id }}">
                                        {{ $manufacturer->manufacturer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if (!is_null($selectedManufacturerCar))
                        <div>
                            <label for="model" class="col-md-4 text-md-right text-white">Model</label>

                            <div class="col-md-6">
                                <select onchange="change_car()"
                                    class="dark:text-gray-200
                        bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control"
                                    name="car_id" id="car_id">
                                    <option value="" selected>Choose product</option>
                                    @if ($cars)
                                        @foreach ($cars as $car)
                                            <option value= "{{ $car }}">{{ $car->car_model }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    @endif
                </div>
                {{-- második dropdown CAR!  --}}

                <div class="mx-auto">
                    <div class="form-group row">
                        <label for="category"
                            class="col-md-4 text-md-right dark:text-gray-200 text-white"><strong>Manufacturer
                                (Wheel)</strong></label>
                        <div class="col-md-6">
                            <select id="man_id" wire:model.live="selectedManufacturerWheel"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control">
                                <option value="" selected>Select category</option>
                                @foreach ($manufacturersWheel as $manufacturer)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800"
                                        value="{{ $manufacturer->id }}">
                                        {{ $manufacturer->manufacturer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if (!is_null($selectedManufacturerWheel))
                        <div class="form-group row">
                            <label for="model" class="col-md-4 text-md-right text-white">Model</label>

                            <div class="col-md-6">

                                <select onchange="change_wheel()"
                                    class="dark:text-gray-200
                        bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control"
                                    name="wheel_id" id="wheel_id">
                                    <option value="" selected>Choose product</option>
                                    @if ($wheels)
                                        @foreach ($wheels as $wheel)
                                            <option value= "{{ $wheel }}">{{ $wheel->model }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex flex-row justify-evenly" x-data="width = 100, { wheel_id: '', model: '', price: 0, wheel_type_id: 0, diameter: 0, ET_number: 0, bolt_pattern_id: 0, kba_number: '', center_bore: 0, nut_bolt_id: 0, multipiece: 0, note: '', accepted: 0 }">
                <canvas id="canvas" class="bg-white mt-8" width="650" height="500"></canvas>
                <div style="display:none;">
                    <img id="source1" src="{{ asset('bal_felni.png') }}" />
                    <img id="source2" src="{{ asset('jobb_felni.png') }}" />
                    <img style="z-index: 100;" id="source3" src="{{ asset('suspension_photoshop3.png') }}" />
                </div>
            </div>
        </div>
    </div>
    {{-- script --}}
    <script>
        function stock() {
            if (felniET == 0) {} else if (felniET > 0) {
                //pozitív ET
                felnibal = felnibal - felniET;
                felnijobb = felnijobb + felniET;

            } else if (felniET < 0) { //-20-as ET mellett
                //negatív ET
                felnibal = felnibal - felniET;
                felnijobb = felnijobb + felniET;
            }

            //csak bal oldalt értinti
            if (felnibal == 50) {
                balposition = 400;
            } else if (felnibal > 50) {
                balposition = 400 - (felnibal - 50);
            } else {
                balposition = 400 + (50 - felnibal);
            }

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
            ctx.moveTo(450 - felnidistance, 200);
            ctx.lineTo(450 - felnidistance, 430);
            ctx.strokeStyle = 'green';
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

        }

        function rajzolj() {
            ctx.beginPath();
            ctx.moveTo(450, 200);
            ctx.lineTo(450, 430);
            ctx.strokeStyle = 'red';
            ctx.stroke();
            //Felfekvési pont

            ctx.beginPath();
            ctx.moveTo(balposition + felniwidth / 2, 200);
            ctx.lineTo(balposition + felniwidth / 2, 430);
            ctx.strokeStyle = 'blue';
            ctx.stroke();
            //felni középvonala

            ctx.beginPath();
            ctx.moveTo(450 - felnidistance, 200);
            ctx.lineTo(450 - felnidistance, 430);
            ctx.strokeStyle = 'green';
            ctx.stroke();

            let helyzetWheel = document.getElementById('wheel_id');
            let helyzet = document.getElementById('car_id');
            // console.log(helyzet);

            helyzetWheel.addEventListener("click", event => {
                ctx.drawImage(image1, balposition, 221, felnibal, 200);
                //x,y, x-szél, y-szél
                //386+felniszélesség+korrekció = 450
                //x = 64
                //1. felniszélesség
            });
            helyzetWheel.addEventListener("click", event => {
                ctx.drawImage(image2, 450, 220, felnijobb, 200);
                // 4.2641509434
            });
            helyzetWheel.addEventListener("click", event => {
                ctx.drawImage(image3, 450, 50, 200, 344);
            });


            helyzet.addEventListener("click", event => {
                ctx.drawImage(image1, balposition, 221, felnibal, 200);
                //x,y, x-szél, y-szél
                //386+felniszélesség+korrekció = 450
                //x = 64
                //1. felniszélesség
            });
            helyzet.addEventListener("click", event => {
                ctx.drawImage(image2, 450, 220, felnijobb, 200);
                // 4.2641509434
            });
            helyzet.addEventListener("click", event => {
                ctx.drawImage(image3, 450, 50, 200, 344);
            });
        }

        function szamolas() {
            felniwidth = 25;
            felniwidth = jswheel.width * 25;
            felnibal = felniwidth / 2;
            felnijobb = felniwidth / 2;
            if (felniET == 0) {} else if (felniET > 0) {

                console.log(felnibal);
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
            document.getElementById('inner_space').innerHTML = felnijobb;
            document.getElementById('outer_space').innerHTML = felnibal;
            console.log(jswheel);
            rajzolj();
        }

        function change_car() {
            jscar = document.getElementById('car_id').value;
            jscar = JSON.parse(jscar);
            felnidistance = jscar.mtsurface_fender_distance;
            document.getElementById('')
            ctx.reset();
            szamolas();
        }

        function change_wheel() {
            jswheel = document.getElementById('wheel_id').value;
            jswheel = JSON.parse(jswheel);
            // felniwidth = jswheel.width * 25;
            // felnibal = felniwidth / 2;
            // felnijobb = felniwidth / 2;
            document.getElementById('wheel_width').innerHTML = jswheel.width;
            document.getElementById('wheel_et').innerHTML = jswheel.ET_number;
            felniET = jswheel.ET_number;
            ctx.reset();
            szamolas();
        }


        let jswheel = null;
        let jscar = null;

        // bal:7.62+2=9.62, jobb: 7.62-2=5.62
        //  3= 50 4 =66.66  5 = 83.33 6 = 100 7 = 116.667 8 = 133.32 9 = 149.98 10 = 166,64 11= 183.3  12 = 200
        let felniwidth = 25; //6j = 15.24
        let felnibal = felniwidth / 2; //50 7.62
        let felnijobb = felniwidth / 2; //50 7.62
        let felniET = 0; //-20
        let felnidistance = 10;
        // console.log(felnidistance);
        //6J->15.24cm ->bal és jobb is 7.62cm
        let balposition = 0;
        //ha 0 nincs korrekció
        //ha 1 tehát + ET szám van akkor a baloldalit
        const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext("2d");
        const image1 = document.getElementById("source1");
        const image2 = document.getElementById("source2");
        const image3 = document.getElementById("source3");
        // szamolas();
    </script>
    {{-- <h1 class="text-white">lila: sárvédő</h1>
    <h1 class="text-white">kék: felni középvonala</h1>
    <h1 class="text-white">piros: felfelkvési sík</h1> --}}
</div>
