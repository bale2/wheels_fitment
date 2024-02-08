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
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                    Adding a wheel
                </h2>
            </div>
            <div>
                &nbsp;
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900 mx-5 ">
                    <form method="post" action="{{ route('wheel_create_post') }}" class="mt-6 space-y-6 " enctype="multipart/form-data">
                        @csrf
                        @method('post')
                    {{-- manufacturer_id --}}
                    <x-input-label for="manufacturer" :value="__('Manufacturer')" class="dark:text-gray-200" />
                    <select id="manufacturer" name="manufacturer_id" class="field" class="dark:text-gray-200 bg-white dark:bg-gray-800">
                        @foreach ($manufacturers as $manufacturer)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800"  value={{$manufacturer->id}}>{{$manufacturer->manufacturer_name}}</option>
                        @endforeach
                    </select>
                    {{-- model --}}
                    <div class="mt-4">
                        <x-input-label for="model" :value="__('Model')" class="dark:text-gray-200" />
                        <x-text-input id="model" type="text" name="model" class="block mt-1 w-full"/>
                    </div>
                    {{-- price --}}
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" class="dark:text-gray-200"/>
                        <x-text-input id="price" type="number" name="price" class="block mt-1 w-full"/>
                    </div>
                    {{-- wheel_type_id --}}
                    <x-input-label for="wheel_type" :value="__('Wheel_type')" class="dark:text-gray-200"/>
                    <select id="wheel_type" name="wheel_type_id" class="field" class="dark:text-gray-200 bg-white dark:bg-gray-800">
                        @foreach ($wheelTypes as $wheelType)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800"  value={{$wheelType->id}}>{{$wheelType->wheel_type}}</option>
                        @endforeach
                    </select>
                    {{-- diameter --}}
                    <div class="mt-4">
                        <x-input-label for="diameter" :value="__('Diameter')" class="dark:text-gray-200"/>
                        <x-text-input id="diameter" type="number" name="diameter" class="block mt-1 w-full"/>
                    </div>
                    {{-- width --}}
                    <div class="mt-4">
                        <x-input-label for="width" :value="__('Width')" class="dark:text-gray-200"/>
                        <x-text-input id="width" type="number" name="width" class="block mt-1 w-full"/>
                    </div>
                    {{-- ET_number --}}
                    <div class="mt-4">
                        <x-input-label for="ET_number" :value="__('ET_number')" class="dark:text-gray-200"/>
                        <x-text-input id="ET_number" type="number" name="ET_number" class="block mt-1 w-full"/>
                    </div>
                    {{-- bolt_pattern_id --}}
                    <x-input-label for="bolt_pattern" :value="__('Bolt pattern')" class="dark:text-gray-200"/>
                    <select id="bolt_pattern" name="bolt_pattern_id" class="field" class="dark:text-gray-200 bg-white dark:bg-gray-800">
                        @foreach ($boltPatterns as $boltPattern)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800"  value={{$boltPattern->id}}>{{$boltPattern->bolt_pattern}}</option>
                        @endforeach
                    </select>
                    {{-- kba_number --}}
                    <div class="mt-4">
                        <x-input-label for="kba_number" :value="__('KBA_number')" class="dark:text-gray-200"/>
                        <x-text-input id="kba_number" type="text" name="kba_number" class="block mt-1 w-full"/>
                    </div>
                    {{-- center_bore --}}
                    <div class="mt-4">
                        <x-input-label for="center_bore" :value="__('Center_bore')" class="dark:text-gray-200"/>
                        <x-text-input id="center_bore" type="number" name="center_bore" class="block mt-1 w-full"/>
                    </div>
                    {{-- nut_bolt_id --}}
                    <x-input-label for="nut_bolt" :value="__('Nut OR Bolt')" class="dark:text-gray-200"/>
                    <select id="nut_bolt" name="nut_bolt_id" class="field" class="dark:text-gray-200 bg-white dark:bg-gray-800">
                        @foreach ($nutBolts as $nutBolt)
                            <option class="dark:text-gray-200 bg-white dark:bg-gray-800"  value={{$nutBolt->id}}>{{$nutBolt->type}}</option>
                        @endforeach
                    </select>
                    {{-- multipiece --}}
                    <div class="mt-4">
                        <x-input-label for="multipiece" :value="__('Multipiece')" class="dark:text-gray-200"/>
                        <x-text-input id="multipiece" type="number" name="multipiece" class="block mt-1 w-full"/>
                    </div>
                    {{-- photo --}}
                    <div class="mt-4">
                        <x-input-label for="photo" :value="__('Photo')" class="dark:text-gray-200"/>
                        <x-text-input id="photo" type="file" name="photo" class="block mt-1 w-full"/>
                    </div>
                    {{-- note --}}
                    <div class="mt-4">
                        <x-input-label for="note" :value="__('Note')" class="dark:text-gray-200"/>
                        <x-text-input id="note" type="text" name="note" class="block mt-1 w-full"/>
                    </div>


                    <input type="submit" value="feltöltés" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
