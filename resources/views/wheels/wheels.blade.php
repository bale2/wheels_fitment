<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Wheels Page') }}
            </h2>
            @if (Auth::user())
                <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                    <a href="/wheel_create">Add wheel</a>
                </div>
            @endif
        </div>
    </x-slot>
    <div x-data="{ wheel_id: '', manufacturer_id: 0, model: '', price: 0, wheel_type_id: 0, diameter: 0, width: 0, ET_number: 0, bolt_pattern_id: 0, kba_number: '', center_bore: 0, nut_bolt_id: 0, multipiece: 0, note: '', accepted: 0 }">
        <div class="flex flex-row flex-wrap-reverse py-12 justify-center">
            <div class="md:w-1/4 md:border-r-2 border-white">
                {{-- md:érték -> md mérettől felfelé alkalmazza --}}
                <h1 class="dark:text-white font-semibold text-xl text-center mb-5">Filters</h1>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg mb-10">
                    <div class="overflow-hidden shadow-sm">
                        <a href="wheel_types">
                            <div class="flex flex-row flex-wrap text-center  sm:rounded-lg  mb-2 bg-gray-800">
                                <?xml version="1.0" encoding="iso-8859-1"?>
                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                <svg class="mt-2 w-1/4 pr-0 " fill="#000000" height="50px" stroke-width="4"
                                    width="50px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M256,0C114.62,0,0,114.611,0,256c0,141.38,114.62,256,256,256s256-114.62,256-256C512,114.611,397.38,0,256,0z M256,486.4
           C128.956,486.4,25.6,383.044,25.6,256S128.956,25.6,256,25.6S486.4,128.956,486.4,256S383.044,486.4,256,486.4z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M256,76.8c-98.97,0-179.2,80.23-179.2,179.2S157.03,435.2,256,435.2S435.2,354.97,435.2,256S354.97,76.8,256,76.8z
           M268.8,103.049c58.078,4.821,107.102,41.993,128.811,93.483l-111.283,36.156c-4.463-5.803-10.496-10.24-17.528-12.74V103.049z
           M256,243.2c7.057,0,12.8,5.743,12.8,12.8s-5.743,12.8-12.8,12.8s-12.8-5.743-12.8-12.8S248.943,243.2,256,243.2z M243.2,103.049
           v116.898c-7.023,2.5-13.056,6.946-17.527,12.74l-111.283-36.156C136.098,145.041,185.122,107.87,243.2,103.049z M102.4,256
           c0-12.083,1.544-23.791,4.198-35.081l111.104,36.096c0.205,7.689,2.603,14.814,6.682,20.727l-68.599,94.404
           C123.162,343.962,102.4,302.396,102.4,256z M256,409.6c-29.116,0-56.269-8.294-79.497-22.426l68.676-94.515
           c3.456,1.024,7.04,1.741,10.82,1.741c3.789,0,7.373-0.717,10.829-1.741l68.668,94.515C312.269,401.306,285.116,409.6,256,409.6z
           M356.207,372.147l-68.591-94.413c4.079-5.914,6.468-13.039,6.673-20.727l111.104-36.096c2.662,11.298,4.207,23.006,4.207,35.089
           C409.6,302.396,388.838,343.962,356.207,372.147z" />
                                        </g>
                                    </g>
                                </svg>

                                <div class="w-3/4 p-6 pl-0 text-gray-900 dark:text-gray-100">
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Wheel Types
                                    </h1>
                                </div>
                            </div>
                        </a>
                        <a href="bolt_patterns/wheels">
                            <div class="flex flex-row sm:rounded-lg text-center  mb-2 bg-gray-800">
                                <?xml version="1.0" standalone="no"?>
                                <!DOCTYPE svg
                                    PUBLIC "-//W3C//DTD SVG 20010904//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                                <svg class="mt-2 w-1/4 pr-0 " version="1.0" xmlns="http://www.w3.org/2000/svg"
                                    width="50px" height="50px" viewBox="0 0 283.000000 289.000000"
                                    preserveAspectRatio="xMidYMid meet">
                                    <metadata>
                                        Created by potrace 1.10, written by Peter Selinger 2001-2011
                                    </metadata>
                                    <g transform="translate(0.000000,289.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path d="M0 2880 c0 -7 478 -10 1415 -10 937 0 1415 3 1415 10 0 7 -478 10
        -1415 10 -937 0 -1415 -3 -1415 -10z" />
                                        <path d="M780 2411 l0 -380 -60 -68 c-90 -101 -211 -318 -225 -403 -4 -25 -11
        -52 -15 -60 -13 -24 -29 -166 -31 -260 -1 -92 17 -258 30 -275 5 -5 11 -28 15
        -50 4 -22 13 -53 21 -70 81 -175 99 -209 154 -289 61 -88 229 -243 311 -286
        26 -14 53 -30 61 -37 8 -6 55 -28 104 -48 92 -37 179 -59 295 -75 75 -10 289
        -3 305 10 6 5 20 9 30 9 82 0 269 75 400 160 199 131 366 359 450 614 24 73
        52 285 46 347 -15 153 -31 262 -41 275 -4 6 -11 26 -15 45 -4 19 -11 41 -16
        50 -4 8 -26 55 -49 103 -23 48 -60 111 -81 140 l-39 51 0 432 c0 385 -2 433
        -16 438 -9 3 -18 6 -20 6 -2 0 -4 -185 -4 -412 l0 -412 -47 50 c-148 154 -338
        259 -563 312 -122 29 -383 23 -485 -10 -16 -5 -52 -16 -80 -23 -101 -27 -303
        -142 -359 -204 -11 -12 -22 -21 -25 -21 -3 0 -6 161 -6 358 l0 357 -22 3 -23
        3 0 -380z m939 -150 c102 -15 181 -40 286 -92 118 -59 264 -173 343 -267 l42
        -50 0 -195 c0 -164 -2 -196 -15 -201 -8 -3 -15 -15 -15 -26 0 -12 -4 -19 -9
        -15 -5 3 -12 -4 -16 -15 -6 -19 -10 -22 -37 -24 -7 -1 -16 -5 -19 -10 -11 -14
        -42 2 -36 19 4 9 1 12 -7 9 -19 -7 -28 68 -9 79 7 4 13 15 13 22 0 18 39 20
        75 3 14 -6 25 -17 25 -25 0 -18 19 -16 27 3 10 27 -39 66 -87 69 -35 2 -47 -3
        -76 -30 -27 -25 -34 -40 -34 -69 0 -50 23 -91 61 -110 40 -20 48 -20 86 -1 41
        21 54 38 55 74 2 52 18 34 18 -19 0 -45 2 -50 23 -50 l22 0 -5 212 c-5 219 -1
        268 20 213 6 -16 22 -51 35 -77 55 -106 97 -268 111 -425 6 -71 -18 -247 -46
        -344 -26 -87 -119 -269 -177 -344 -47 -62 -144 -156 -204 -200 -51 -36 -185
        -113 -211 -120 -13 -3 -32 -10 -43 -15 -172 -76 -544 -76 -700 -1 -11 6 -48
        21 -82 35 -34 13 -97 48 -140 77 -90 62 -265 234 -293 290 -11 21 -31 54 -45
        75 -14 20 -25 43 -25 50 0 8 -11 37 -24 64 -14 28 -28 65 -31 83 -4 18 -11 37
        -16 43 -11 14 -32 157 -34 239 -3 86 14 230 36 304 10 35 19 69 19 75 0 6 16
        43 35 81 19 39 35 75 35 80 1 6 27 48 58 94 60 87 91 115 79 70 -4 -13 -7 -97
        -7 -187 l0 -162 -25 -10 c-31 -12 -65 -66 -65 -102 0 -16 13 -42 31 -62 48
        -56 112 -58 167 -7 46 44 17 171 -39 171 -10 0 -19 6 -19 13 0 6 -1 104 -1
        216 l-1 205 38 33 c60 52 177 131 241 162 77 38 205 78 273 87 30 4 64 10 75
        14 28 10 166 6 264 -9z m-899 -806 c0 -41 0 -78 1 -82 0 -12 -33 -16 -40 -5
        -3 5 -5 44 -3 86 3 67 6 76 23 76 17 0 19 -8 19 -75z" />
                                        <path d="M1492 2080 c-93 -57 -50 -213 55 -202 52 5 82 21 99 54 29 56 8 125
        -47 152 -42 21 -67 20 -107 -4z m73 -29 c-3 -5 4 -11 16 -13 15 -2 26 -15 35
        -42 12 -33 12 -37 0 -27 -12 10 -13 8 -9 -10 4 -14 2 -20 -5 -16 -5 4 -12 2
        -14 -4 -5 -14 -78 -21 -78 -8 0 6 -4 7 -10 4 -6 -4 -10 13 -10 44 0 40 4 51
        16 51 8 0 13 4 9 9 -3 5 3 12 12 14 31 8 44 7 38 -2z" />
                                        <path d="M1470 1671 c-30 -4 -64 -12 -75 -18 -11 -6 -39 -19 -62 -28 -80 -33
        -192 -173 -218 -270 -15 -59 -17 -71 -17 -120 -1 -55 5 -91 21 -145 41 -134
        165 -259 296 -298 61 -19 211 -27 239 -14 12 6 42 17 67 26 52 19 134 77 171
        121 128 154 143 371 38 535 -32 50 -154 170 -172 170 -6 0 -24 6 -41 14 -40
        18 -129 36 -165 35 -15 -1 -52 -5 -82 -8z m205 -66 c131 -49 238 -168 262
        -290 22 -117 7 -208 -50 -300 -48 -79 -87 -115 -162 -151 -64 -31 -77 -34
        -162 -34 -114 0 -182 21 -260 82 -59 45 -85 81 -123 168 -19 45 -24 73 -24
        151 -1 89 1 100 33 162 59 116 121 172 239 217 61 23 178 21 247 -5z" />
                                        <path d="M1537 1313 c-4 -3 -7 -19 -7 -34 0 -24 -4 -28 -27 -26 -19 1 -28 -3
        -28 -13 0 -10 8 -14 28 -12 24 2 27 0 27 -28 0 -20 5 -30 15 -30 10 0 15 10
        15 31 0 27 3 30 28 27 19 -2 27 2 27 12 0 9 -10 15 -25 15 -21 0 -26 6 -28 33
        -3 31 -11 39 -25 25z" />
                                        <path d="M1020 662 c-29 -28 -40 -48 -40 -69 0 -42 39 -95 82 -111 33 -13 41
        -12 75 4 53 26 78 78 63 133 -13 48 -42 70 -99 78 -37 5 -44 2 -81 -35z m104
        -14 c31 -13 40 -38 32 -83 -10 -51 -73 -62 -112 -19 -19 19 -22 29 -14 43 5
        10 7 21 3 24 -11 12 20 38 39 34 10 -3 18 -1 18 4 0 12 4 11 34 -3z" />
                                        <path d="M1925 676 c-48 -21 -70 -53 -70 -101 0 -82 81 -134 158 -102 44 19
        60 48 59 105 -1 78 -77 128 -147 98z m89 -61 c23 -19 24 -25 16 -57 -8 -27
        -17 -37 -38 -41 -49 -10 -80 2 -92 36 -7 22 -7 33 0 35 5 2 10 12 10 22 0 35
        65 38 104 5z" />
                                        <path d="M860 2730 l-25 -19 30 -27 c24 -20 31 -23 33 -10 2 9 16 16 35 18 42
        4 41 22 0 26 -21 2 -33 9 -33 18 0 19 -10 17 -40 -6z" />
                                        <path d="M2320 2735 c0 -10 -11 -15 -35 -15 -25 0 -35 -4 -35 -16 0 -11 8 -15
        30 -12 18 2 34 -3 39 -11 7 -11 13 -10 35 4 l27 18 -22 23 c-26 28 -39 30 -39
        9z" />
                                        <path d="M1000 2705 c0 -13 13 -15 80 -13 107 4 108 22 3 26 -70 2 -83 0 -83
        -13z" />
                                        <path d="M1200 2705 c0 -12 16 -15 85 -15 69 0 85 3 85 15 0 12 -16 15 -85 15
        -69 0 -85 -3 -85 -15z" />
                                        <path d="M1410 2705 c0 -13 14 -15 87 -13 58 2 88 7 91 16 3 9 -19 12 -87 12
        -75 0 -91 -3 -91 -15z" />
                                        <path d="M1620 2705 c0 -13 14 -15 87 -13 58 2 88 7 91 16 3 9 -19 12 -87 12
        -75 0 -91 -3 -91 -15z" />
                                        <path d="M1830 2705 c0 -13 14 -15 87 -13 58 2 88 7 91 16 3 9 -19 12 -87 12
        -75 0 -91 -3 -91 -15z" />
                                        <path d="M2040 2705 c0 -13 13 -15 85 -13 48 2 85 7 85 13 0 6 -37 11 -85 13
        -72 2 -85 0 -85 -13z" />
                                    </g>
                                </svg>


                                <div class="w-3/4 p-6 pl-0 text-gray-900 dark:text-gray-100">
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Bolt patterns
                                    </h1>
                                </div>
                            </div>
                        </a>
                        <a href="nut_bolts">
                            <div class="flex flex-row text-center sm:rounded-lg  mb-2 bg-gray-800">
                                <?xml version="1.0" encoding="utf-8"?>
                                <svg class="mt-2 w-1/4 pr-0 " version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="50px" height="50px" x="0px" y="0px" viewBox="0 0 122.87 122.88"
                                    style="enable-background:new 0 0 122.87 122.88" xml:space="preserve">
                                    <g>
                                        <path
                                            d="M10.67,90.87l25.58,17.07l6.11-6.11L16.78,84.76L10.67,90.87L10.67,90.87z M80.2,2.2l40.48,40.48 c1.46,1.46,2.2,3.39,2.2,5.32c0,1.93-0.73,3.85-2.2,5.32l-10.21,10.21c-1.46,1.46-3.39,2.2-5.32,2.2c-1.93,0-3.85-0.73-5.32-2.2 l-5.98-5.98l-63.15,63.15c-1.46,1.46-3.39,2.19-5.32,2.19c-1.93,0-3.86-0.73-5.32-2.19L2.18,102.82C0.73,101.37,0,99.44,0,97.5 c0-1.93,0.72-3.86,2.18-5.32l63.15-63.15l-5.98-5.98c-1.46-1.46-2.2-3.39-2.2-5.32c0-1.93,0.73-3.85,2.2-5.32L69.56,2.2 C71.03,0.73,72.95,0,74.88,0C76.81,0,78.73,0.73,80.2,2.2L80.2,2.2z M90.26,53.95L68.93,32.62L49.7,51.84l25.58,17.07L90.26,53.95 L90.26,53.95z M117.09,46.26L76.61,5.79c-0.47-0.47-1.1-0.71-1.73-0.71c-0.63,0-1.26,0.24-1.73,0.71L62.94,16 c-0.47,0.47-0.71,1.1-0.71,1.73c0,0.63,0.24,1.26,0.71,1.73l40.48,40.48c0.47,0.47,1.1,0.71,1.73,0.71c0.63,0,1.26-0.24,1.73-0.71 l10.21-10.21c0.47-0.47,0.71-1.1,0.71-1.73S117.56,46.74,117.09,46.26L117.09,46.26z M32.61,111.6L7.02,94.52l-1.25,1.25 c-0.48,0.48-0.72,1.11-0.72,1.73c0,0.62,0.24,1.25,0.72,1.73l17.87,17.87c0.47,0.47,1.1,0.7,1.73,0.7c0.63,0,1.26-0.23,1.73-0.7 L32.61,111.6L32.61,111.6z M46.05,55.49l-6.11,6.11l25.58,17.07l6.11-6.11L46.05,55.49L46.05,55.49z M36.3,65.25l-6.11,6.11 l25.58,17.07l6.11-6.11L36.3,65.25L36.3,65.25z M26.54,75.01l-6.11,6.11l25.58,17.07l6.11-6.11L26.54,75.01L26.54,75.01z" />
                                    </g>
                                </svg>

                                <div class="w-3/4 p-6 pl-0 text-gray-900 dark:text-gray-100">
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Nut Or Bolt
                                    </h1>
                                </div>
                            </div>
                        </a>
                        <a href="manufacturers/wheels">
                            <div class="flex flex-row text-center sm:rounded-lg  mb-2 bg-gray-800">
                                <?xml version="1.0" ?>

                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                <svg class="mt-2 w-1/4 pr-0 " fill="#000000" width="50px" height="50px"
                                    viewBox="0 0 56 56" id="Layer_1" version="1.1" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                    <g>

                                        <path
                                            d="M48.2,25.3c-0.3-0.2-0.8-0.1-1.1,0.1l-7.7,6.1v-5.8c0-0.4-0.2-0.7-0.5-0.9c-0.3-0.2-0.7-0.1-1,0.1l-9.4,6.8L28,25.4   c0-0.3-0.2-0.7-0.5-0.8c-0.3-0.2-0.7-0.1-1,0l-11.3,6.8v-9.2c0.7-0.4,1.3-0.9,1.7-1.6c0.5,0.2,1.1,0.2,1.7,0.2c2.2,0,4.1-1.2,5.1-3   c0.3,0,0.6,0.1,1,0.1c4.1,0,7.4-3.3,7.4-7.4c0-4.1-3.3-7.5-7.4-7.5c-3.7,0-6.7,2.6-7.3,6.2c-2.6,0.5-4.5,2.7-4.7,5.4   c-1.9,0.3-3.4,2-3.4,4c0,0.1,0,0.2,0,0.2h-1c-0.6,0-1,0.4-1,1V52c0,0.6,0.4,1,1,1h39.5c0.6,0,1-0.4,1-1V26.2   C48.7,25.8,48.5,25.5,48.2,25.3z M11.3,18.6c0-1.2,0.9-2.1,2.1-2.1c0.1,0,0.2,0,0.3,0c0.3,0,0.6-0.1,0.8-0.3   c0.2-0.2,0.3-0.5,0.3-0.8c0-0.2,0-0.3,0-0.5c0-2,1.6-3.8,3.6-3.9c0.5,0,0.9-0.4,0.9-0.9C19.4,7.2,21.8,5,24.7,5   c3,0,5.4,2.4,5.4,5.5c0,3-2.4,5.4-5.4,5.4c-0.4,0-0.9-0.1-1.3-0.2c-0.5-0.1-1,0.1-1.2,0.6c-0.6,1.5-2,2.5-3.6,2.5   c-0.6,0-1.2-0.1-1.8-0.4c-0.3-0.1-0.6-0.1-0.9,0c-0.3,0.1-0.5,0.4-0.6,0.7c0,0.2-0.1,0.4-0.2,0.6c-0.1-0.5-0.5-0.8-1-0.8h-2.9   C11.3,18.8,11.3,18.7,11.3,18.6z M10.5,20.8C10.5,20.8,10.5,20.8,10.5,20.8h2.7v1.6H9.3v-1.6H10.5z M46.7,51H9.3V24.5h3.9v8.7   c0,0.4,0.2,0.7,0.5,0.9c0.3,0.2,0.7,0.2,1,0l11.4-6.8l0.5,6.4c0,0.4,0.2,0.7,0.6,0.8c0.3,0.2,0.7,0.1,1-0.1l9.3-6.7v5.9   c0,0.4,0.2,0.7,0.6,0.9c0.3,0.2,0.8,0.1,1.1-0.1l7.7-6.1V51z" />

                                        <path
                                            d="M40.3,48h4.3c0.6,0,1-0.4,1-1v-4.3c0-0.6-0.4-1-1-1h-4.3c-0.6,0-1,0.4-1,1V47C39.3,47.6,39.7,48,40.3,48z M41.3,43.7h2.3   V46h-2.3V43.7z" />

                                        <path
                                            d="M27.7,41.7h-4.3c-0.6,0-1,0.4-1,1V47c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1v-4.3C28.7,42.2,28.2,41.7,27.7,41.7z M26.7,46   h-2.3v-2.3h2.3V46z" />

                                        <path
                                            d="M19.3,36.3h-4.3c-0.6,0-1,0.4-1,1v4.3c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1v-4.3C20.3,36.8,19.8,36.3,19.3,36.3z    M18.3,40.7h-2.3v-2.3h2.3V40.7z" />

                                        <path
                                            d="M36.1,36.3h-4.3c-0.6,0-1,0.4-1,1v4.3c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1v-4.3C37.1,36.8,36.7,36.3,36.1,36.3z    M35.1,40.7h-2.3v-2.3h2.3V40.7z" />

                                    </g>

                                </svg>

                                <div class="w-3/4 p-6 pl-0 text-gray-900 dark:text-gray-100">
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Manufacturers
                                    </h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-3/4 mx-auto sm:px-6 lg:px-8 sm:rounded-lg">
                <h1 class="dark:text-white font-semibold text-xl text-center mb-5">Wheels</h1>
                @foreach ($wheels as $wheel)
                    @if ($wheel->id != 1)
                        <a href="wheels/{{ $wheel->id }}">
                            <div
                                class="bg-white overflow-hidden grid grid-cols-2 shadow-sm sm:rounded-lg dark:bg-gray-800 mb-1">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    {{-- <h1>ID: {{ $wheel->id }}</h1> --}}
                                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                                        {{ $wheel->title }}
                                    </h1>
                                    <h1>Manufacturer: {{ $wheel->manufacturer->manufacturer_name }}</h1>
                                    <h1>Model :{{ $wheel->model }}</h1>
                                    {{-- <h1>Típus: {{ $wheel->wheelType->wheel_type }}</h1> --}}
                                    {{-- <h1>Szélesség: {{ $wheel->width }}</h1> --}}
                                    {{-- <h1>ET szám: {{ $wheel->ET_number }} --}}
                                    <h1>Bolt pattern:{{ $wheel->boltPattern->bolt_pattern }}</h1>
                                    <h1>Diameter: {{ $wheel->diameter }} &emsp; Width: {{ $wheel->width }}</h1>
                                    <h1>accepted {{ $wheel->accepted }}</h1>
                                    <h1>multipiece {{ $wheel->multipiece ? 'multipiece' : 'single piece' }}</h1>
                                    {{-- <h1>Osztókör:{{ $wheel->boltPattern->bolt_pattern }}</h1> --}}
                                    {{-- <h1>KBA szám:{{ $wheel->kba_number }}</h1> --}}
                                    {{-- <h1>Középfurat: {{ $wheel->center_bore }}</h1> --}}
                                    {{-- <h1>Felfogatás: {{ $wheel->nutBolt->type }}</h1> --}}
                                    {{-- <h1>Felépítés:
                                        @if ($wheel->multipiece == 0)
                                            Egyrészes
                                        @else
                                            Többrészes
                                        @endif
                                    </h1> --}}
                                    {{-- <h1>Kép: {{ $wheel->photo }}</h1> --}}
                                </div>
                                <div>
                                    {{-- @foreach ($wheel->photos() as $photo) --}}
                                    <img src="{{ asset('photos/' . $wheel->photos()[0]) }}" alt="image of the ad"
                                        class="mt-10 mb-auto mx-auto h-20 w-auto ">
                                    {{-- @endforeachc --}}
                                </div>
                            </div>
                        </a>
                        <div class="flex justify-evenly text-center mb-5">
                            @can('delete', $wheel)
                                <form method="post" action="{{ route('wheel_delete_post') }}">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" value="{{ $wheel->id }}" name="wheel_id"
                                        class="block mt-1 w-full" />
                                    <x-primary-button class="w-[20vw]">
                                        Delete wheel
                                    </x-primary-button>
                                </form>
                            @endcan
                            @can('update', $wheel)
                                <x-primary-button class="w-[20vw]" x-data="" {{-- x-on:click.prevent="$dispatch('open-modal','wheel_update_post'),wheel_id={{ $wheel->id }},manufacturer_id={{ $wheel->manufacturer->id }},model='{{ $wheel->model }}', price={{ $wheel->price }}, wheel_type_id={{ $wheel->wheel_type_id }}, diameter={{ $wheel->diameter }}, width={{ $wheel->width }}, ET_number={{ $wheel->ET_number }}, bolt_pattern_id={{ $wheel->bolt_pattern_id }}, kba_number='{{ $wheel->kba_number }}', center_bore={{ $wheel->center_bore }}, nut_bolt_id={{ $wheel->nut_bolt_id }}, multipiece={{ $wheel->multipiece }}, note='{{ $wheel->note }}', accepted='{{ $wheel->accepted }}'"> --}}
                                    x-on:click.prevent="$dispatch('open-modal','wheel_update_post'),wheel_id='{{ $wheel->id }}', manufacturer_id='{{ $wheel->manufacturer_id }}',model='{{ $wheel->model }}',price={{ $wheel->price }},wheel_type_id={{ $wheel->wheel_type_id }},diameter={{ $wheel->diameter }},width={{ $wheel->width }},ET_number={{ $wheel->ET_number }}, bolt_pattern_id={{ $wheel->bolt_pattern_id }}, kba_number='{{ $wheel->kba_number }}', center_bore={{ $wheel->center_bore }}, nut_bolt_id={{ $wheel->nut_bolt_id }}, multipiece={{ $wheel->multipiece }}, note='{{ $wheel->note }}', accepted='{{ $wheel->accepted }}'">
                                    Update wheel
                                </x-primary-button>
                            @endcan
                        </div>
                    @endif
                @endforeach
                {{ $wheels->links() }}
            </div>
        </div>
        <div class="text-center">
            @isset($wheel)

                <x-modal name="wheel_update_post" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('wheel_update_post') }}"
                        class="flex items-center flex-col gap-y-4" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <input type="hidden" x-model="wheel_id" name="wheel_id" class="block mt-1 w-full" />

                        <div>
                            <x-input-label for="manufacturer" :value="__('Manufacturer')" class="dark:text-gray-200 pt-3" />
                            <select id="manufacturer" name="manufacturer_id", x-model="manufacturer_id"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent rounded-lg w-80">
                                @foreach ($manufacturers as $manufacturer)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80"
                                        value={{ $manufacturer->id }}
                                        :selected="manufacturer_id === {{ $manufacturer->id }}">
                                        {{ $manufacturer->manufacturer_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="model" :value="__('Model')" class="dark:text-gray-200" />
                            <x-text-input x-model="model" id="model" name="model" class="field"
                                class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80" />
                        </div>
                        <div class="flex flex-wrap justify-between max-w-80 gap-y-4">
                            <div>
                                <x-input-label for="price" :value="__('Price')" class="dark:text-gray-200" />
                                <x-text-input x-model="price" id="price" name="price" class="field"
                                    type="number" class="dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div>
                                <x-input-label for="diameter" :value="__('Diameter')" class="dark:text-gray-200" />
                                <x-text-input x-model="diameter" id="diameter" name="diameter" class="field"
                                    class="dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div>
                                <x-input-label for="width" :value="__('Width')" class="dark:text-gray-200" />
                                <x-text-input x-model="width" id="width" type="number" name="width"
                                    class="dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div>
                                <x-input-label for="ET_number" :value="__('ET_number')" class="dark:text-gray-200" />
                                <x-text-input x-model="ET_number" id="ET_number" type="number" name="ET_number"
                                    class="dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>

                            <div>
                                <x-input-label for="kba_number" :value="__('KBA number')" class="dark:text-gray-200" />
                                <x-text-input x-model="kba_number" id="kba_number" name="kba_number"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div>
                                <x-input-label for="center_bore" :value="__('Centerbore')" class="dark:text-gray-200" />
                                <x-text-input x-model="center_bore" id="center_bore" name="center_bore"
                                    class=" field dark:text-gray-200 bg-white dark:bg-gray-800 w-32" />
                            </div>
                            <div class="flex justify-center gap-8 w-80">
                                <div class="flex items-center">
                                    <label for="multipiece-0"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Single
                                        Piece</label>
                                    <input id="multipiece-1" type="radio" value="0" name="multipiece"
                                        x-model="multipiece"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="flex items-center">
                                    <label for="multipiece-1"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Multipiece
                                    </label>
                                    <input id="multipiece-1" type="radio" value="1" name="multipiece"
                                        x-model="multipiece"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </div>
                        </div>
                        <div>

                            <x-input-label for="nut_bolt" :value="__('Nut OR Bolt')" class="dark:text-gray-200" />
                            <select id="nut_bolt" name="nut_bolt_id" x-model="nut_bolt_id"
                                class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                                @foreach ($wheelTypes as $wheelType)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80"
                                        value={{ $wheelType->id }}>
                                        {{ $wheelType->wheel_type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="bolt_pattern" :value="__('Bolt pattern')" class="dark:text-gray-200" />
                            <select id="bolt_pattern" name="bolt_pattern_id" x-model="bolt_pattern_id"
                                class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                                @foreach ($boltPatterns as $boltPattern)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80"
                                        value={{ $boltPattern->id }}>
                                        {{ $boltPattern->bolt_pattern }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="nut_bolt" :value="__('Nut OR Bolt')" class="dark:text-gray-200" />
                            <select id="nut_bolt" name="nut_bolt_id" x-model="nut_bolt_id"
                                class="field dark:text-gray-200 bg-white dark:bg-gray-800 border-transparent w-80">
                                @foreach ($nutBolts as $nutBolt)
                                    <option class="dark:text-gray-200 bg-white dark:bg-gray-800 w-80"
                                        value={{ $nutBolt->id }}>
                                        {{ $nutBolt->type }}</option>
                                @endforeach
                            </select>
                        </div>





                        <x-input-label for="note" :value="__('note')" class="dark:text-gray-200" />
                        <x-text-input x-model="note" id="note" name="note" type="text"
                            class=" field dark:text-gray-200 bg-white dark:bg-gray-800" />

                        @if (Auth::check() && Auth::user()->is_admin)
                            <div class="flex justify-center gap-8 mt-5">
                                <div class="flex items-center">
                                    <label for="accepted-1"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Accepted
                                    </label>
                                    <input id="accepted-1" type="radio" value="1" name="accepted"
                                        x-model="accepted"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="flex items-center">
                                    <label for="accepted-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-1 ">Not
                                        accepted
                                    </label>
                                    <input id="accepted-2" type="radio" value="0" name="accepted"
                                        x-model="accepted"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </div>
                        @endif


                        <input type="submit" value="upload"
                            class="mx-auto block items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                    </form>
                </x-modal>
            @endisset
        </div>
    </div>
</x-app-layout>
