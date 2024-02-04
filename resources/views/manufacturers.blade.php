<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                {{ __('Manufacturers') }}
            </h2>
            <div>
                <a href="/manufacturer_create"><div class="bg-slate-200 font-semibold text-xl text-gray-800 leading-tight rounded-3xl pl-5 mr-1 text-center">Gyártó hozzáadása</div></a>
            </div>
        </div>
    </x-slot>
<div class="bg-purple-800">
    <div class="pt-4">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 py-5 sm:rounded-lg">
            @foreach ($manufacturers as $ad)
            <a href="ads/{{$ad->id}}">
                <div class="bg-slate-400 overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg mt-5">
                    <div class="p-6 text-gray-900 ">
                        <h1>{{$ad->manufacturer_name}}</h1>
                        @if ($ad->only_wheel_maker)
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
</div>
</x-app-layout>
