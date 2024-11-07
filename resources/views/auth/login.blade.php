<x-blank>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="bg-white shadow flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div>
                    <img src="{{ asset('storage/assets/logo/icon.png') }}" class="w-32 mx-auto" />
                </div>
                <div class="mt-12 flex flex-col items-center">
                    <h1 class="text-2xl font-extrabold">
                        Masuk ke akun anda
                    </h1>
                    <div class="w-full flex-1 mt-8">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mx-auto max-w-xs">
                                <div class="mt-4">
                                    <x-text-input id="email"
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        type="email" name="email" :value="old('email')" required autofocus
                                        placeholder="Email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-text-input id="password"
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        type="password" name="password" :value="old('password')" required autofocus
                                        placeholder="Password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500"
                                            name="remember">
                                        <span class="ms-2 text-sm text-gray-600">{{ __('Ingatkan saya') }}</span>
                                    </label>
                                </div>
                                <button
                                    class="mt-5 tracking-wide font-semibold bg-orange-500 text-gray-100 w-full py-4 rounded-lg hover:bg-bg-orange-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <span class="ml-3">
                                        Masuk
                                    </span>
                                </button>
                                <p class="mt-6 text-xs text-gray-600 text-center">
                                    belum punya akun?
                                    <a href="{{ route('register') }}" class="border-b border-gray-500 border-dotted">
                                        daftar
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
                <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                    style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
                </div>
            </div>
        </div>
    </div>
</x-blank>
