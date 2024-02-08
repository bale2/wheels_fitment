<x-app-layout>
    <x-slot name="header" >
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Wheels') }}
            </h2>
            <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                <a href="/wheel_create">Kerék hozzáadása</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            @foreach ($wheels as $wheel)
            <a href="wheels/{{$wheel->id}}">
                <div class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 mb-12">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">{{$wheel->title}}</h1>
                        <h1>Gyártó: {{$wheel->manufacturer->manufacturer_name}}</h1>
                        <h1>Model :{{$wheel->model}}</h1>
                        <h1>Típus: {{$wheel->wheelType->wheel_type}}</h1>
                        <h1>Átmérő: {{$wheel->diameter}}</h1>
                        <h1>Szélesség: {{$wheel->width}}</h1>
                        <h1>ET szám: {{$wheel->ET_number}}</h1>
                        <h1>Osztókör:{{$wheel->boltPattern->bolt_pattern}}</h1>
                        <h1>KBA szám:{{$wheel->kba_number}}</h1>
                        <h1>Középfurat: {{$wheel->center_bore}}</h1>
                        <h1>Felfogatás: {{$wheel->nutBolt->type}}</h1>
                        <h1>Többrészes: {{$wheel->multipiece}}</h1>
                        <h1>Kép: {{$wheel->photo}}</h1>
                    </div>
                    <div>
                        <img src="{{asset('photos/' . $wheel->photo)}}" alt="image of the wheel" class="mt-10 mb-auto mx-auto h-20 w-auto ">
                    </div>
                </div>
            </a>
            @endforeach
        </div>
</div>
</x-app-layout>
