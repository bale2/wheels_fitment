<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Manufacturers') }}
            </h2>
            <div>
                <a href="/manufacturer_create"><div class="bg-slate-200 font-semibold text-xl text-gray-800 leading-tight rounded-3xl pl-5 mr-1 text-center">Gyártó hozzáadása</div></a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            @foreach ($manufacturers as $manufacturer)
            <a href="manufacturer/{{$manufacturer->id}}">
                <div class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 mb-12">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1>{{$manufacturer->manufacturer_name}}</h1>
                        @if ($manufacturer->only_wheel_maker)
                            <h1>Csak kerék gyártó</h1>
                        @else
                            <h1>Autó és kerékgyártó</h1>
                        @endif
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
