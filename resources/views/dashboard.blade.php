<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Main Page') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-columbia-blue dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col md:flex-row md:justify-evenly">
                        <div class="mx-auto">
                            <h1>Search a vehicle to get information about is and fitting wheels </h1>
                            <livewire:DependentDropdown />
                        </div>
                        <div class="mx-auto">
                            <h1>Search a Wheel to get information about is and fitting cars </h1>
                            <livewire:DependentDropdownC />
                        </div>
                    </div>

                </div>

            </div>
            <div class="mt-8 rounded-lg dark:bg-slate-500 bg-jordy-blue w-2/3 mx-auto">
                <h2 class="text-2xl font-bold flex justify-center pt-5">About The Website</h2>

                <p class="mt-4 px-10">
                    Welcome to our web portal where you can effortlessly pair cars and rims. Our platform is
                    designed to provide a seamless experience for registered users, enabling them to upload
                    wheel data and contribute to a comprehensive database filled with valuable information.
                </p>
                <p class="mt-4 px-10">
                    Use our advanced filters to search for wheels or cars, and leverage the data uploaded by our
                    community to compare and test compatibility through visual representations. You can also
                    save compatible car-wheel combinations for future reference.
                </p>
                <p class="mt-4 px-10">
                    Explore our marketplace where you can browse and post ads for rims. Additionally,
                    you have the option to add the cars and rims you own to your profile, making it easier to
                    manage your assets and find the perfect match.
                </p>
                <p class="mt-4 px-10 pb-5">
                    Join our community today and take advantage of all the features we offer to enhance your
                    vehicle customization experience.
                </p>
            </div>
        </div>
    </div>

</x-app-layout>
