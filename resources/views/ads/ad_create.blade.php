<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around ">
            <div class="w-3 ">
                <a href="/ads"><svg fill="#000000" class="h-5 w-5" version="1.1" id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 26.676 26.676" xml:space="preserve">

                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path
                                    d="M26.105,21.891c-0.229,0-0.439-0.131-0.529-0.346l0,0c-0.066-0.156-1.716-3.857-7.885-4.59 c-1.285-0.156-2.824-0.236-4.693-0.25v4.613c0,0.213-0.115,0.406-0.304,0.508c-0.188,0.098-0.413,0.084-0.588-0.033L0.254,13.815 C0.094,13.708,0,13.528,0,13.339c0-0.191,0.094-0.365,0.254-0.477l11.857-7.979c0.175-0.121,0.398-0.129,0.588-0.029 c0.19,0.102,0.303,0.295,0.303,0.502v4.293c2.578,0.336,13.674,2.33,13.674,11.674c0,0.271-0.191,0.508-0.459,0.562 C26.18,21.891,26.141,21.891,26.105,21.891z" />
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                            </g>
                        </g>

                    </svg></a>
            </div>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                    Ad
                </h2>
            </div>
            <div>
                &nbsp;
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-jordy-blue overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="flex flex-col md:flex-row p-6 text-gray-900 mx-5 ">
                    <div class="md:w-1/2 dark:text-white pr-10">
                        <h1 class="text-xl">Wheel select:</h1>
                        <ul class="list-disc pl-4">
                            <li>To post an ad you have to choose a manufacturer first and then a model from our database
                            </li>
                            <li>If you don't find a one add it first on the wheels page or choose the unknown for both
                                fields</li>
                        </ul>
                        <h1 class="text-xl">Title:</h1>
                        <ul class="list-disc pl-4">
                            <li> A good title helps sales, it should clearly convey what you are
                                selling or
                                offering.</li>
                            <li> Include the most attractive aspects, such as brand name, model, or unique
                                selling
                                points.</li>
                        </ul>
                        <h1 class="text-xl">
                            Description:</h1>
                        <ul class="list-disc pl-4">
                            <li>Provide all relevant details about the product. This includes
                                specifications, condition (new
                                or used), features, and benefits.</li>
                            <li> any additional accessories, warranty, or special
                                terms.Be honest: Transparency builds trust.</li>
                            <li> Clearly state any flaws or defects</li>
                        </ul>
                        <h1 class="text-xl">
                            Price:</h1>
                        <ul class="list-disc pl-4">
                            <li>Check prices for similar items to ensure your pricing is competitive.</li>
                            <li>
                                State the price upfront: Avoid hidden costs. If your price is negotiable, mention it
                            </li>
                        </ul>
                        <h1 class="text-xl">
                            Place:</h1>
                        <ul class="list-disc pl-4">
                            <li>Provide a general area to help potential buyers understand where the item is.</li>
                            <li> NEVER specify
                                your exact address publicly for safety reasons</li>
                        </ul>
                        <h1 class="text-xl">
                            Photo:</h1>
                        <ul class="list-disc pl-4">
                            <li>Use clear, well-lit photos showing your item from multiple angles. If you're offering
                                accessories or additional items, include them in the photos.</li>
                            <li> Accepted formats: jpeg,png,jpg,gif,svg and maximum files size is 4MB</li>
                        </ul>
                    </div>
                    <div
                        class="md:w-1/2 p-6 bg-ruddy-blue overflow-hidden shadow-sm sm:rounded-lg my-5 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        <h1 class="dark:text-slate-400 text-black text-lg">Assign a wheel to the ad:</h1>
                        <div class="pl-5">
                            @livewire('DependentDropdownForAds')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
