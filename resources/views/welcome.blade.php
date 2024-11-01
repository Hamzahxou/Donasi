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

            <div x-data="{ openTab: 0 }" class="p-8 w-svw">
                <div class="flex justify-center items-center gap-2 w-full mb-4">
                    @foreach ($categories as $index => $category)
                        @if ($category->projects->count() > 0)
                            <button x-on:click="openTab = {{ $index }}"
                                :class="{ 'bg-orange-300 text-white': openTab === {{ $index }} }"
                                class=" py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-orange transition-all duration-300">{{ $category->name }}</button>
                        @endif
                    @endforeach
                </div>
                <div class="flex justify-center items-center gap-2 w-full mb-4 flex-wrap">
                    @foreach ($categories as $index => $category)
                        @if ($category->projects->count() > 0)
                            @foreach ($category->projects as $project)
                                <div x-show="openTab === {{ $index }}"
                                    class="transition-all duration-300 flex flex-wrap gap-5">
                                    <div class="flex gap-2 justify-center items-center flex-wrap">
                                        <!-- Centering wrapper -->
                                        <div
                                            class="min-h-96 flex w-80 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                                            <div
                                                class=" mx-4 mt-4 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
                                                <img src="{{ asset('storage/' . $project->image) }}"
                                                    alt="ui/ux review check" />

                                            </div>
                                            <div class="p-6 pt-4 pb-4">
                                                <div class="mb-3">
                                                    <h5
                                                        class="block font-sans text-xl antialiased font-medium leading-snug tracking-normal text-blue-gray-900">
                                                        {{ Str::limit($project->title, 20, '...') }}
                                                    </h5>
                                                </div>
                                                <p
                                                    class="block font-sans text-base antialiased font-light leading-relaxed text-gray-700">
                                                    {{ Str::limit($project->description, 200) }}
                                                </p>
                                                <div class="my-4">
                                                    <p class="text-sm text-gray-600"><b>Rp.
                                                            {{ number_format($project->collected_amount, 0, ',', '.') }}</b>
                                                        sampai Rp.
                                                        {{ number_format($project->target_amount, 0, ',', '.') }}</p>

                                                    @php
                                                        $target_amount = $project->target_amount;
                                                        $collected_amount = $project->collected_amount;
                                                        $percent = round(($collected_amount / $target_amount) * 100);

                                                    @endphp

                                                    <div
                                                        class="w-full relative h-2 bg-slate-400 rounded my-2 overflow-hidden">
                                                        <div class="absolute h-full bg-orange-500 rounded"
                                                            style="width: {{ $percent > '100' ? '100' : $percent }}%">
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-between">
                                                        <p
                                                            class="text-sm text-gray-600 font-bold flex items-center gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" class="w-6 h-6">
                                                                <path
                                                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                                                                </path>
                                                            </svg>
                                                            {{ $project->donations_count }} Donasi
                                                        </p>
                                                        <p class="bg-gray-200 px-2 py-1 rounded text-sm">

                                                            @php
                                                                $current_date = \Carbon\Carbon::now()->startOfDay();
                                                                $target_date = \Carbon\Carbon::parse(
                                                                    $project->target_date,
                                                                )->startOfDay();
                                                                $days = $current_date->diffInDays($target_date);
                                                                $days = $days > 0 ? $days : 0;
                                                            @endphp
                                                            {{ $days }} hari lagi
                                                        </p>
                                                    </div>
                                                </div>
                                                <a href="{{ route('donation.show', $project->id) }}"
                                                    class="block w-full select-none rounded-lg bg-orange-500 text-center p-2 align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                    type="button">
                                                    Donasi
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-main>
