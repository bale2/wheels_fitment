<div class="md:w-1/4 md:border-r-2 border-white dark:hover:[&>div>div>a>div]:bg-blue-900 ">
    @include('components.search-bar')
    {{-- compare --}}
    @if (Request::segment(1) == 'wheels')
        <h1 class="dark:text-white font-semibold text-xl text-center mb-5">Compare</h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg mb-10">
            <div class="overflow-hidden shadow-sm">
                <a href="/compare">
                    <div class="flex flex-row flex-wrap text-center  sm:rounded-lg  mb-2 bg-gray-800">
                        <?xml version="1.0" encoding="iso-8859-1"?>
                        <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                        <svg class="mt-2 w-1/4 pr-0 " xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                            viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve">
                            <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                            <g>
                                <g>
                                    <g>
                                        <path fill="#000000"
                                            d="M120.6,42.3c-5,1.3-8,3.1-12,7c-6.8,6.7-9.7,16.4-7.5,25.3c1.7,7.2,7.5,14.6,13.9,17.8c15.5,7.8,33.7-0.3,38.6-17.1c1.2-4.1,1.1-10.6-0.2-14.7c-1.4-4.5-4.2-8.8-7.5-12c-3.7-3.4-6.8-5.1-11.6-6.3C129.5,41.1,125.2,41.1,120.6,42.3z" />
                                        <path fill="#000000"
                                            d="M197.7,79.4v24.1h24.1H246V79.4V55.3h-24.1h-24.1V79.4z" />
                                        <path fill="#000000"
                                            d="M22.7,79.5c-7.1,13-12.8,23.8-12.7,23.9c0.1,0.1,12,0.1,26.3,0.1l26-0.1l-13-23.8c-7.2-13-13.2-23.8-13.3-23.8C35.8,55.8,29.9,66.5,22.7,79.5z" />
                                        <path fill="#000000"
                                            d="M113.9,107.2c-7.5,1.7-14.8,6-19.8,11.7c-1.6,1.8-8.4,9.8-15.1,17.8c-6.7,8-12.3,14.5-12.5,14.6c-0.2,0-3.3-6.6-7-14.7c-3.6-8.2-7.6-16.9-8.9-19.2l-2.3-4.3H32.7H17.1l-1.4,1.6c-1.6,1.8-1.8,3.7-0.6,5.9c1.3,2.5,3,2.8,12.4,2.8h8.4l0.6,1.3c0.3,0.8,5.1,11.4,10.5,23.7c5.4,12.3,10.2,22.9,10.7,23.6c1.8,2.8,6.8,3.9,10,2.3c1-0.5,4.5-4.3,9.7-10.4c4.4-5.3,8.2-9.6,8.2-9.5c0.1,0.1,2.1,12.9,4.5,28.6c2.4,15.6,4.5,29.2,4.6,30l0.3,1.6h32.5c17.9,0,32.5-0.1,32.5-0.2c0-0.9,9.2-59.8,9.4-60c0.1-0.1,3.1,3.2,6.6,7.4c10.4,12.5,11.3,13.2,14.9,13.2c2.6,0,5.1-1.2,6.5-3.1c0.6-0.8,5.7-12.1,11.4-25l10.3-23.5l9.2-0.1c9.9-0.1,10.5-0.3,12-2.8c1.7-2.9,0.3-6.2-3-7.2c-1.2-0.3-7-0.5-16.2-0.4l-14.4,0.1l-1.4,2.6c-0.8,1.4-4.8,10-8.8,19c-4,9-7.5,16.4-7.8,16.4c-0.2,0-6.5-7.1-13.8-15.8c-7.3-8.8-14.8-17.2-16.6-18.9c-3.8-3.5-8.7-6.4-14-8.3c-3.8-1.3-4.2-1.3-15.7-1.4C119.9,106.6,116.1,106.7,113.9,107.2z" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                        {{-- <metadata xmlns="http://www.w3.org/2000/svg"> Svg Vector Icons :
                        http://www.onlinewebfonts.com/icon </metadata> --}}

                        <div class=" w-3/4 my-auto py-6 pl-0 text-gray-900 dark:text-gray-100">
                            <h1 class=" font-semibold text-xl text-gray-800 dark:text-gray-200">
                                Compare
                            </h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endif

    <h1 class="dark:text-white font-semibold text-xl text-center mb-5">Filters</h1>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:rounded-lg mb-10">
        <div class="overflow-hidden shadow-sm">
            @if (Auth::user() && Auth::user()->is_admin)
                @if (Request::segment(1) == 'wheels')
                    <a href="wheel_types">
                        <div class="flex flex-row flex-wrap text-center  sm:rounded-lg  mb-2 bg-gray-800">
                            <?xml version="1.0" encoding="iso-8859-1"?>
                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                            <svg class="mt-2 w-1/4 pr-0 " fill="#000000" height="50px" stroke-width="4" width="50px"
                                version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M256,0C114.62,0,0,114.611,0,256c0,141.38,114.62,256,256,256s256-114.62,256-256C512,114.611,397.38,0,256,0z M256,486.4
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

                            <div class=" w-3/4 p-6 pl-0 text-gray-900 dark:text-gray-100">
                                <h1 class=" font-semibold text-xl text-gray-800 dark:text-gray-200">
                                    Wheel Types
                                </h1>
                            </div>
                        </div>
                    </a>
                @endif
                {{-- @if (Request::segment(1) == 'wheels')
            <a href="bolt_patterns/wheels"> --}}
            @endif
            @if (Auth::user() && Auth::user()->is_admin)
                @if (Request::segment(1) == 'wheels')
                    <a href="bolt_patterns/wheels">
                    @else
                        <a href="bolt_patterns/cars">
                @endif
                <div class="flex flex-row sm:rounded-lg text-center  mb-2 bg-gray-800">
                    <?xml version="1.0" standalone="no"?>
                    <!DOCTYPE svg
                        PUBLIC "-//W3C//DTD SVG 20010904//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                    <svg class="mt-2 w-1/4 pr-0 " version="1.0" xmlns="http://www.w3.org/2000/svg" width="50px"
                        height="50px" viewBox="0 0 283.000000 289.000000" preserveAspectRatio="xMidYMid meet">
                        <metadata>
                            Created by potrace 1.10, written by Peter Selinger 2001-2011
                        </metadata>
                        <g transform="translate(0.000000,289.000000) scale(0.100000,-0.100000)" fill="#000000"
                            stroke="none">
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
            @endif
            @if (Auth::user() && Auth::user()->is_admin)
                @if (Request::segment(1) == 'wheels')
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
                @endif
            @endif
            @if (Auth::user() && Auth::user()->is_admin)
                @if (Request::segment(1) == 'wheels')
                    <a href="manufacturers/wheels">
                    @else
                        <a href="manufacturers/cars">
                @endif
                {{-- <a href="manufacturers/wheels"> --}}
                <div class="flex flex-row text-center sm:rounded-lg  mb-2 bg-gray-800">
                    <?xml version="1.0" ?>

                    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg class="mt-2 w-1/4 pr-0 " fill="#000000" width="50px" height="50px" viewBox="0 0 56 56"
                        id="Layer_1" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">

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
            @endif
            {{-- new filters --}}
            <div id="select-box_man" class="w-full h-[350px] relative ">
                <div id="content_man" class="p-[20px] dark:bg-gray-800 absolute rounded-lg w-full z-[999]">
                    <div id="search_man" class="">
                        <h1 class="dark:text-white text-xl font-semibold">Manufacturers</h1>
                        <input id="optionSearch_man" type="text" placeholder="Search" name=""
                            class="w-full p-[15px] outline-0 dark:bg-slate-800 dark:text-white rounded-lg">
                    </div>
                    <ul id="options_man"
                        class="mt-[10px] max-h-[200px] overflow-y-auto p-0 [&_li]:px-[10px] [&_li]:text-white [&_li]:py-[15px]  [&_li]:cursor-pointer [&_li]:border-b [&_li]:border-b-grey hover:[&_li]:bg-slate-300 dark:hover:[&_li]:bg-slate-900">
                        @foreach ($manufacturers as $manufacturer)
                            <form id="man_Form-{{ $manufacturer->id }}"
                                @if (Request::segment(1) == 'ads') action="{{ route('ads') }}" method="GET"
                                @elseif(Request::segment(1) == 'wheels')
                                action="{{ route('wheels') }}" method="GET"
                                @elseif(Request::segment(1) == 'cars')
                                action="{{ route('cars') }}" method="GET" @endif>
                                @csrf
                                <input type="hidden" value="{{ $manufacturer->id }}" name="manufacturer_input"
                                    id="manufacturer_input">
                                <li id="submitLiMan-{{ $manufacturer->id }}" class="submitLiMan">
                                    {{ $manufacturer->manufacturer_name }}</li>
                            </form>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{-- bolt_patterns --}}
            <div id="select-box_bolt" class="w-full h-[350px] relative">
                <div id="content_bolt" class="p-[20px] dark:bg-gray-800 absolute rounded-lg w-full z-[999]">
                    <div id="search_bolt" class="">
                        <h1 class="dark:text-white text-xl font-semibold">Bolt patterns:</h1>
                        <input id="optionSearch_bolt" type="text" placeholder="Search" name=""
                            class="w-full p-[15px] outline-0 dark:bg-slate-800 dark:text-white rounded-lg">
                    </div>
                    <ul id="options_bolt"
                        class="mt-[10px] max-h-[200px] overflow-y-auto p-0 [&_li]:px-[10px] [&_li]:text-white [&_li]:py-[15px]  [&_li]:cursor-pointer [&_li]:border-b [&_li]:border-b-grey hover:[&_li]:bg-slate-300 dark:hover:[&_li]:bg-slate-900">
                        @foreach ($bolt_patterns as $bolt_pattern)
                            <form id="bolt_Form-{{ $bolt_pattern->id }}"
                                @if (Request::segment(1) == 'ads') action="{{ route('ads') }}" method="GET"
                                @elseif(Request::segment(1) == 'wheels')
                                action="{{ route('wheels') }}" method="GET"
                                @elseif(Request::segment(1) == 'cars')
                                action="{{ route('cars') }}" method="GET" @endif>
                                @csrf
                                <input type="hidden" value="{{ $bolt_pattern->id }}" name="bolt_pattern_input"
                                    id="bolt_pattern_input">
                                <li id="submitLiBolt-{{ $bolt_pattern->id }}" class="submitLiBolt">
                                    {{ $bolt_pattern->bolt_pattern }}</li>
                            </form>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{--  --}}
            @if (Request::segment(1) != 'cars')
                <div id="select-box_wtype" class="w-full h-[350px] relative">
                    <div id="content_wtype" class="p-[20px] dark:bg-gray-800 absolute rounded-lg w-full z-[999]">
                        <div id="search_wtype" class="">
                            <h1 class="dark:text-white text-xl font-semibold">Wheel types:</h1>
                            <input id="optionSearch_wtype" type="text" placeholder="Search" name=""
                                class="w-full p-[15px] outline-0 dark:bg-slate-800 dark:text-white rounded-lg">
                        </div>
                        <ul id="options_wtype"
                            class="mt-[10px] max-h-[200px] overflow-y-auto p-0 [&_li]:px-[10px] [&_li]:text-white [&_li]:py-[15px]  [&_li]:cursor-pointer [&_li]:border-b [&_li]:border-b-grey hover:[&_li]:bg-slate-300 dark:hover:[&_li]:bg-slate-900">
                            @foreach ($wheel_types as $wheel_type)
                                <form id="wtype_Form-{{ $wheel_type->id }}"
                                    @if (Request::segment(1) == 'ads') action="{{ route('ads') }}" method="GET"
                                @elseif(Request::segment(1) == 'wheels')
                                action="{{ route('wheels') }}" method="GET"
                                @elseif(Request::segment(1) == 'cars')
                                action="{{ route('cars') }}" method="GET" @endif>
                                    @csrf
                                    <input type="hidden" value="{{ $wheel_type->id }}" name="wheel_type_input"
                                        id="wheel_type_input">
                                    <li id="submitLiwtype-{{ $wheel_type->id }}" class="submitLiwtype">
                                        {{ $wheel_type->wheel_type }}</li>
                                </form>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if (Request::segment(1) != 'cars')
                <div id="select-box_nut" class="w-full h-[350px] relative">
                    <div id="content_nut" class="p-[20px] dark:bg-gray-800 absolute rounded-lg w-full z-[999]">
                        <div id="search_nut" class="">
                            <h1 class="dark:text-white text-xl font-semibold">Mounting hardware:</h1>
                            <input id="optionSearch_nut" type="text" placeholder="Search" name=""
                                class="w-full p-[15px] outline-0 dark:bg-slate-800 dark:text-white rounded-lg">
                        </div>
                        <ul id="options_nut"
                            class="mt-[10px] max-h-[200px] overflow-y-auto p-0 [&_li]:px-[10px] [&_li]:text-white [&_li]:py-[15px]  [&_li]:cursor-pointer [&_li]:border-b [&_li]:border-b-grey hover:[&_li]:bg-slate-300 dark:hover:[&_li]:bg-slate-900">
                            @foreach ($nutBolts as $nut_bolt)
                                <form id="nut_Form-{{ $nut_bolt->id }}"
                                    @if (Request::segment(1) == 'ads') action="{{ route('ads') }}" method="GET"
                                @elseif(Request::segment(1) == 'wheels')
                                action="{{ route('wheels') }}" method="GET"
                                @elseif(Request::segment(1) == 'cars')
                                action="{{ route('cars') }}" method="GET" @endif>
                                    @csrf
                                    <input type="hidden" value="{{ $nut_bolt->id }}" name="nut_input"
                                        id="nut_input">
                                    <li id="submitLinut-{{ $nut_bolt->id }}" class="submitLinut">
                                        {{ $nut_bolt->type }}</li>
                                </form>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<script>
    const selectBox_man = document.getElementById('select-box_man');
    const content_man = document.getElementById('content_man');
    const search_man = document.getElementById('search_man');
    const optionSearch_man = document.getElementById('optionSearch_man');
    const options_man = document.getElementById('options_man');

    const selectBox_bolt = document.getElementById('select-box_bolt');
    const content_bolt = document.getElementById('content_bolt');
    const search_bolt = document.getElementById('search_bolt');
    const optionSearch_bolt = document.getElementById('optionSearch_bolt');
    const options_bolt = document.getElementById('options_bolt');

    const selectBox_wtype = document.getElementById('select-box_wtype');
    const content_wtype = document.getElementById('content_wtype');
    const search_wtype = document.getElementById('search_wtype');
    const optionSearch_wtype = document.getElementById('optionSearch_wtype');
    const options_wtype = document.getElementById('options_wtype');

    const selectBox_nut = document.getElementById('select-box_nut');
    const content_nut = document.getElementById('content_nut');
    const search_nut = document.getElementById('search_nut');
    const optionSearch_nut = document.getElementById('optionSearch_nut');
    const options_nut = document.getElementById('options_nut');


    optionSearch_man.addEventListener('keyup', function() {
        let filter, li, i, textValue;
        filter = optionSearch_man.value.toUpperCase();
        li = options_man.getElementsByTagName('li');
        for (i = 0; i < li.length; i++) {
            liCount = li[i];
            textValue = liCount.textContent || liCount.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = '';
            } else {
                li[i].style.display = 'none'
            }
        }
    })
    const liElements_man = document.querySelectorAll('.submitLiMan');
    liElements_man.forEach(function(liElement) {
        liElement.addEventListener('click', function() {
            const id = liElement.id.replace('submitLiMan-', '');
            document.getElementById('man_Form-' + id).submit();
        });
    });

    optionSearch_bolt.addEventListener('keyup', function() {
        let filter, li, i, textValue;
        filter = optionSearch_bolt.value.toUpperCase();
        li = options_bolt.getElementsByTagName('li');
        for (i = 0; i < li.length; i++) {
            liCount = li[i];
            textValue = liCount.textContent || liCount.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = '';
            } else {
                li[i].style.display = 'none'
            }
        }
    })
    const liElements_bolt = document.querySelectorAll('.submitLiBolt');
    liElements_bolt.forEach(function(liElement) {
        liElement.addEventListener('click', function() {
            const id = liElement.id.replace('submitLiBolt-', '');
            document.getElementById('bolt_Form-' + id).submit();
        });
    });

    optionSearch_wtype.addEventListener('keyup', function() {
        let filter, li, i, textValue;
        filter = optionSearch_wtype.value.toUpperCase();
        li = options_wtype.getElementsByTagName('li');
        for (i = 0; i < li.length; i++) {
            liCount = li[i];
            textValue = liCount.textContent || liCount.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = '';
            } else {
                li[i].style.display = 'none'
            }
        }
    })
    const liElements_wtype = document.querySelectorAll('.submitLiwtype');
    liElements_wtype.forEach(function(liElement) {
        liElement.addEventListener('click', function() {
            const id = liElement.id.replace('submitLiwtype-', '');
            document.getElementById('wtype_Form-' + id).submit();
        });
    });

    optionSearch_nut.addEventListener('keyup', function() {
        let filter, li, i, textValue;
        filter = optionSearch_nut.value.toUpperCase();
        li = options_nut.getElementsByTagName('li');
        for (i = 0; i < li.length; i++) {
            liCount = li[i];
            textValue = liCount.textContent || liCount.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = '';
            } else {
                li[i].style.display = 'none'
            }
        }
    })
    const liElements_nut = document.querySelectorAll('.submitLinut');
    liElements_nut.forEach(function(liElement) {
        liElement.addEventListener('click', function() {
            const id = liElement.id.replace('submitLinut-', '');
            document.getElementById('nut_Form-' + id).submit();
        });
    });
</script>
