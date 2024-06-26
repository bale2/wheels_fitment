<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around ">
            <div class="w-3 ">
                <a href="/wheels"><svg fill="#000000" class="h-5 w-5" version="1.1" id="Capa_1"
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
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                    Wheel Types
                </h2>
            </div>
            @if (Auth::user() && Auth::user()->is_admin)
                <x-primary-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal','wheel_type_create')">
                    Add wheel type
                </x-primary-button>
            @endif
        </div>
    </x-slot>
    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            @foreach ($wheel_types as $wheel_type)
                @if ($wheel_type->wheel_type != 'Unknown')
                    <a href="/wheel_types/{{ $wheel_type->id }}">
                        <div
                            class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:hover:bg-blue-900 mb-12">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h1>{{ $wheel_type->wheel_type }}</h1>
                                {{-- <h1>{{ $prev_url }}</h1> --}}
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
            {{ $wheel_types->links() }}
        </div>
    </div>
    <div class="text-center">
        <x-modal name="wheel_type_create" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('wheel_type_create_post') }}" class="mt-6 space-y-6 "
                enctype="multipart/form-data">
                @csrf
                @method('post')
                {{-- type --}}
                <x-input-label for="type" :value="__('Wheel Type')" class="dark:text-gray-200" />
                <x-text-input id="type" name="type" class="field"
                    class="dark:text-gray-200 bg-white dark:bg-gray-800" />
                <input type="submit" value="upload"
                    class="mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
            </form>
        </x-modal>
    </div>
</x-app-layout>
