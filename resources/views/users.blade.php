<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            @foreach ($users as $user)
                <a href="users/{{ $user->id }}">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 mb-12 ">
                        <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-row">
                            <div>
                                <svg height="4vw" width="4vw" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 60.671 60.671" xml:space="preserve">
                                    <g>
                                        <g>
                                            <ellipse style="fill:#6506c5;" cx="30.336" cy="12.097" rx="11.997"
                                                ry="12.097" />
                                            <path style="fill:#1215c4;" d="M35.64,30.079H25.031c-7.021,0-12.714,5.739-12.714,12.821v17.771h36.037V42.9
   C48.354,35.818,42.661,30.079,35.64,30.079z" />
                                        </g>
                                    </g>
                                </svg>{{-- <h1>{{ $user->id }}</h1> --}}
                            </div>
                            <div class="my-auto ml-1">
                                <h3>{{ $user->name }}</h3>
                            </div>
                            {{-- <h3>{{ $user->email }}</h3> --}}
                            {{-- @if ($user->is_admin)
                                <h3>Admin</h3>
                            @else
                                <h3>Felhasználó</h3>
                            @endif --}}
                            {{-- <h3>{{ $user->password }}</h3> --}}
                            {{-- <h3>{{ $user->created_at }}</h3>
                            <h3>{{ $user->updated_at }}</h3> --}}
                            {{-- <h3>{{ $user->phone_number }}</h3> --}}
                        </div>
                    </div>
                </a>
            @endforeach
            {{ $users->links() }}
        </div>
    </div>

</x-app-layout>
