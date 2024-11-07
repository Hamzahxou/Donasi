<x-blank>
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="bg-white shadow flex justify-center flex-1">
            <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
                <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                    style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
                </div>
            </div>
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div>
                    <img src="{{ asset('storage/assets/logo/icon.png') }}" class="w-32 mx-auto" />
                </div>
                <div class="mt-5 flex flex-col items-center">
                    <h1 class="text-2xl font-extrabold">
                        Daftarkan akun anda
                    </h1>
                    <div class="w-full flex-1 mt-2">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mx-auto max-w-xs">
                                <div class="mt-4">
                                    <x-text-input id="name"
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-orange-500 focus:bg-white"
                                        type="text" name="name" :value="old('name')" required autofocus
                                        placeholder="Name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-text-input id="email"
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-orange-500 focus:bg-white"
                                        type="email" name="email" :value="old('email')" required placeholder="Email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-text-input id="password"
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-orange-500 focus:bg-white"
                                        type="password" name="password" required placeholder="Password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-text-input id="password_confirmation"
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-orange-500 focus:bg-white"
                                        type="password" name="password_confirmation" required
                                        placeholder="Confirmation Password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>


                                <button
                                    class="mt-5 tracking-wide font-semibold bg-orange-500 text-gray-100 w-full py-4 rounded-lg hover:bg-bg-orange-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                        <circle cx="8.5" cy="7" r="4" />
                                        <path d="M20 8v6M23 11h-6" />
                                    </svg>
                                    <span class="ml-3">
                                        Daftar
                                    </span>
                                </button>
                                <p class="mt-6 text-xs text-gray-600 text-center">
                                    sudah punya akun?
                                    <a href="{{ route('login') }}" class="border-b border-gray-500 border-dotted">
                                        login
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-blank>
