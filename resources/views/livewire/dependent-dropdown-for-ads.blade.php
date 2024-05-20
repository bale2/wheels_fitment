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

    {{-- @if (!is_null($selectedManufacturer)) --}}
    <div class="form-group row">
        <label for="model" class="col-md-4 text-md-right text-white">Model</label>
        <div class="col-md-6">
            <form method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                {{-- <input type="hidden" value="{{ $car_id }}" name="car_id_carpage" class="block w-full" /> --}}
                <select required
                    class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80 form-control"
                    name="wheel_id">
                    <option value="" selected>Choose product</option>
                    @if ($wheels)
                        @foreach ($wheels as $wheel)
                            <option value="{{ $wheel->id }}">{{ $wheel->model }}</option>
                        @endforeach
                    @endif
                </select>
                @error('wheel_id')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror

                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" class="dark:text-gray-200" />
                    <x-text-input id="title" type="text" value="{{ old('title') }}" name="title"
                        class="block mt-1 w-full" />
                    @error('title')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                {{-- description --}}
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" class="dark:text-gray-200" />
                    <textarea id="description" type="text" value="{{ old('description') }}" name="description"
                        class="sm:w-[100%] w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                {{-- price --}}
                <div class="mt-4">
                    <x-input-label for="price" :value="__('Price')" class="dark:text-gray-200" />
                    <x-text-input id="price" type="number" value="{{ old('price') }}" name="price"
                        class="block mt-1 w-full" />
                    @error('price')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                {{-- user_id --}}
                <div class="mt-4">
                    <x-text-input id="user_id" type="hidden" value="{{ Auth::user()->id }}" name="user_id"
                        class="block mt-1 w-full" />
                </div>
                {{-- place --}}
                <div class="mt-4">
                    <x-input-label for="place" :value="__('Place')" class="dark:text-gray-200" />
                    <x-text-input id="place" type="text" value="{{ old('place') }}" name="place"
                        class="block mt-1 w-full" />
                    @error('place')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                {{-- photo --}}
                <div class="mt-4">
                    <x-input-label for="photo" :value="__('Photo')" class="dark:text-gray-200" />
                    <x-text-input id="photo" type="file" value="{{ old('photo[]') }}" multiple name="photo[]"
                        class="block mt-1 w-full" />
                    @error('photo')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                    @error('photo.*')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                    @if ($errors->any())
                        <small class="text-red-600">Upload the picture again</small>
                    @endif
                </div>

                <div class="mt-4">
                    <x-text-input id="accepted" type="hidden" value=0 name="accepted" class="block mt-1 mx-52" />
                </div>


                <input type="submit" value="upload"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
            </form>
        </div>
    </div>
    {{-- @endif --}}
</div>
