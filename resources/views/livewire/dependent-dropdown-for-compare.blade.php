<div class="flex flex-row">
    <div>
        <div class="form-group row">
            <label for="category" class="col-md-4 text-md-right dark:text-gray-200 text-white"><strong>Manufacturer
                    (Wheel1)</strong></label>
            <div class="col-md-6">
                <select id="man_id1" wire:model.live="selectedManufacturerWheel1"
                    class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control">
                    <option value="" selected>Select category</option>
                    @foreach ($manufacturersWheel1 as $manufacturer1)
                        <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value="{{ $manufacturer1->id }}">
                            {{ $manufacturer1->manufacturer_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if (!is_null($selectedManufacturerWheel1))
            <div class="form-group row">
                <label for="model" class="col-md-4 text-md-right text-white">Model</label>

                <div class="col-md-6">

                    <select onchange="change_wheel1()"
                        class="dark:text-gray-200
                        bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control"
                        name="wheel_id1" id="wheel_id1">
                        <option value="" selected>Choose product</option>
                        @if ($wheels1)
                            @foreach ($wheels1 as $wheel1)
                                <option value= "{{ $wheel1 }}">{{ $wheel1->model }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        @endif
    </div>
    {{-- wheels --}}
    <div>
        <div class="form-group row">
            <label for="category" class="col-md-4 text-md-right dark:text-gray-200 text-white"><strong>Manufacturer
                    (Wheel2)</strong></label>
            <div class="col-md-6">
                <select id="man_id2" wire:model.live="selectedManufacturerWheel2"
                    class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control">
                    <option value="" selected>Select category</option>
                    @foreach ($manufacturersWheel2 as $manufacturer2)
                        <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value="{{ $manufacturer2->id }}">
                            {{ $manufacturer2->manufacturer_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if (!is_null($selectedManufacturerWheel2))
            <div class="form-group row">
                <label for="model" class="col-md-4 text-md-right text-white">Model</label>

                <div class="col-md-6">

                    <select onchange="change_wheel2()"
                        class="dark:text-gray-200
                        bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control"
                        name="wheel_id2" id="wheel_id2">
                        <option value="" selected>Choose product</option>
                        @if ($wheels2)
                            @foreach ($wheels2 as $wheel2)
                                <option value= "{{ $wheel2 }}">{{ $wheel2->model }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        @endif
    </div>
    <div>
        {{-- <h1 class="text-white text-base" id=wheel_manufacturer></h1> --}}
        <h1 class="text-white text-base" id=wheel_id></h1>
        <h1 class="text-white text-base" id=wheel_model></h1>
        <h1 class="text-white text-base" id=wheel_></h1>
    </div>
    {{-- <h1 id="wheel1ID"></h1> --}}
    {{-- <h1 id="wheel2ID"></h1> --}}

    {{--  --}}
    <table class="bg-green-500 w-96 h-96 border border-yellow-400">
        <thead class="bg-red-600">
            <tr class="bg-blue-600">
                <th></th>
                <th id="wheel1ID"></th>
                <th id="wheel2ID">Model2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>gsag</td>
                <td>gsaggsa</td>
                <td>hsasasa</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    {{--  --}}


    {{-- <div class="flex flex-row justify-evenly" x-data="width = 100, { wheel_id: '', model: '', price: 0, wheel_type_id: 0, diameter: 0, ET_number: 0, bolt_pattern_id: 0, kba_number: '', center_bore: 0, nut_bolt_id: 0, multipiece: 0, note: '', accepted: 0 }">
    </div> --}}
    {{-- script --}}
    <script>
        let wheel1;
        let wheel2;

        function change_wheel1() {
            wheel1 = document.getElementById('wheel_id1').value;
            wheel1 = JSON.parse(wheel1);
            compare();
        }
        // document.getElementById('wheel1ID').innerHTML = wheel1.model;

        function change_wheel2() {
            wheel2 = document.getElementById('wheel_id2').value;
            wheel2 = JSON.parse(wheel2);
            compare();
        }

        function compare() {
            if (!!wheel1 && !!wheel2) {
                document.getElementById('wheel1ID').innerHTML = wheel1.model;
                document.getElementById('wheel2ID').innerHTML = wheel2.model;
                // document.getElementById('wheel1ID').innerHTML = wheel1.model;
                // document.getElementById('wheel2ID').innerHTML = wheel2.model;
                
            }
        }
        //kigyűjteni mind a 2 értékeit majd ábrázolni őket


        // document.getElementById('wheel2ID').innerHTML = wheel2.model;




        // function change_wheel(id) {

        //     if (id == 1) {
        //         wheel1 = document.getElementById(`wheel_id1`).value;
        //         wheel1 = JSON.parse(wheel1);
        //     } else {
        //         wheel2 = document.getElementById(`wheel_id2`).value;
        //         wheel2 = JSON.parse(wheel2);
        //     }

        //     document.getElementById('wheel1ID').innerHTML = wheel1.model
        //     document.getElementById('wheel2ID').innerHTML = wheel2.model

        // }

        // function change_wheel1() {
        //     change_wheel(1);
        // }

        // function change_wheel2() {
        //     change_wheel(2);
        // }

        function rajzolj() {
            // let helyzetWheel = document.getElementById('wheel_id');
            // let helyzet = document.getElementById('car_id');
            // console.log(helyzet);
        }

        function szamolas() {

            // document.getElementById("wheel_manufacturer").innerHTML = (jswheel.manufacturer_id);
            // document.getElementById("wheel_model").innerHTML = (jswheel.model);
            // document.getElementById("wheel_width").innerHTML = (jswheel.width);
            // document.getElementById("wheel_ET").innerHTML = (jswheel.ET_number);
        }

        function change_car() {
            // jscar = document.getElementById('car_id').value;
            // jscar = JSON.parse(jscar);
            // felnidistance = jscar.mtsurface_fender_distance;
            // // console.log(jscar);
            // ctx.reset();
            // szamolas();
        }

        function change_wheel() {
            // jswheel = document.getElementById('wheel_id').value;
            // jswheel = JSON.parse(jswheel);
            // felniwidth = jswheel.width * 25;
            // felnibal = felniwidth / 2;
            // felnijobb = felniwidth / 2;
            // felniET = jswheel.ET_number;

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

        //ha 0 nincs korrekció
        //ha 1 tehát + ET szám van akkor a baloldalit
    </script>
</div>
