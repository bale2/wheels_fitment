<div>
    <div class="form-group row">
        <label for="manufacturer"
            class="col-md-4 text-md-right dark:text-gray-200 text-white"><strong>Manufacturer</strong></label>
        <div class="col-md-6">
            <select id="manufacturer" wire:model.live="selectedManufacturer"
                class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control">
                <option value="" selected>Select Manufacturer</option>
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
                <select id="model" wire:model.live="selectedModel"
                    class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control"
                    name="car_id">
                    <option value="" selected>Choose Model</option>
                    @if ($cars)
                        @foreach ($cars as $car)
                            <option value={{ $car->id }}>{{ $car->car_model }}</option>
                        @endforeach
                    @endif
                </select>

            </div>
        </div>
    @endif
    @if (!is_null($selectedModel))
        <div>
            <h1 class="text-white">Car's center bore: {{ $car->center_bore }}</h1>
        </div>
    @endif
</div>
