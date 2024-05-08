<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Compatible wheels') }}
            </h2>

        </div>
    </x-slot>

    <div x-data="{ wheel_id: '', manufacturer_id: 0, model: '', price: 0, wheel_type_id: 0, diameter: 0, width: 0, ET_number: 0, bolt_pattern_id: 0, kba_number: '', center_bore: 0, nut_bolt_id: 0, multipiece: 0, note: '', accepted: 0 }">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                @foreach ($wheels as $wheel)
                    @if ($wheel->id != 1)
                        <a href="/wheels/{{ $wheel->id }}">
                            <div
                                class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 mb-1">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    {{-- <h1>ID: {{ $wheel->id }}</h1> --}}
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                                        {{ $wheel->title }}
                                    </h1>
                                    <h1>Gyártó: {{ $wheel->manufacturer->manufacturer_name }}</h1>
                                    <h1>Model :{{ $wheel->model }}</h1>
                                    {{-- <h1>Típus: {{ $wheel->wheelType->wheel_type }}</h1> --}}
                                    {{-- <h1>Szélesség: {{ $wheel->width }}</h1> --}}
                                    {{-- <h1>ET szám: {{ $wheel->ET_number }} --}}
                                    <h1>Osztókör:{{ $wheel->boltPattern->bolt_pattern }}</h1>
                                    <h1>Átmérő: {{ $wheel->diameter }} &emsp; Szélesség: {{ $wheel->width }}</h1>
                                    {{-- <h1>Osztókör:{{ $wheel->boltPattern->bolt_pattern }}</h1> --}}
                                    {{-- <h1>KBA szám:{{ $wheel->kba_number }}</h1> --}}
                                    {{-- <h1>Középfurat: {{ $wheel->center_bore }}</h1> --}}
                                    {{-- <h1>Felfogatás: {{ $wheel->nutBolt->type }}</h1> --}}
                                    {{-- <h1>Felépítés:
                                        @if ($wheel->multipiece == 0)
                                            Egyrészes
                                        @else
                                            Többrészes
                                        @endif
                                    </h1> --}}
                                    {{-- <h1>Kép: {{ $wheel->photo }}</h1> --}}
                                </div>
                                <div>
                                    @foreach ($wheel->photos() as $photo)
                                        <img src="{{ asset('photos/' . $photo) }}" alt="image of the ad"
                                            class="mt-10 mb-auto mx-auto h-20 w-auto ">
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
                {{ $wheels->links() }}
            </div>
        </div>
    </div>
</x-app-layout>