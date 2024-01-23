<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ads') }}
        </h2>
    </x-slot>

    <div class="pt-2 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-cyan-600">
            @foreach ($users as $user)
            <div class=" overflow-hidden shadow-sm sm:rounded-lg mt-5  bg-pink-700 mx-2">

                <div class="p-6 text-gray-900">
                        <h1>{{$user->id}}</h1>
                        <h3>{{$user->name}}</h3>
                        <h3>{{$user->email}}</h3>
                        <h3>{{$user->password}}</h3>
                        <h3>{{$user->created_at}}</h3>
                        <h3>{{$user->updated_at}}</h3>
                        <h3>{{$user->phone_number}}</h3>
                </div>

            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>


