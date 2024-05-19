<div>
    <div class="form-group row">
        <label for="category"
            class="col-md-4 text-md-right dark:text-gray-200 text-white"><strong>Manufacturer</strong></label>
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
                <form method="post" action="{{ route('user_car_post') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <input type="hidden" value="{{ $user_id }}" name="user_id_userpage" class="block w-full" />
                    <select required
                        class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control"
                        name="car_id">
                        <option value="" selected>Choose product</option>
                        @if ($cars)
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->car_model }}</option>
                            @endforeach
                        @endif
                    </select>

                    <input type="submit" value="upload"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                </form>
            </div>
        </div>
    @endif
</div>
