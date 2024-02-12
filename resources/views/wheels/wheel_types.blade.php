<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Wheel Types') }}
            </h2>
            <div>
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal','wheel_type_create')">
                    Adding a wheel type
                </x-primary-button>

            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            @foreach ($wheel_types as $wheel_type)
                <div class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 mb-12">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1>{{$wheel_type->wheel_type}}</h1>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center">
    <x-modal name="wheel_type_create" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('wheel_type_create_post') }}" class="mt-6 space-y-6 " enctype="multipart/form-data">
            @csrf
            @method('post')
            {{-- type --}}
            <x-input-label for="type" :value="__('Type')" class="dark:text-gray-200" />
           <x-text-input id="type" name="type" class="field" class="dark:text-gray-200 bg-white dark:bg-gray-800"/>
           <input type="submit" value="feltöltés" class="mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
           </form>
    </x-modal>
    </div>
</x-app-layout>
