<div>
    <div class="form-group row">
        <label for="category" class="col-md-4 text-md-right dark:text-gray-200 text-white"><strong>Manufacturer
                (Wheels)</strong></label>
        <div class="col-md-6">
            <select id="Manufacturer_W" wire:model.live="selectedManufacturer"
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

                <form method="post" action="{{ route('car_wheel_post') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <input type="hidden" value="{{ $car_id }}" name="car_id_carpage" class="block w-full" />
                    <select required onChange="window.location.href=this.value"
                        class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control"
                        name="wheel_id">
                        <option value="" selected>Choose product</option>
                        @if ($wheels)
                            @foreach ($wheels as $wheel)
                                <option value="/wheels/{{ $wheel->id }}">{{ $wheel->model }}</option>
                            @endforeach
                        @endif
                    </select>

                </form>
            </div>
        </div>
    @endif
</div>
