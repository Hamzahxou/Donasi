<x-main title="Mulai Donasimu">
    <div class="bg-white h-screen font-sans flex flex-col ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8 ">
                <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left lg:flex lg:items-center">
                    <div>
                        <div class="flex flex-col items-center justify-center">
                            <a class="inline-flex px-1 py-1 gap-x-2 rounded-xl border border-gray-400 border-2 hover:border-orange-500 items-center text-sm font-semibold text-gray-600 space-x-1"
                                href="#">
                                <span
                                    class="bg-orange-100 flex items-center justify-center gap-2 text-orange-800 text-sm font-semibold px-2.5 py-0.5 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-orange-400">
                                        <path d="m3 11 18-5v12L3 14v-3z"></path>
                                        <path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path>
                                    </svg>
                                    Berlangsung</span>
                                <span>Dana Hampir Tercapai</span><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg></a>
                            <h1
                                class="mt-4 text-3xl tracking-tight font-extrabold text-gray-900 sm:mt-5 sm:leading-none lg:mt-6 lg:text-4xl xl:text-5xl">
                                <p class="sm:block">Bersama, Kita Bisa Mengubah Dunia</p>
                            </h1>
                        </div>
                        <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
                            <a href="#donation-tab"
                                class="inline-flex items-center text-white bg-orange-500 justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full sm:w-auto">
                                Bantu Mereka</a>
                        </div>
                    </div>
                </div>
                <div class="mt-16 ml-6 sm:mt-24 lg:mt-0 lg:col-span-5">
                    <img src="{{ asset('storage/assets/penerima.png') }}" alt="">
                    <p class="text-base ml-12 text-gray-600 sm:text-md lg:text-md xl:text-md hidden md:block">
                        Setiap donasi yang Anda berikan, sekecil apapun, dapat memberikan harapan baru bagi mereka yang
                        membutuhkan. Mari kita ciptakan perubahan positif bersama-sama.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- component -->
    <div class="flex justify-center items-center min-h-screen" id="donation-tab">
        <div class="mx-auto">
            <div class="block mb-4 mx-auto border-b border-slate-300 pb-2">
                <span class="block w-full px-4 py-2 text-center text-slate-700 transition-all">
                    Dengan bantuan Anda, dapat membantu mereka
                </span>
            </div>


            <div x-data="{ openTab: 1 }" class="p-8 w-svw">

                <div class="flex justify-center items-center gap-2 w-full mb-4">
                    <button x-on:click="openTab = 1" :class="{ 'bg-orange-300 text-white': openTab === 1 }"
                        class=" py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-orange transition-all duration-300">Section
                        1</button>
                    <button x-on:click="openTab = 2" :class="{ 'bg-orange-300 text-white': openTab === 2 }"
                        class=" py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-orange transition-all duration-300">Section
                        2</button>
                    <button x-on:click="openTab = 3" :class="{ 'bg-orange-300 text-white': openTab === 3 }"
                        class=" py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-orange transition-all duration-300">Section
                        3</button>
                </div>

                <div x-show="openTab === 1" class="transition-all duration-300">
                    <div class="flex gap-2 justify-center items-center flex-wrap">
                        <!-- Centering wrapper -->
                        <div
                            class="relative flex w-80 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                            <div
                                class="relative mx-4 mt-4 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
                                <img src="https://images.unsplash.com/photo-1499696010180-025ef6e1a8f9?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1470&amp;q=80"
                                    alt="ui/ux review check" />

                            </div>
                            <div class="p-6 pb-2">
                                <div class="mb-3">
                                    <h5
                                        class="block font-sans text-xl antialiased font-medium leading-snug tracking-normal text-blue-gray-900">
                                        Wooden House, Florida
                                    </h5>
                                </div>
                                <p
                                    class="block font-sans text-base antialiased font-light leading-relaxed text-gray-700">
                                    Enter a freshly updated and thoughtfully furnished peaceful home surrounded by
                                    ancient
                                    trees,
                                    stone
                                    walls, and open meadows.
                                </p>
                                <div class="my-4">
                                    <p class="text-sm text-gray-600"><b>Rp. 90.000.00</b> sampai Rp. 100.000.00</p>
                                    <div class="w-full relative h-2 bg-slate-400 rounded my-2">
                                        <div class="absolute h-full bg-orange-500 rounded" style="width: 90%">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm text-gray-600 font-bold flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6">
                                                <path
                                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                                                </path>
                                            </svg>
                                            23 Donasi
                                        </p>
                                        <div class="bg-gray-200 px-2 py-1 rounded" style="cursor: pointer">
                                            <div class="w-5 h-5">
                                                <svg viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M15 3C15 2.44772 15.4477 2 16 2C19.3137 2 22 4.68629 22 8V16C22 19.3137 19.3137 22 16 22H8C4.68629 22 2 19.3137 2 16C2 15.4477 2.44772 15 3 15C3.55228 15 4 15.4477 4 16C4 18.2091 5.79086 20 8 20H16C18.2091 20 20 18.2091 20 16V8C20 5.79086 18.2091 4 16 4C15.4477 4 15 3.55228 15 3Z"
                                                            fill="rgb(51 65 85)"></path>
                                                        <path
                                                            d="M3.70663 12.7845L3.16104 12.2746L3.70664 12.7845C4.09784 12.3659 4.62287 11.8265 5.17057 11.3274C5.72852 10.8191 6.26942 10.3905 6.69641 10.1599C7.06268 9.96208 7.75042 9.84035 8.40045 9.84848C8.62464 9.85128 8.81365 9.86944 8.9559 9.89472C8.96038 10.5499 8.95447 11.7469 8.95145 12.2627C8.94709 13.0099 9.83876 13.398 10.3829 12.8878L14.9391 8.61636C15.2845 8.2926 15.2988 7.74908 14.971 7.4076L10.4132 2.65991C9.88293 2.10757 8.95 2.48291 8.95 3.24856V5.16793C8.5431 5.13738 8.0261 5.11437 7.47937 5.13009C6.5313 5.15734 5.30943 5.30257 4.4722 5.88397C4.36796 5.95636 4.26827 6.03539 4.17359 6.11781C2.49277 7.58092 2.11567 9.90795 1.8924 11.7685L1.87242 11.935C1.74795 12.9722 3.02541 13.5134 3.70663 12.7845ZM9.35701 11.7935L9.70204 12.1615L9.35701 11.7935C9.35715 11.7934 9.35729 11.7932 9.35744 11.7931L9.35701 11.7935Z"
                                                            stroke="rgb(51 65 85)" stroke-width="1.5"
                                                            stroke-linecap="round">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('donation.show', 1) }}"
                                    class="block w-full select-none rounded-lg bg-orange-500 text-center p-2 align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button">
                                    Donasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-main>
