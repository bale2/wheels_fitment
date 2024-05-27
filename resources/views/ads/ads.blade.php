<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="my-auto font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Ads') }}
            </h2>
            <div class="mx-auto">
                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    href="/ad_create">Post an ad</a>
            </div>
        </div>
    </x-slot>
    {{-- <div class="w-1/2 lg:w-1/3 xl:w-1/4 mx-auto mb-0">
        @include('components.search-bar')
    </div> --}}


    {{--  --}}
    <div x-data="{ adid: '', title: '', price: 0, description: '', photo: '', accepted: '', place: '' }">
        <div class="flex flex-row flex-wrap-reverse py-12 justify-center">
            @include('components.left-side-filters')
            <div class="w-3/4 mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                @foreach ($ads as $ad)
                    @if ($ad->ad_accepted == 0 and Auth::user() and ($ad->user_id == auth()->id() or Auth::user()->is_admin))
                        <a href="ads/{{ $ad->ad_id }}">
                            <div
                                class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-red-600 dark:hover:bg-red-700">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                                        {{ $ad->title }}</h1>
                                    <h1>{{ $ad->ad_price }} €</h1>
                                    <h1>{{ $ad->user->name }}</h1>
                                    <h1>{{ $ad->place }}</h1>
                                    <h1>{{ $ad->updated_at }}</h1>
                                </div>
                                <div>
                                    @foreach ($ad->photos() as $photo)
                                        <img src="{{ asset('photos/' . $photo) }}" alt="image of the ad"
                                            class="mt-10 mb-auto mx-auto h-20 w-auto ">
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    @elseif ($ad->ad_accepted == 1)
                        <a href="ads/{{ $ad->ad_id }}">
                            <div
                                class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:hover:bg-blue-900">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                                        {{ $ad->title }}
                                    </h1>
                                    <h1>{{ $ad->ad_price }} Ft</h1>
                                    <h1>{{ $ad->user->name }}</h1>
                                    <h1>{{ $ad->place }}</h1>
                                    <h1>{{ $ad->updated_at }}</h1>
                                    <h1>{{ $ad->ad_accepted }}</h1>
                                </div>
                                <div>
                                    <img src="{{ asset('photos/' . $ad->photos()[0]) }}" alt="image of the ad"
                                        class="mt-10 mb-auto mx-auto h-20 w-auto ">
                                </div>
                            </div>
                        </a>
                    @endif
                    <div class="flex justify-evenly text-center mt-2 mb-5">
                        @can('delete', $ad)
                            <form method="post" action="{{ route('ad_delete_post') }}">
                                @csrf
                                @method('post')
                                <input type="hidden" value="{{ $ad->ad_id }}" name="ad_id"
                                    class="block mt-1 w-full" />
                                <x-primary-button class="w-[20vw] dark:bg-blue-700 dark:hover:bg-blue-800 dark:text-white">
                                    Delete
                                </x-primary-button>
                            </form>
                        @endcan
                        @can('update', $ad)
                            <x-primary-button class="w-[20vw] dark:bg-blue-700 dark:hover:bg-blue-800 dark:text-white"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal','ad_update_post'),adid='{{ $ad->ad_id }}',title='{{ $ad->title }}',price={{ $ad->ad_price }},description='{{ $ad->description }}',place='{{ $ad->place }}',accepted='{{ $ad->ad_accepted }}',photo='{{ $ad->photo }}'">
                                Update ad
                            </x-primary-button>
                        @endcan
                    </div>
                @endforeach
                {{ $ads->links() }}
            </div>
        </div>
        <div class="text-center">
            @if (isset($ad))
                <x-modal name="ad_update_post" :show="$errors->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('ad_update_post') }}" class=""
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <input type="hidden" x-model="adid" name="ad_id" class="block mt-1 w-full" />

                        <x-input-label for="adid" :value="__('Ad ID')" class="dark:text-gray-200 mt-5" />
                        <x-text-input x-model="adid" id="adid" name="adid" class="field" disabled
                            class="dark:text-gray-200 bg-white dark:bg-gray-800 w-2/3 text-center" />

                        <x-input-label for="title" :value="__('Title')" class="dark:text-gray-200 mt-5" />
                        <x-text-input x-model="title" id="title" name="title" class="field"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800 w-2/3" />

                        <x-input-label for="description" :value="__('Description')" class="dark:text-gray-200 mt-5" />
                        <textarea id="description" type="text" value="{{ old('description') }}" x-model="description" name="description"
                            class="resize-y border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-2/3">{{ old('description') }}</textarea>

                        <x-input-label for="price" :value="__('Price')" class="dark:text-gray-200 mt-5" />
                        <x-text-input x-model="price" id="price" type="number" name="price" class="field"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800 w-2/3" />

                        <x-input-label for="place" :value="__('Place')" class="dark:text-gray-200 mt-5" />
                        <x-text-input x-model="place" id="place" name="place" class="field"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800 w-2/3" />

                        <x-input-label for="photo" :value="__('Photo')" class="dark:text-gray-200 mt-5" />
                        <x-text-input id="photo" type="file" multiple name="photo[]"
                            class="dark:text-gray-200 bg-white dark:bg-gray-800 w-2/3" />

                        @if (Auth::user() && Auth::user()->is_admin)
                            <div class="flex justify-center gap-8 mt-5">
                                <div class="flex items-center">
                                    <label for="accepted-1"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Accepted</label>
                                    <input id="accepted-1" type="radio" value="1" name="accepted"
                                        x-model="accepted"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="flex items-center">
                                    <label for="accepted-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Not
                                        Accepted</label>
                                    <input checked id="accepted-2" type="radio" value="0" name="accepted"
                                        x-model="accepted"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </div>
                        @endif

                        <input type="submit" value="feltöltés"
                            class=" mt-5 mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                    </form>
                </x-modal>
            @endif
        </div>
    </div>
</x-app-layout>
