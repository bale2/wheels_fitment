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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            @foreach ($ads as $ad)
            <a href="ads/{{$ad->id}}">
                <div class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 ">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">{{$ad->title}}</h1>
                        <h1>{{$ad->price}} Ft</h1>
                        <h1>{{$ad->user->name}}</h1>
                        <h1>{{$ad->place}}</h1>
                        <h1>{{$ad->updated_at}}</h1>
                    </div>
                    <div>
                        @foreach ($ad->photos() as $photo)
                        <img src="{{asset('photos/' . $photo)}}" alt="image of the ad" class="mt-10 mb-auto mx-auto h-20 w-auto ">
                        @endforeach
                    </div>


                </div>
            </a>
            <div class="grid grid-cols-2 text-center">
            @can('delete',$ad)
            <form method="post" action="{{ route('ad_delete_post') }}">
                @csrf
                @method('post')
                <input type="hidden" value="{{ $ad->id }}" name="ad_id" class="block mt-1 w-full"/>
                <x-primary-button>
                    Delete
                </x-primary-button>
            </form>
            @endcan
            @can('update',$ad)
                <form method="post" action="{{ route('ad_update_post') }}">
                    @csrf
                    @method('post')
                    <input type="hidden" value="{{ $ad->id }}" name="ad_id" class="block mt-1 w-full"/>
                    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal','ad_update_post')">
                        Update ad
                    </x-primary-button>
                </form>
            @endcan
            </div>
            @endforeach
        </div>
</div>
<div class="text-center">
    @if (isset($ad))

    <x-modal name="ad_update_post" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('ad_update_post') }}" class="mt-6 space-y-6 " enctype="multipart/form-data">
            @csrf
            @method('post')
            {{-- type --}}
            <input type="hidden" value="{{ $ad->id }}" name="ad_id" class="block mt-1 w-full"/>
            <x-input-label for="title" :value="__('Title')" class="dark:text-gray-200" />
            <x-text-input id="title" name="title" class="field" class="dark:text-gray-200 bg-white dark:bg-gray-800"/>

            <x-input-label for="description" :value="__('Description')" class="dark:text-gray-200" />
            <x-text-input id="description" name="description" class="field" class="dark:text-gray-200 bg-white dark:bg-gray-800"/>

            <x-input-label for="price" :value="__('Price')" class="dark:text-gray-200" />
            <x-text-input id="price" type="number" name="price" class="field" class="dark:text-gray-200 bg-white dark:bg-gray-800"/>

            <x-input-label for="place" :value="__('Place')" class="dark:text-gray-200" />
            <x-text-input id="place" name="place" class="field" class="dark:text-gray-200 bg-white dark:bg-gray-800"/>

            <x-input-label for="photo" :value="__('Photo')" class="dark:text-gray-200" />
            <x-text-input id="photo" type="file" multiple name="photo[]" class="number" class="dark:text-gray-200 bg-white dark:bg-gray-800"/>

            <input type="submit" value="feltöltés" class="mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
        </form>
    </x-modal>
    @endif
</div>
</x-app-layout>
