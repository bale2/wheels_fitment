<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <div class="w-3 ">
                <a href="/users"><svg fill="#000000" class="h-5 w-5" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 26.676 26.676" xml:space="preserve">

                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path
                                    d="M26.105,21.891c-0.229,0-0.439-0.131-0.529-0.346l0,0c-0.066-0.156-1.716-3.857-7.885-4.59 c-1.285-0.156-2.824-0.236-4.693-0.25v4.613c0,0.213-0.115,0.406-0.304,0.508c-0.188,0.098-0.413,0.084-0.588-0.033L0.254,13.815 C0.094,13.708,0,13.528,0,13.339c0-0.191,0.094-0.365,0.254-0.477l11.857-7.979c0.175-0.121,0.398-0.129,0.588-0.029 c0.19,0.102,0.303,0.295,0.303,0.502v4.293c2.578,0.336,13.674,2.33,13.674,11.674c0,0.271-0.191,0.508-0.459,0.562 C26.18,21.891,26.141,21.891,26.105,21.891z" />
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                            </g>
                        </g>

                    </svg></a>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ $user->name }}
            </h2>
        </div>
    </x-slot>
    <div x-data="{ wheel_id: '', manufacturer_id: 0, model: '', price: 0, wheel_type_id: 0, diameter: 0, width: 0, ET_number: 0, bolt_pattern_id: 0, kba_number: '', center_bore: 0, nut_bolt_id: 0, multipiece: 0, note: '', accepted: 0 }">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                <div
                    class="p-6 text-gray-900 dark:text-gray-100 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800">
                    <div>
                        <h1 class="text-white text-xl mb-2">{{ $user->name }}'s wheels:</h1>
                        @foreach ($user->wheels as $one)
                            <div class="flex flex-row">
                                <a href="/wheels/{{ $one->id }}">
                                    <p class=" text-white text-lg ml-5 mb-1 pr-5">
                                        {{ $one->manufacturer->manufacturer_name }}
                                        {{ $one->model }}
                                    </p>
                                </a>
                                <form method="post" action="{{ route('user_wheel_post_delete') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" value="{{ $user->id }}" name="user_id_userpage"
                                        class="block w-full" />
                                    <input type="hidden" value="{{ $one->id }}" name="wheel_id_userpage"
                                        class="block w-full" />

                                    <input type="submit" value="delete"
                                        class="inline-flex items-center px-2 py-1 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <h1 class="text-white text-xl mb-2">{{ $user->name }}'s cars:</h1>
                        @foreach ($user->cars as $one)
                            <div class="flex flex-row">

                                <a href="/cars/{{ $one->id }}" class="w-fit pr-5">
                                    <p class=" text-white text-lg ml-5 mb-1 w-fit">
                                        {{ $one->manufacturer->manufacturer_name }}
                                        {{ $one->car_model }}
                                    </p>
                                </a>
                                <form method="post" action="{{ route('user_car_post_delete') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" value="{{ $user->id }}" name="user_id_userpage"
                                        class="block w-full" />
                                    <input type="hidden" value="{{ $one->id }}" name="car_id_userpage"
                                        class="block w-full" />

                                    <input type="submit" value="delete"
                                        class="inline-flex items-center px-2 py-1 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-white text-xl ">
                        <h1 class="mt-2">{{ $user->name }}'s details:</h1>
                        <div class="ml-5">
                            <h2>Email: {{ $user->email }}</h2>
                            <h2>Last logged in:{{ $user->updated_at }}</h2>
                            <h2>Registered: {{ $user->created_at }}</h2>
                        </div>
                    </div>
                </div>
                <h1 class="ml-4 text-white text-xl my-auto">{{ $user->name }}'s ads:</h1>
                @foreach ($user->ads as $one)
                    <a href="/ads/{{ $one->id }}">
                        <div
                            class=" flex flex-row justify-start p-6 text-gray-900 dark:text-gray-100 bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800">
                            <div>
                                <p class=" text-white text-bold text-lg">{{ $one->title }}</p>
                                <p class="text-base">{{ $one->price }} €</p>
                                <p class="text-base">{{ $one->wheel->manufacturer->manufacturer_name }}
                                    {{ $one->wheel->model }}
                                </p>
                            </div>
                            <div class="pl-[70%] my-auto">
                                <img src="{{ asset('photos/' . $one->photos()[0]) }}" alt="image of the ad"
                                    class="mx-auto h-20 object-scale-down">
                            </div>
                        </div>
                    </a>
                @endforeach
                @if (Auth::user() and (Auth::user()->is_admin or Auth::user()->id == $user->id))
                    <div class="flex flex-row">
                        <div
                            class="p-6 w-1/2 bg-white overflow-hidden shadow-sm  my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                            <h1 class="text-slate-400 text-lg">Add wheel to the user:</h1>
                            <div class="pl-5">
                                @livewire('DependentDropdownForUsersWheels', ['user_id' => $user->id])
                            </div>
                        </div>
                        <div
                            class="p-6 w-1/2 bg-white overflow-hidden shadow-sm  my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                            <h1 class="text-slate-400 text-lg">Add car to the user:</h1>
                            <div class="pl-5">
                                @livewire('DependentDropdownForUsersCars', ['user_id' => $user->id])
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
