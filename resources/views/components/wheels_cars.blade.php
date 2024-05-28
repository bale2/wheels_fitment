<div
    class=" p-6 bg-ruddy-blue overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    <h1 class="mb-2 dark:text-slate-400 text-black text-lg">Accepted wheels:</h1>
    @foreach ($car->wheels ?? $wheel->cars as $one)
        @if ($one->pivot->accepted == 1 or $one->pivot->accepted == 0 && Auth::user() && Auth::user()->is_admin)
            <div class="flex flex-row justify-start mb-2">
                <div>
                    <a href='/wheels/{{ $one->id }}'>
                        <h3 class="dark:text-white px-5 underline underline-offset-2">
                            -{{ $one->manufacturer->manufacturer_name }}
                            {{ $one->model }} {{ $one->car_model }}
                        </h3>
                    </a>
                </div>
                @if (Auth::user() && Auth::user()->is_admin)
                    <div>
                        <form method="post" action="{{ route('car_wheel_update_post') }}"
                            class="flex items-center flex-col gap-y-4">
                            @csrf
                            @method('post')
                            <input type="hidden" value="{{ $one->pivot->car_id }}" name="car_id" />
                            <input type="hidden" value="{{ $one->pivot->wheel_id }}" name="wheel_id" />
                            <div class="flex justify-center pb-1 -mt-2">
                                @if ($one->pivot->accepted == 0)
                                    <div class=" flex items-center w-20">
                                        <label for="accepted-1"
                                            class=" my-auto ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Accept</label>
                                        <input required id="accepted-1" type="radio" value="1" name="accept"
                                            class="my-auto w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>

                                    <div class="flex items-center w-20">
                                        <label for="accepted-2"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Delete</label>
                                        <input required id="accepted-2" type="radio" value="0" name="accept"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>

                                    <input type="submit" value="Send"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-1 me-2 mb-2 mt-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                @else
                                    <button
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-1 me-2 mt-1 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                        name="accept" value="0" type="submit">Delete</button>
                                @endif
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        @endif
    @endforeach
</div>
