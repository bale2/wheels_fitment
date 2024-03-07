<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
            @foreach ($users as $user)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800 mb-12">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1>{{ $user->id }}</h1>
                        <h3>{{ $user->name }}</h3>
                        <h3>{{ $user->email }}</h3>
                        @if ($user->is_admin)
                            <h3>Admin</h3>
                        @else
                            <h3>Felhasználó</h3>
                        @endif
                        <h3>{{ $user->password }}</h3>
                        <h3>{{ $user->created_at }}</h3>
                        <h3>{{ $user->updated_at }}</h3>
                        <h3>{{ $user->phone_number }}</h3>
                        @foreach ($user->wheels as $wheel)
                            <h3>{{ $wheel->model }}</h3>
                        @endforeach
                    </div>

                </div>
            @endforeach
            {{ $users->links() }}
        </div>
    </div>

</x-app-layout>
