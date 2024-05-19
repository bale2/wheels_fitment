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

                    <select wire:model.live="selectedModelWheel1"
                        class="dark:text-gray-200
                        bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control"
                        name="wheel_id1" id="wheel_id1">
                        <option value="" selected>Choose product</option>
                        @if ($wheels1)
                            @foreach ($wheels1 as $wheel1)
                                <option value="{{ $wheel1 }}">{{ $wheel1->model }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        @endif
    </div>
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

                    <select wire:model.live="selectedModelWheel2"
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
        @if (!is_null($selectedModelWheel1) && !is_null($selectedModelWheel2))
            <table class="bg-green-500 w-96 h-96 border border-yellow-400">
                <thead class="bg-red-600">
                    <tr class="bg-blue-600">
                        <th>Model</th>
                        <th><a href="/wheels/{{ $wh1->id }}">{{ $wh1->model }}</a></th>
                        <th><a href="/wheels/{{ $wh2->id }}">{{ $wh2->model }}</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Manufacturer</td>
                        <td>{{ $wh1->manufacturer->manufacturer_name }}</td>
                        <td>{{ $wh2->manufacturer->manufacturer_name }}</td>
                    </tr>
                    <tr>
                        <td>Diameter</td>
                        <td>{{ $wh1->diameter }}</td>
                        <td>{{ $wh2->diameter }}</td>
                    </tr>
                    <tr>
                        <td>Width</td>
                        <td>{{ $wh1->width }}</td>
                        <td>{{ $wh2->width }}</td>
                    </tr>
                    <tr>
                        <td>ET number</td>
                        <td>{{ $wh1->ET_number }}</td>
                        <td>{{ $wh2->ET_number }}</td>
                    </tr>
                    <tr>
                        <td>Center bore</td>
                        <td>{{ $wh1->center_bore }}</td>
                        <td>{{ $wh2->center_bore }}</td>
                    </tr>
                    <tr>
                        <td>KBA number</td>
                        <td>{{ $wh1->kba_number }}</td>
                        <td>{{ $wh2->kba_number }}</td>
                    </tr>
                    <tr>
                        <td>Bolt pattern:</td>
                        <td>{{ $wh1->boltPattern->bolt_pattern }}</td>
                        <td>{{ $wh2->boltPattern->bolt_pattern }}</td>
                    </tr>
                    <tr>
                        <td>Mounting type:</td>
                        <td>{{ $wh1->nutBolt->type }}</td>
                        <td>{{ $wh2->nutBolt->type }}</td>
                    </tr>
                    <tr>
                        <td>Wheel type:</td>
                        <td>{{ $wh1->wheelType->wheel_type }}</td>
                        <td>{{ $wh2->wheelType->wheel_type }}</td>
                    </tr>
                    <tr>
                        <td>Wheel design:</td>
                        <td>{{ $wh1->wheelType->wheel_type ? 'Multipiece' : 'Single Piece' }}</td>
                        <td>{{ $wh2->wheelType->wheel_type ? 'Multipiece' : 'Single Piece' }}</td>
                    </tr>
                    <tr>
                        <td>Estimated price:</td>
                        <td>{{ $wh1->price }}</td>
                        <td>{{ $wh2->price }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><img src="{{ asset('photos/' . $wh1->photos()[0]) }}" alt="image of the ad"
                                class="mt-10 mb-auto mx-auto h-20 w-auto "></td>
                        <td><img src="{{ asset('photos/' . $wh2->photos()[0]) }}" alt="image of the ad"
                                class="mt-10 mb-auto mx-auto h-20 w-auto "></td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>

</div>
