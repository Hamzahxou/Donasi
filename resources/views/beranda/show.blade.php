<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        button[data-toggle-navbar][data-is-open="true"] #line-1 {
            transform: translateY(0.375rem) rotate(40deg);
        }

        button[data-toggle-navbar][data-is-open="true"] #line-2 {
            transform: scaleX(0);
            opacity: 0;
        }

        button[data-toggle-navbar][data-is-open="true"] #line-3 {
            transform: translateY(-0.375rem) rotate(-40deg);
        }
    </style>


</head>

<body class="font-sans antialiased">
    <!-- component -->
    <header class="inset-x-0 top-0 z-50 py-3 mb-2 md:mb-0">
        <div class="mx-auto lg:max-w-7xl w-full px-5 sm:px-10 md:px-12 lg:px-5">
            <nav class="w-full flex justify-between gap-6 relative">
                <!-- logo -->
                <div class="min-w-max inline-flex relative">
                    <a href="/" class="relative flex items-center gap-3">
                        <div class="relative w-7 h-7 overflow-hidden flex rounded-xl">
                            <span class="absolute w-4 h-4 -top-1 -right-1 bg-green-500 rounded-md rotate-45"></span>
                            <span class="absolute w-4 h-4 -bottom-1 -right-1 bg-[#FCDC58] rounded-md rotate-45"></span>
                            <span class="absolute w-4 h-4 -bottom-1 -left-1 bg-blue-600 rounded-md rotate-45"></span>
                            <span
                                class="absolute w-2 h-2 rounded-full bg-gray-900 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></span>
                        </div>
                        <div class="inline-flex text-lg font-semibold text-gray-900">
                            AgenceX
                        </div>
                    </a>
                </div>

                <div data-nav-overlay aria-hidden="true"
                    class="fixed hidden inset-0 lg:!hidden bg-gray-800/60 bg-opacity-50 backdrop-filter backdrop-blur-xl">
                </div>
                <div data-navbar
                    class="flex invisible opacity-0  translate-y-10 overflow-hidden lg:visible lg:opacity-100  lg:-translate-y-0 lg:scale-y-100 duration-300 ease-linear flex-col gap-y-6 gap-x-4 lg:flex-row w-full lg:justify-between lg:items-center p-5 md:p-0 absolute lg:relative top-full lg:top-0 bg-white lg:!bg-transparent border-x border-x-gray-100 lg:border-x-0">
                    <ul
                        class="border-t border-gray-100  lg:border-t-0 px-6 lg:px-0 pt-6 lg:pt-0 flex flex-col lg:flex-row gap-y-4 gap-x-3 text-lg text-gray-700 w-full lg:justify-center lg:items-center">
                        <li>
                            <a href="{{ route('beranda') }}"
                                class="duration-300 font-medium ease-linear hover:text-orange-500  py-3">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="duration-300 font-medium ease-linear text-orange-500 hover:text-orange-700  py-3">
                                Donasi
                            </a>
                        </li>
                        <li>
                            <a href="#" class="duration-300 font-medium ease-linear hover:text-orange-500 py-3">
                                Category
                            </a>
                        </li>
                    </ul>

                    <div class="flex gap-1 justify-center items-center">
                        @auth
                            <a href="{{ route('dashboard') }}"
                                class="text-white bg-orange-500 rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground h-10 px-4 py-2 w-full sm:w-auto">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-white bg-orange-500 rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground h-10 px-4 py-2 w-full sm:w-auto">
                                Masuk
                            </a>
                            <a href="{{ route('register') }}"
                                class="hover:ring-gray-400 hover:bg-gray-100 rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-3 w-full sm:mt-0 sm:ml-3 sm:w-auto">
                                Daftar
                            </a>
                        @endauth
                    </div>
                </div>


                <div class="min-w-max flex items-center gap-x-3">

                    <button data-toggle-navbar data-is-open="false"
                        class="lg:hidden lg:invisible outline-none w-7 h-auto flex flex-col relative">
                        <span id="line-1"
                            class="w-6 h-0.5 rounded-full bg-gray-700 transition-all duration-300 ease-linear"></span>
                        <span id="line-2"
                            class="w-6 origin-center  mt-1 h-0.5 rounded-ful bg-gray-700 transition-all duration-300 ease-linear"></span>
                        <span id="line-3"
                            class="w-6 mt-1 h-0.5 rounded-ful bg-gray-700 transition-all duration-300 ease-linear"></span>
                        <span class="sr-only">togglenav</span>
                    </button>
                </div>
            </nav>
        </div>
    </header>





    <script>
        const btnHumb = document.querySelector("[data-toggle-navbar]")
        const navbar = document.querySelector("[data-navbar]")
        const overlay = document.querySelector("[data-nav-overlay]")
        if (btnHumb && navbar) {
            const toggleBtnAttr = () => {
                const isOpen = btnHumb.getAttribute("data-is-open")
                btnHumb.setAttribute("data-is-open", isOpen === "true" ? "false" : "true")
                if (isOpen === "false") {
                    overlay.classList.toggle("hidden")
                    document.body.classList.add('max-h-screen', 'overflow-hidden')
                } else {
                    overlay.classList.add("hidden")
                    document.body.classList.remove('max-h-screen', 'overflow-hidden')
                }
            }
            btnHumb.addEventListener("click", () => {
                navbar.classList.toggle("invisible")
                navbar.classList.toggle("opacity-0")
                navbar.classList.toggle("translate-y-10")
                toggleBtnAttr()
            })

            overlay.addEventListener("click", () => {
                navbar.classList.add("invisible")
                navbar.classList.add("opacity-0")
                navbar.classList.add("translate-y-10")
                toggleBtnAttr()
            })
        }
    </script>
</body>

</html>
