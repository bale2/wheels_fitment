<x-app-layout>
    <x-slot name="header" >
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Ads') }}
            </h2>
            <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                <a href="/ad_create">Hirdetésfeladás</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12"> {{-- ad körüli tér --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            @foreach ($ads as $ad)
            <a href="ads/{{$ad->id}}">
                <div class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 mb-12">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">{{$ad->title}}</h1>
                        <h1>{{$ad->price}} Ft</h1>
                        <h1>{{$ad->user->name}}</h1>
                        <h1>{{$ad->place}}</h1>
                        <h1>{{$ad->updated_at}}</h1>
                    </div>
                    <div>
                        <img src="{{asset('photos/' . $ad->photo)}}" alt="image of the ad" class="mt-10 mb-auto mx-auto h-20 w-auto ">
                    </div>
                </div>
            </a>
            @endforeach
        </div>
</div>
</x-app-layout>
