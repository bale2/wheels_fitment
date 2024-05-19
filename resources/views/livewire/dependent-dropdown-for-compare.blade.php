<div class="flex flex-col ">
    <div class="w-1/2 flex flex-row  mt-2 ">
        <div class="mx-10">
            <div class="form-group row">
                <label for="category" class="col-md-4 text-md-right dark:text-gray-200 text-white"><strong>Manufacturer
                        (Wheel1)</strong></label>
                <div class="col-md-6">
                    <select id="man_id1" wire:model.live="selectedManufacturerWheel1"
                        class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control">
                        <option value="" selected>Select category</option>
                        @foreach ($manufacturersWheel1 as $manufacturer1)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800"
                                value="{{ $manufacturer1->id }}">
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
        <div class="mb-10">
            <div class="form-group row">
                <label for="category" class="col-md-4 text-md-right dark:text-gray-200 text-white"><strong>Manufacturer
                        (Wheel2)</strong></label>
                <div class="col-md-6">
                    <select id="man_id2" wire:model.live="selectedManufacturerWheel2"
                        class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control">
                        <option value="" selected>Select category</option>
                        @foreach ($manufacturersWheel2 as $manufacturer2)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800"
                                value="{{ $manufacturer2->id }}">
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
    </div>
    <div class="w-1/2 mt-5 mx-auto">
        @if (!is_null($selectedModelWheel1) && !is_null($selectedModelWheel2))
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table
                    class="border border-solid border-white text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Model</th>
                            <th scope="col" class="px-6 py-3"><a
                                    href="/wheels/{{ $wh1->id }}">{{ $wh1->model }}</a></th>
                            <th scope="col" class="px-6 py-3"><a
                                    href="/wheels/{{ $wh2->id }}">{{ $wh2->model }}</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">Manufacturer</td>
                            <td class="px-6 py-4">{{ $wh1->manufacturer->manufacturer_name }}</td>
                            <td class="px-6 py-4">{{ $wh2->manufacturer->manufacturer_name }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">Diameter</td>
                            <td class="px-6 py-4">{{ $wh1->diameter }}</td>
                            <td class="px-6 py-4">{{ $wh2->diameter }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">Width</td>
                            <td class="px-6 py-4">{{ $wh1->width }}</td>
                            <td class="px-6 py-4">{{ $wh2->width }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">ET number</td>
                            <td class="px-6 py-4">{{ $wh1->ET_number }}</td>
                            <td class="px-6 py-4">{{ $wh2->ET_number }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">Center bore</td>
                            <td class="px-6 py-4">{{ $wh1->center_bore }}</td>
                            <td class="px-6 py-4">{{ $wh2->center_bore }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">KBA number</td>
                            <td class="px-6 py-4">{{ $wh1->kba_number }}</td>
                            <td class="px-6 py-4">{{ $wh2->kba_number }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">Bolt pattern</td>
                            <td class="px-6 py-4">{{ $wh1->boltPattern->bolt_pattern }}</td>
                            <td class="px-6 py-4">{{ $wh2->boltPattern->bolt_pattern }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">Mounting type</td>
                            <td class="px-6 py-4">{{ $wh1->nutBolt->type }}</td>
                            <td class="px-6 py-4">{{ $wh2->nutBolt->type }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">Wheel type</td>
                            <td class="px-6 py-4">{{ $wh1->wheelType->wheel_type }}</td>
                            <td class="px-6 py-4">{{ $wh2->wheelType->wheel_type }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">Wheel design</td>
                            <td class="px-6 py-4">{{ $wh1->wheelType->wheel_type ? 'Multipiece' : 'Single Piece' }}
                            </td>
                            <td class="px-6 py-4">{{ $wh2->wheelType->wheel_type ? 'Multipiece' : 'Single Piece' }}
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">Estimated price</td>
                            <td class="px-6 py-4">{{ $wh1->price }}</td>
                            <td class="px-6 py-4">{{ $wh2->price }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800"></td>
                            <td class="px-6 py-4"><img src="{{ asset('photos/' . $wh1->photos()[0]) }}"
                                    alt="image of the ad" class="mt-10 mb-auto mx-auto h-20 w-auto "></td>
                            <td class="px-6 py-4"><img src="{{ asset('photos/' . $wh2->photos()[0]) }}"
                                    alt="image of the ad" class="mt-10 mb-auto mx-auto h-20 w-auto "></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>
