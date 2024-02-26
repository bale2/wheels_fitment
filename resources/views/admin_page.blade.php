<x-app-layout>
    <x-slot name="header" >
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Admin Page') }}
            </h2>
            <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{-- <a href="/ad_create">Hirdetésfeladás</a> --}}
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div x-data="{ oldal: null }" class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            <x-input-label for="category" :value="__('Choose category')" class="dark:text-gray-200"/>
            <select x-model="oldal" id="category" name="category" class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent">
                <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value="Ads">Ads</option>
                <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value="Bolt_Patterns">Bolt Pattern</option>
                <option class="dark:text-gray-200 bg-white dark:bg-gray-800" value="Manufacturers">Manufacturers</option>
            </select>
            <div x-show="oldal == 'Ads'">
                @foreach (\App\Models\Ad::all() as $category)
                <div class="text-gray-800 dark:text-gray-200">
                    <h1 x-text="'ID: {{$category->id}}, Wheel model: {{$category->wheel->model}}, Title:{{$category->title}} description: {{$category->description}}, Price: {{$category->price}}, User:{{$category->user->name}}, Place: {{$category->place}}, Created at:{{$category->created_at}}'"></h1>
                    <div>
                        @foreach ($category->photos() as $photo)
                        <img src="{{asset('photos/' . $photo)}}" alt="image of the ad" class="mt-10 mb-auto mx-auto h-20 w-auto ">
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <div x-show="oldal == 'Manufacturers'">
                @foreach (\App\Models\BoltPattern::all() as $category)
                <div class="text-gray-800 dark:text-gray-200">
                    {{ $category->bolt_pattern}}
                    {{ $category->updated_at}}
                </div>
                @endforeach
            </div>
            <div class="grid grid-cols-2 text-center">
                @can('delete',$category)
                <form method="post" action="{{ route('category_delete_post') }}">
                    @csrf
                    @method('post')
                    <input type="hidden" value="{{ $category->id }}" name="ad_id" class="block mt-1 w-full"/>
                    <x-primary-button>
                        Delete
                    </x-primary-button>
                </form>
                @endcan
                @can('update',$category)
                    <form method="post" action="{{ route('ad_update_post') }}">
                        @csrf
                        @method('post')
                        <input type="hidden" value="{{ $category->id }}" name="ad_id" class="block mt-1 w-full"/>
                        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal','ad_update_post')">
                            Update ad
                        </x-primary-button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
{{-- <div class="text-center">
    @if (isset())

    <x-modal name="ad_update_post" :show="$errors->userDeletion->isNotEmpty()" focusable>

    </x-modal>
    @endif
</div> --}}
</x-app-layout>
