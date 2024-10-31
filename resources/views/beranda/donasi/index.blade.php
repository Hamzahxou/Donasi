<x-main title="Mulai Donasimu">
    <div class="flex justify-center min-h-screen" id="donation-tab">
        <div class="mx-auto">

            <div x-data="{ openTab: 0 }" class="p-8 w-svw">
                <div class="flex justify-center items-center gap-2 w-full mb-4">
                    @foreach ($categories as $index => $category)
                        <button x-on:click="openTab = {{ $index }}"
                            :class="{ 'bg-orange-300 text-white': openTab === {{ $index }} }"
                            class=" py-2 px-4 rounded-md border border-gray-300 focus:outline-none focus:shadow-outline-orange transition-all duration-300">{{ $category->name }}</button>
                    @endforeach
                </div>

                @foreach ($categories as $index => $category)
                    @if ($category->projects->count() > 0)
                        @foreach ($category->projects as $project)
                            <div x-show="openTab === {{ $index }}" class="transition-all duration-300 w-96">
                                <div class="flex gap-2 justify-center items-center flex-wrap">
                                    <!-- Centering wrapper -->
                                    <div
                                        class="relative flex w-80 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                                        <div
                                            class="relative mx-4 mt-4 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
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
                                                    <p class="text-sm text-gray-600 font-bold flex items-center gap-1">
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
</x-main>
