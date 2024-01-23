<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Ads') }}
        </h2>
        <div><div class="bg-slate-200 font-semibold text-xl text-gray-800 leading-tight rounded-3xl pl-5 mr-1 text-center">Hirdetésfeladás</div></div>
        </div>
    </x-slot>
<div class="bg-purple-800">
    <div class="pt-4">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($ads as $ad)
            <div class="bg-slate-400 overflow-hidden shadow-sm sm:rounded-lg mt-5">


                <div class="p-6 text-gray-900">
                    <h1>{{$ad->ad_id}}</h1>
                    <h1>{{$ad->wheel_id}}</h1>
                    <h1>{{$ad->title}}</h1>
                    <h1>{{$ad->description}}</h1>
                    <h1>{{$ad->price}}</h1>
                    <h1>{{$ad->user_id}}</h1>
                    <h1>{{$ad->place}}</h1>
                    <h1>{{$ad->uploaded_at}}</h1>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
</x-app-layout>
