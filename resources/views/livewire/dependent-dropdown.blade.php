<div>
    <div class="form-group row">
        <label for="category" class="col-md-4 text-md-right dark:text-gray-200 text-white"><strong>Manufacturer
                (Cars)</strong></label>
        <div class="col-md-6">
            <select wire:model.live="selectedManufacturer"
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
                <select
                    class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control"
                    name="car_id" onChange="window.location.href=this.value">
                    <option value="" selected>Choose product</option>
                    @if ($cars)
                        @foreach ($cars as $car)
                            <option value="/cars/{{ $car->id }}">{{ $car->car_model }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    @endif
</div>
