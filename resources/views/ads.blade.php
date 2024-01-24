<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                {{ __('Ads') }}
            </h2>
            <div>
                <a href="/ad_create"><div class="bg-slate-200 font-semibold text-xl text-gray-800 leading-tight rounded-3xl pl-5 mr-1 text-center">Hirdetésfeladás</div></a>
            </div>
        </div>
    </x-slot>
<div class="bg-purple-800">
    <div class="pt-4">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 py-5 sm:rounded-lg">
            @foreach ($ads as $ad)
            <a href="ads/{{$ad->ad_id}}">
                <div class="bg-slate-400 overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg mt-5">
                    <div class="p-6 text-gray-900 ">
                        {{-- <h1>{{$ad->ad_id}}</h1>
                        <h1>{{$ad->wheel_id}}</h1> --}}
                        <h1 class="font-semibold text-xl text-gray-800">{{$ad->title}}</h1>
                        {{-- <h1>{{$ad->description}}</h1> --}}
                        <h1>{{$ad->price}} Ft</h1>
                        <h1>{{$ad->name}}</h1>
                        <h1>{{$ad->place}}</h1>
                        <h1>{{$ad->uploaded_at}}</h1>
                    </div>
                    <div>
                        <img src="{{asset('photos/' . $ad->photo)}}" alt="image of the ad" class="mt-10 mb-auto mx-auto h-20 w-auto ">
                    </div>
                </div>
            </a>
            @endforeach
            {{-- @foreach ($users as $user)
                <h1>{{$user->name}}</h1>

            @endforeach --}}
            {{-- <h1>{{$users->name}}</h1> --}}
        </div>
    </div>
</div>
</x-app-layout>
