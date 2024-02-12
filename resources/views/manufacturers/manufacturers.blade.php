<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Manufacturers') }}
            </h2>
            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal','manufacturer_create')">
                Adding a bolt pattern
            </x-primary-button>
        </div>
    </x-slot>
    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            @foreach ($manufacturers as $manufacturer)
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
            @endforeach
        </div>
    </div>
    <x-modal name="manufacturer_create" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('manufacturer_create_post') }}" class="mt-2 space-y-2 flex flex-col items-center" enctype="multipart/form-data">
            @csrf
            @method('post')
            {{-- type --}}
            <x-input-label for="type" :value="__('Type')" class="dark:text-gray-200" />
            <x-text-input id="type" name="manufacturer_name" class="field" class="dark:text-gray-200 bg-white dark:bg-gray-800"/>
            <x-input-label for="title" :value="__('Csak kereket gyárt')" class="dark:text-gray-100"/>
            <x-text-input id="title" type="checkbox" name="only_wheel_maker" class="block mt-1"/>


            <input type="submit" value="feltöltés" class=" block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
        </form>
    </x-modal>
</x-app-layout>
