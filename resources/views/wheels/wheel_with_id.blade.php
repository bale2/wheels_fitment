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
                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center dark:text-gray-200">
                    {{$wheel->model}}
                </h2>
            </div>
            <div>
                <a href="/ad_create"><div class="bg-slate-200 font-semibold text-xl text-gray-800 leading-tight rounded-3xl pl-5 mr-1 text-center">Hirdetésfeladás</div></a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5 grid grid-cols-2 dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>{{$wheel->id}}</h1>
                        <h1>{{$wheel->manufacturer->manufacturer_name}}</h1>
                        <h1>{{$wheel->model}}</h1>
                        <h1>{{$wheel->price}}</h1>
                        <h1>{{$wheel->wheelType->wheel_type}}</h1>
                        <h1>{{$wheel->diameter}}</h1>
                        <h1>{{$wheel->width}}</h1>
                        <h1>{{$wheel->ET_number}}</h1>
                        <h1>{{$wheel->boltPattern->bolt_pattern}}</h1>
                        <h1>{{$wheel->kba_number}}</h1>
                        <h1>{{$wheel->center_bore}}</h1>
                        <h1>{{$wheel->nutBolt->type}}</h1>
                        <h1>{{$wheel->multipiece}}</h1>
                        <h1>{{$wheel->photo}}</h1>
                        <h1>{{$wheel->note}}</h1>
                        <h1>{{$wheel->created_at}}</h1>
                        <h1>{{$wheel->updated_at}}</h1>
                </div>
                <div>
                    <img src="{{asset('photos/' . $wheel->photo)}}" alt="image of the ad" class="mt-10 mb-auto mx-auto h-40 w-auto ">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>