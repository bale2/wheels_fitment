<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around ">
            <div class="w-3 ">
                <a href="/ads" ><svg fill="#000000" class="h-5 w-5" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26.676 26.676" xml:space="preserve">

                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                    <g id="SVGRepo_iconCarrier"> <g> <path d="M26.105,21.891c-0.229,0-0.439-0.131-0.529-0.346l0,0c-0.066-0.156-1.716-3.857-7.885-4.59 c-1.285-0.156-2.824-0.236-4.693-0.25v4.613c0,0.213-0.115,0.406-0.304,0.508c-0.188,0.098-0.413,0.084-0.588-0.033L0.254,13.815 C0.094,13.708,0,13.528,0,13.339c0-0.191,0.094-0.365,0.254-0.477l11.857-7.979c0.175-0.121,0.398-0.129,0.588-0.029 c0.19,0.102,0.303,0.295,0.303,0.502v4.293c2.578,0.336,13.674,2.33,13.674,11.674c0,0.271-0.191,0.508-0.459,0.562 C26.18,21.891,26.141,21.891,26.105,21.891z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g>

                </svg></a>
            </div>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                    Hirdetés hozzáadása
                </h2>
            </div>
            <div>
                &nbsp;
            </div>
        </div>
    </x-slot>
<div class="bg-purple-800 py-2">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-400 overflow-hidden shadow-sm sm:rounded-lg my-5 py-1">
                <div class="px-6 text-gray-900 mx-5">
                    <form method="post" action="{{ route('ad_create_post') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                    {{-- wheel_id --}}
                    <div class="mt-4">
                        <x-input-label for="wheel_id" :value="__('wheel_id')" />
                        <x-text-input id="wheel_id" type="number" name="wheel_id" class="block mt-1 w-full"/>
                    </div>
                    {{-- title --}}
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('title')" />
                        <x-text-input id="title" type="text" name="title" class="block mt-1 w-full"/>
                    </div>
                    {{-- description --}}
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('description')" />
                        <x-text-input id="description" type="text" name="description" class="block mt-1 w-full"/>
                    </div>
                    {{-- price --}}
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('price')" />
                        <x-text-input id="price" type="number" name="price" class="block mt-1 w-full"/>
                    </div>
                    {{-- user_id --}}
                    <div class="mt-4">
                        <x-text-input id="user_id" type="hidden" value="{{ Auth::user()->id }}" name="user_id" class="block mt-1 w-full"/>
                    </div>
                    {{-- place --}}
                    <div class="mt-4">
                        <x-input-label for="place" :value="__('place')" />
                        <x-text-input id="place" type="text" name="place" class="block mt-1 w-full"/>
                    </div>

                    <input type="submit" value="feltöltés" class="text-lg bg-white shadow-sm sm:rounded-lg my-3 px-1 py-1">
                    </form>
                </div>
            </div>
        </div>
</div>
</x-app-layout>
