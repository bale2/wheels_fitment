<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ads') }}
        </h2>
    </x-slot>

    <div class="bg-purple-800 py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            @foreach ($users as $user)
            <div class=" overflow-hidden shadow-sm sm:rounded-lg my-4  bg-slate-400 mx-2">

                <div class="p-6 text-gray-900">
                        <h1>{{$user->id}}</h1>
                        <h3>{{$user->name}}</h3>
                        <h3>{{$user->email}}</h3>
                        @if ($user->is_admin)
                            <h3>Admin</h3>
                        @else
                            <h3>Felhasználó</h3>
                        @endif
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


