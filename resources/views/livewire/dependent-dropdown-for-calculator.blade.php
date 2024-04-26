<div class="flex flex-row">
    <div>
        <div class="form-group row">
            <label for="category"
                class="col-md-4 text-md-right dark:text-gray-200 text-white"><strong>Manufacturer</strong></label>
            <div class="col-md-6">
                <select id="car_id" wire:model.live="selectedManufacturer"
                    class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control">
                    <option value="" selected>Select category</option>
                    @foreach ($manufacturers as $manufacturer)
                        <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value="{{ $manufacturer->id }}">
                            {{ $manufacturer->manufacturer_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if (!is_null($selectedManufacturer))
            <div class="form-group row">
                <label for="model" class="col-md-4 text-md-right text-white">Model</label>

                <div class="col-md-6">
                    <select onselect="myFunction()"
                        class="dark:text-gray-200
                        bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control"
                        name="car_id">
                        <option value="" selected>Choose product</option>
                        @if ($cars)
                            @foreach ($cars as $car)
                                <option value= "{{ $car->id }}">{{ $car->car_model }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        @endif
    </div>

    <div class="flex flex-row justify-evenly" x-data="width = 100, { wheel_id: '', model: '', price: 0, wheel_type_id: 0, diameter: 0, ET_number: 0, bolt_pattern_id: 0, kba_number: '', center_bore: 0, nut_bolt_id: 0, multipiece: 0, note: '', accepted: 0 }">
        <canvas id="canvas" class="bg-white mt-8" width="650" height="500"></canvas>
        <div style="display:none;">
            <img id="source1" style="z-index: -100;" src="{{ asset('bal_felni.png') }}" />
            <img id="source2" style="z-index: -100;" src="{{ asset('jobb_felni.png') }}" />
            <img style="z-index: 100;" id="source3" src="{{ asset('suspension_photoshop2.png') }}" />
        </div>
    </div>
    {{-- script --}}
    <script>
        function myFunction() {
            alert("You selected some text!");
        }
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
    </script>

</div>
