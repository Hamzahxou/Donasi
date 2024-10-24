<x-main title="show">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            <h1 class="text-2xl font-bold text-center my-4 text-gray-900">Bencana banjir diblega madura</h1>
            <div class="flex justify-between items-center">
                <p class="text-sm md:text-md text-gray-600">Terkumpul <b>Rp. 90.000.00</b> sampai Rp. 100.000.00</p>
                <div class="flex gap-2 justify-end flex-wrap">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600 font-bold flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                                </path>
                            </svg>
                            23 Donasi
                        </p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600 font-bold flex items-center gap-1">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 2C8.55228 2 9 2.44772 9 3V6C9 6.55228 8.55228 7 8 7C7.44772 7 7 6.55228 7 6V3C7 2.44772 7.44772 2 8 2Z"
                                        fill="rgb(75 85 99 / var(--tw-text-opacity))"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16 2C16.5523 2 17 2.44772 17 3V6C17 6.55228 16.5523 7 16 7C15.4477 7 15 6.55228 15 6V3C15 2.44772 15.4477 2 16 2Z"
                                        fill="rgb(75 85 99 / var(--tw-text-opacity))"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 3C4.23858 3 2 5.23858 2 8V17C2 19.7614 4.23858 22 7 22H17C19.7614 22 22 19.7614 22 17V8C22 5.23858 19.7614 3 17 3H7ZM8 13C8 12.4477 8.44772 12 9 12H15C15.5523 12 16 12.4477 16 13C16 13.5523 15.5523 14 15 14H9C8.44772 14 8 13.5523 8 13Z"
                                        fill="rgb(75 85 99 / var(--tw-text-opacity))"></path>
                                </g>
                            </svg>
                            50 Hari lagi
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full h-4 bg-slate-400 rounded-full my-2">
                <div class="h-full bg-orange-500 rounded-full" style="width: 90%">
                </div>
            </div>

        </div>
        <div class="my-6">
            <div class="block lg:flex gap-2">
                <div class="h-screen flex-1">
                    <div class="w-9/12 mx-auto">
                        <img src="https://images.unsplash.com/photo-1499696010180-025ef6e1a8f9?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1470&amp;q=80"
                            alt="ui/ux review check" class="w-full rounded-md" />
                    </div>

                    <div x-data="{ openTab: 1 }" class="my-8">
                        <div class="flex justify-center items-center gap-2 w-full mb-4">
                            <button x-on:click="openTab = 1" :class="{ 'bg-orange-300 text-white': openTab === 1 }"
                                class=" py-2 px-4 rounded-md bg-gray-100 focus:outline-none focus:shadow-outline-orange transition-all duration-300">Tentang
                            </button>
                            <button x-on:click="openTab = 2" :class="{ 'bg-orange-300 text-white': openTab === 2 }"
                                class=" py-2 px-4 rounded-md bg-gray-100 focus:outline-none focus:shadow-outline-orange transition-all duration-300">Berita
                                Terbaru
                            </button>
                            <button x-on:click="openTab = 3" :class="{ 'bg-orange-300 text-white': openTab === 3 }"
                                class=" py-2 px-4 rounded-md bg-gray-100 focus:outline-none focus:shadow-outline-orange transition-all duration-300">Komentar
                            </button>
                        </div>

                        <div x-show="openTab === 1" class="transition-all duration-300">
                            <div class="">
                                <p>sip lah</p>
                            </div>
                        </div>
                        <div x-show="openTab === 2" class="transition-all duration-300">
                            <div class="">
                                <p>sip bro</p>
                            </div>
                        </div>
                        <div x-show="openTab === 3" class="transition-all duration-300">
                            <div class="">
                                <p>sip bro aman</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div x-data="{ share: false }"
                    class="bg-gray-200 h-screen flex-initial lg:w-80 rounded-md flex flex-col items-center p-5 gap-2">
                    <div x-data="{ donasi: false }" class="w-full">
                        <x-primary-button @click="donasi = true" class="w-full py-4">Donasi
                            Sekarang</x-primary-button>
                        <div x-show="donasi"
                            class="fixed inset-0 bg-gray-800/60 bg-opacity-50 backdrop-filter backdrop-blur-xl flex justify-center items-center">
                            <div class="bg-white p-4 relative rounded-md">
                                <div @click="donasi = false"
                                    class="absolute bg-white rounded-full -top-2 -right-2 text-sm text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                <!-- component -->
                                <!-- This is an example component -->

                                <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                                    <div class='max-w-md mx-auto space-y-6'>
                                        <div class="space-y-4">
                                            <p class="text-sm font-medium text-center text-neutral-500">Select a
                                                option</p>
                                            <div class="relative">
                                                <input type="radio" name="options" id="option1-checkbox"
                                                    value="1" class="hidden peer">
                                                <label for="option1-checkbox"
                                                    class="inline-flex items-center justify-between w-full p-5 bg-white border-2 rounded-lg cursor-pointer group border-neutral-200/70 text-neutral-600 peer-checked:border-blue-400 peer-checked:text-neutral-900 peer-checked:bg-blue-200/50 hover:text-neutral-900 hover:border-neutral-300">
                                                    <div class="flex items-center space-x-5">
                                                        <svg class="w-16 h-auto" xmlns="http://www.w3.org/2000/svg"
                                                            width="1em" height="1em" viewBox="0 0 256 256">
                                                            <g fill="currentColor">
                                                                <path
                                                                    d="M224 56v122.06l-39.72-39.72a8 8 0 0 0-11.31 0L147.31 164l-49.65-49.66a8 8 0 0 0-11.32 0L32 168.69V56a8 8 0 0 1 8-8h176a8 8 0 0 1 8 8"
                                                                    opacity="0.2" />
                                                                <path
                                                                    d="M216 40H40a16 16 0 0 0-16 16v144a16 16 0 0 0 16 16h176a16 16 0 0 0 16-16V56a16 16 0 0 0-16-16m0 16v102.75l-26.07-26.06a16 16 0 0 0-22.63 0l-20 20l-44-44a16 16 0 0 0-22.62 0L40 149.37V56ZM40 172l52-52l80 80H40Zm176 28h-21.37l-36-36l20-20L216 181.38zm-72-100a12 12 0 1 1 12 12a12 12 0 0 1-12-12" />
                                                            </g>
                                                        </svg>
                                                        <div class="flex flex-col justify-start">
                                                            <div class="w-full text-lg font-semibold">Option 1
                                                            </div>
                                                            <div class="w-full text-sm opacity-60">The first option
                                                                is cool</div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="relative">
                                                <input type="radio" name="options" id="option2-checkbox"
                                                    value="2" class="hidden peer">
                                                <label for="option2-checkbox"
                                                    class="inline-flex items-center justify-between w-full p-5 bg-white border-2 rounded-lg cursor-pointer group border-neutral-200/70 text-neutral-600 peer-checked:border-blue-400 peer-checked:text-neutral-900 peer-checked:bg-blue-200/50 hover:text-neutral-900 hover:border-neutral-300">
                                                    <div class="flex items-center space-x-5">
                                                        <svg class="w-16 h-auto" xmlns="http://www.w3.org/2000/svg"
                                                            width="1em" height="1em" viewBox="0 0 256 256">
                                                            <g fill="currentColor">
                                                                <path
                                                                    d="M224 56v122.06l-39.72-39.72a8 8 0 0 0-11.31 0L147.31 164l-49.65-49.66a8 8 0 0 0-11.32 0L32 168.69V56a8 8 0 0 1 8-8h176a8 8 0 0 1 8 8"
                                                                    opacity="0.2" />
                                                                <path
                                                                    d="M216 40H40a16 16 0 0 0-16 16v144a16 16 0 0 0 16 16h176a16 16 0 0 0 16-16V56a16 16 0 0 0-16-16m0 16v102.75l-26.07-26.06a16 16 0 0 0-22.63 0l-20 20l-44-44a16 16 0 0 0-22.62 0L40 149.37V56ZM40 172l52-52l80 80H40Zm176 28h-21.37l-36-36l20-20L216 181.38zm-72-100a12 12 0 1 1 12 12a12 12 0 0 1-12-12" />
                                                            </g>
                                                        </svg>
                                                        <div class="flex flex-col justify-start">
                                                            <div class="w-full text-lg font-semibold">Option 2
                                                            </div>
                                                            <div class="w-full text-sm opacity-60">The second
                                                                option is nice</div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-slate-700">Bagikan kepada yang lainnya</p>
                    <x-secondary-button class="w-full py-4 gap-1" @click="share = ! share">
                        <div class="w-3 h-3"><svg viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.5 2.25C14.7051 2.25 13.25 3.70507 13.25 5.5C13.25 5.69591 13.2673 5.88776 13.3006 6.07412L8.56991 9.38558C8.54587 9.4024 8.52312 9.42038 8.50168 9.43939C7.94993 9.00747 7.25503 8.75 6.5 8.75C4.70507 8.75 3.25 10.2051 3.25 12C3.25 13.7949 4.70507 15.25 6.5 15.25C7.25503 15.25 7.94993 14.9925 8.50168 14.5606C8.52312 14.5796 8.54587 14.5976 8.56991 14.6144L13.3006 17.9259C13.2673 18.1122 13.25 18.3041 13.25 18.5C13.25 20.2949 14.7051 21.75 16.5 21.75C18.2949 21.75 19.75 20.2949 19.75 18.5C19.75 16.7051 18.2949 15.25 16.5 15.25C15.4472 15.25 14.5113 15.7506 13.9174 16.5267L9.43806 13.3911C9.63809 12.9694 9.75 12.4978 9.75 12C9.75 11.5022 9.63809 11.0306 9.43806 10.6089L13.9174 7.4733C14.5113 8.24942 15.4472 8.75 16.5 8.75C18.2949 8.75 19.75 7.29493 19.75 5.5C19.75 3.70507 18.2949 2.25 16.5 2.25ZM14.75 5.5C14.75 4.5335 15.5335 3.75 16.5 3.75C17.4665 3.75 18.25 4.5335 18.25 5.5C18.25 6.4665 17.4665 7.25 16.5 7.25C15.5335 7.25 14.75 6.4665 14.75 5.5ZM6.5 10.25C5.5335 10.25 4.75 11.0335 4.75 12C4.75 12.9665 5.5335 13.75 6.5 13.75C7.4665 13.75 8.25 12.9665 8.25 12C8.25 11.0335 7.4665 10.25 6.5 10.25ZM16.5 16.75C15.5335 16.75 14.75 17.5335 14.75 18.5C14.75 19.4665 15.5335 20.25 16.5 20.25C17.4665 20.25 18.25 19.4665 18.25 18.5C18.25 17.5335 17.4665 16.75 16.5 16.75Z"
                                        fill="#1C274C"></path>
                                </g>
                            </svg></div> Bagikan
                    </x-secondary-button>
                    <div :class="{ 'flex': share, 'hidden': !share }" class=" flex-wrap justify-center gap-2 w-full">
                        <a href="https://api.whatsapp.com/send?text={{ url()->current() }}"
                            class=" px-4 py-2 bg-green-500 rounded-md text-white text-sm flex gap-3">
                            <div class="w-3 h-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
                                        fill="#ffffff" />
                                </svg></div>
                        </a>
                        <a href="https://web.facebook.com/sharer.php?u={{ url()->current() }}"
                            class=" px-4 py-2 bg-blue-500 rounded-md text-white text-sm flex gap-3">
                            <div class="w-3 h-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"
                                        fill="#ffffff" />
                                </svg></div>
                        </a>
                        <a href="https://t.me/share/url?url= {{ url()->current() }}"
                            class=" px-4 py-2 bg-blue-400 rounded-md text-white text-sm flex gap-3">
                            <div class="w-3 h-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                    <path
                                        d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"
                                        fill="#ffffff" />
                                </svg></div>
                        </a>
                        <input id="linkurl" type="hidden" value="{{ url()->current() }}">
                        <button type="button"
                            onclick="document.getElementById('linkurl').select(); document.execCommand('copy');"
                            class="px-4 py-2 bg-gray-300 rounded-md text-white text-sm flex gap-3">
                            <div class="w-3 h-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M208 0L332.1 0c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9L448 336c0 26.5-21.5 48-48 48l-192 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48zM48 128l80 0 0 64-64 0 0 256 192 0 0-32 64 0 0 48c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 176c0-26.5 21.5-48 48-48z"
                                        fill="#1C274C" />
                                </svg>
                            </div>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-main>
