<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-12 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                            class="w-6 h-6 text-white">
                            <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
                            <path fill-rule="evenodd"
                                d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                clip-rule="evenodd"></path>
                            <path
                                d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                            Dana Didonasikan</p>
                        <h4
                            class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                            Rp. <b>{{ number_format($donations->sum('amount'), 0, ',', '.') }}</b></h4>
                    </div>
                </div>
                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-6 h-6 text-white">
                            <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
                            <path fill-rule="evenodd"
                                d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                clip-rule="evenodd"></path>
                            <path
                                d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                            Dana Tertunda</p>
                        <h4
                            class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                            Rp.
                            <b>{{ number_format($donations->where('is_verified', false)->sum('amount'), 0, ',', '.') }}</b>
                        </h4>
                    </div>
                </div>
                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-orange-600 to-orange-400 text-white shadow-orange-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-6 h-6 text-white">
                            <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
                            <path fill-rule="evenodd"
                                d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                clip-rule="evenodd"></path>
                            <path
                                d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                            Dana Diterima
                        </p>
                        <h4
                            class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                            Rp.
                            <strong
                                class="text-green-500">{{ number_format($donations->where('is_verified', true)->sum('amount'), 0, ',', '.') }}</strong>
                        </h4>
                    </div>
                </div>
                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-pink-600 to-pink-400 text-white shadow-pink-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-6 h-6 text-white">
                            <path
                                d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                            Jumlah Donasi</p>
                        <h4
                            class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                            {{ $donations->count() }}</h4>
                    </div>
                </div>

            </div>

            <div class="mb-4 w-full">
                <div
                    class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md overflow-hidden xl:col-span-2">
                    <div
                        class="relative bg-clip-border rounded-xl overflow-hidden bg-transparent text-gray-700 shadow-none m-0 flex items-center justify-between p-6">
                        <div>
                            <h6
                                class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-blue-gray-900 mb-1">
                                Didonasikan</h6>
                        </div>
                    </div>
                    <div class="p-6 overflow-x-auto px-0 pt-0 pb-2">
                        <table class="w-full min-w-[640px] table-auto">
                            <thead>
                                <tr>
                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                        <p
                                            class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                            Judul</p>
                                    </th>
                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                        <p
                                            class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                            Dana Didonasikan</p>
                                    </th>
                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                        <p
                                            class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                            Status</p>
                                    </th>
                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                        <p
                                            class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                            Target Dana</p>
                                    </th>
                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                        <p
                                            class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                            Target Waktu</p>
                                    </th>
                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                        <p
                                            class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                            kemajuan</p>
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="flex items-center gap-4">
                                                <p
                                                    class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">
                                                    {{ $project->project->title }}</p>
                                            </div>
                                        </td>

                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <p
                                                class="block antialiased font-sans text-xs font-medium text-blue-gray-600">
                                                Rp.
                                                {{ number_format($project->amount, 0, ',', '.') }}
                                            </p>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <p
                                                class="block antialiased font-sans text-xs font-medium text-blue-gray-600">
                                                @if ($project->is_verified)
                                                    <span class="inline-block text-green-500 text-sm font-medium">
                                                        Disetujui</span>
                                                @else
                                                    <span class="inline-block text-red-500 text-sm font-medium">Belum
                                                        Disetujui</span>
                                                @endif
                                            </p>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <p
                                                class="block antialiased font-sans text-xs font-medium text-blue-gray-600">
                                                Rp. {{ number_format($project->project->target_amount, 0, ',', '.') }}
                                            </p>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <p
                                                class="block antialiased font-sans text-xs font-medium text-blue-gray-600">
                                                @php
                                                    $current_date = \Carbon\Carbon::now()->startOfDay();
                                                    $target_date = \Carbon\Carbon::parse(
                                                        $project->project->target_date,
                                                    )->startOfDay();
                                                    $days = $current_date->diffInDays($target_date);
                                                    $days = $days > 0 ? $days : 0;
                                                @endphp
                                                {{ $days }} hari lagi</p>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="w-10/12">
                                                @php
                                                    $target_amount = $project->project->target_amount;
                                                    $collected_amount = $project->project->collected_amount;
                                                    $percent = round(($collected_amount / $target_amount) * 100);
                                                @endphp
                                                <p
                                                    class="antialiased font-sans mb-1 block text-xs font-medium text-blue-gray-600">
                                                    {{ $percent > '100' ? '100' : $percent }}%</p>
                                                <div
                                                    class="flex flex-start bg-blue-gray-50 overflow-hidden w-full rounded-sm font-sans text-xs font-medium h-1">
                                                    <div class="flex justify-center items-center h-full bg-gradient-to-tr from-blue-600 to-blue-400 text-white"
                                                        style="width: {{ $percent > '100' ? '100' : $percent }}%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td x-data="{ edit: false }">
                                            <div class="flex gap-2">
                                                @if ($project->is_verified == false)
                                                    <button type="button" x-on:click="edit = true"
                                                        class="block text-blue-600 hover:text-blue-400">
                                                        <div class="w-4 h-4">
                                                            <svg viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path
                                                                        d="M2 12.5001L3.75159 10.9675C4.66286 10.1702 6.03628 10.2159 6.89249 11.0721L11.1822 15.3618C11.8694 16.0491 12.9512 16.1428 13.7464 15.5839L14.0446 15.3744C15.1888 14.5702 16.7369 14.6634 17.7765 15.599L21 18.5001"
                                                                        stroke="rgb(245 158 11)" stroke-width="1.5"
                                                                        stroke-linecap="round"></path>
                                                                    <path
                                                                        d="M18.562 2.9354L18.9791 2.5183C19.6702 1.82723 20.7906 1.82723 21.4817 2.5183C22.1728 3.20937 22.1728 4.32981 21.4817 5.02087L21.0646 5.43797M18.562 2.9354C18.562 2.9354 18.6142 3.82172 19.3962 4.60378C20.1783 5.38583 21.0646 5.43797 21.0646 5.43797M18.562 2.9354L14.7275 6.76995C14.4677 7.02968 14.3379 7.15954 14.2262 7.30273C14.0945 7.47163 13.9815 7.65439 13.8894 7.84776C13.8112 8.01169 13.7532 8.18591 13.637 8.53437L13.2651 9.65M21.0646 5.43797L17.23 9.27253C16.9703 9.53225 16.8405 9.66211 16.6973 9.7738C16.5284 9.90554 16.3456 10.0185 16.1522 10.1106C15.9883 10.1888 15.8141 10.2468 15.4656 10.363L14.35 10.7349M14.35 10.7349L13.6281 10.9755C13.4567 11.0327 13.2676 10.988 13.1398 10.8602C13.012 10.7324 12.9673 10.5433 13.0245 10.3719L13.2651 9.65M14.35 10.7349L13.2651 9.65"
                                                                        stroke="rgb(245 158 11)" stroke-width="1.5">
                                                                    </path>
                                                                    <path
                                                                        d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 10.8717 2 9.87835 2.02008 9M12 2C7.28595 2 4.92893 2 3.46447 3.46447C3.03965 3.88929 2.73806 4.38921 2.52396 5"
                                                                        stroke="rgb(245 158 11)" stroke-width="1.5"
                                                                        stroke-linecap="round"></path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </button>
                                                @endif
                                                <a href='{{ route('donation.show', $project->project->id) }}'
                                                    class="block text-blue-600 hover:text-blue-400">
                                                    <div class="w-4 h-4">
                                                        <svg viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path d="M13 11L22 2M22 2H16.6562M22 2V7.34375"
                                                                    stroke="rgb(22 163 74)" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                                <path
                                                                    d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2.49073 19.5618 2.16444 18.1934 2.0551 16"
                                                                    stroke="rgb(22 163 74)" stroke-width="1.5"
                                                                    stroke-linecap="round"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
                                            @if ($project->is_verified == false)
                                                <div x-show="edit == true"
                                                    class="fixed inset-0 bg-gray-800/60 bg-opacity-50 backdrop-filter backdrop-blur-xl flex justify-center items-center px-10 w-full">
                                                    <div class="bg-white p-5 relative rounded-md w-96 max-h-screen overflow-y-auto overflow-x-hidden "
                                                        x-data="{ form: true }">
                                                        <button x-on:click="edit = false"
                                                            class="absolute rounded-full top-2 right-2 text-sm text-gray-600">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="h-6 w-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                        <form action="{{ route('donation.update', $project->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div x-show="form">
                                                                <div class="my-2">
                                                                    <x-input-label class="w-full" for="namaAkun">Nama
                                                                        Akun
                                                                        bank</x-input-label>
                                                                    <x-text-input placeholder="Nama akun Bank"
                                                                        class="w-full" name="namaAkun"
                                                                        :value="$project->bank_account_name" id="namaAkun" required
                                                                        autofocus />
                                                                    <x-input-error class="mt-2" :messages="$errors->get('namaAkun')" />
                                                                </div>
                                                                <div class="my-2">
                                                                    <x-input-label class="w-full"
                                                                        for="nominal_transfer">Nominal</x-input-label>
                                                                    <x-text-input placeholder="Nominal ditransfer"
                                                                        class="w-full uang" name="nominal"
                                                                        :value="number_format(
                                                                            $project->amount,
                                                                            0,
                                                                            ',',
                                                                            '.',
                                                                        )" min="500"
                                                                        max="9999999999999.99" id="nominal_transfer"
                                                                        reuired />
                                                                    <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
                                                                </div>
                                                                <label
                                                                    class="relative mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center justify-center rounded-xl border-2 border-dashed border-orange-400 bg-white p-6 text-center"
                                                                    htmlFor="dropzone-file">
                                                                    <div class="hidden justify-center flex-col items-center "
                                                                        id="preview-label">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-10 w-10 text-orange-800"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke="currentColor" strokeWidth="2">
                                                                            <path strokeLinecap="round"
                                                                                strokeLinejoin="round"
                                                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                                        </svg>

                                                                        <h2
                                                                            class="mt-4 text-xl font-medium text-gray-700 tracking-wide">
                                                                            Bukti Transfer</h2>

                                                                        <p class="mt-2 text-gray-500 tracking-wide">
                                                                            Unggah
                                                                            file Anda
                                                                            <b>berkas PNG, JPG, JPEG</b>
                                                                        </p>

                                                                        <input id="dropzone-file" type="file"
                                                                            class="hidden" name="image"
                                                                            onchange="previews(this)"
                                                                            accept="image/png, image/jpeg, image/jpg" />

                                                                    </div>
                                                                    <img id="preview"
                                                                        src="{{ asset('storage/' . $project->image) }}"
                                                                        class="w-full rounded-md">
                                                                </label>
                                                                <x-input-error class="mt-2" :messages="$errors->get('image')" />

                                                                <div class="w-full flex justify-between gap-2 mt-2">
                                                                    <x-primary-button type="submit"
                                                                        class="w-full">Kirim</x-primary-button>
                                                                    <x-secondary-button type="button"
                                                                        x-on:click="form = false">
                                                                        <svg viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            class="w-5 h-5">
                                                                            <g id="SVGRepo_bgCarrier"
                                                                                stroke-width="0">
                                                                            </g>
                                                                            <g id="SVGRepo_tracerCarrier"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></g>
                                                                            <g id="SVGRepo_iconCarrier">
                                                                                <path
                                                                                    d="M8 10.5H16M8 14.5H11M21.0039 12C21.0039 16.9706 16.9745 21 12.0039 21C9.9675 21 3.00463 21 3.00463 21C3.00463 21 4.56382 17.2561 3.93982 16.0008C3.34076 14.7956 3.00391 13.4372 3.00391 12C3.00391 7.02944 7.03334 3 12.0039 3C16.9745 3 21.0039 7.02944 21.0039 12Z"
                                                                                    stroke="#1C274C" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                            </g>
                                                                        </svg></x-secondary-button>
                                                                </div>
                                                            </div>
                                                            <div x-show="!form">
                                                                <x-secondary-button class="button"
                                                                    x-on:click="form = true">
                                                                    kembali
                                                                </x-secondary-button>
                                                                <div>
                                                                    <x-input-label class="w-full"
                                                                        for="pesan">Pesan</x-input-label>
                                                                    <textarea name="pesan" id="pesan"
                                                                        class="w-full p-2 border-orange-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm "
                                                                        placeholder="ketik pesan untuk donasi ini">{{ $project->message }}</textarea>
                                                                    <x-input-error class="mt-2" :messages="$errors->get('pesan')" />
                                                                    <div>
                                                                        <x-primary-button type="button"
                                                                            x-on:click="form = true" class="w-full">
                                                                            Lanjut
                                                                        </x-primary-button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="6" class="text-center text-sm text-gray-500">Tidak ada
                                            kegiatan
                                        </th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="my-2 p-6">
                            {{ $projects->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>

            @if (auth()->user()->role == 'project_owner')
                <div class="mb-4 w-full">
                    <div
                        class=" flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md overflow-hidden xl:col-span-2">
                        <div
                            class=" bg-clip-border rounded-xl overflow-hidden bg-transparent text-gray-700 shadow-none m-0 flex items-center justify-between p-6">
                            <div>
                                <h6
                                    class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-blue-gray-900 mb-1">
                                    Projects</h6>
                            </div>
                        </div>
                        <div class="p-6 overflow-x-auto px-0 pt-0 pb-2">
                            <table class="w-full min-w-[640px] table-auto">
                                <thead>
                                    <tr>
                                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                            <p
                                                class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                                Judul</p>
                                        </th>
                                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                            <p
                                                class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                                Dana Didonasikan</p>
                                        </th>
                                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                            <p
                                                class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                                Target Dana</p>
                                        </th>
                                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                            <p
                                                class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                                Target Waktu</p>
                                        </th>
                                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                            <p
                                                class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                                kemajuan</p>
                                        </th>
                                        <th>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($my_projects as $project)
                                        <tr>
                                            <td class="py-3 px-5 border-b border-blue-gray-50">
                                                <div class="flex items-center gap-4">
                                                    <p
                                                        class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">
                                                        {{ $project->title }}</p>
                                                </div>
                                            </td>

                                            <td class="py-3 px-5 border-b border-blue-gray-50">
                                                <p
                                                    class="block antialiased font-sans text-xs font-medium text-blue-gray-600">
                                                    Rp.
                                                    {{ number_format($project->donations->sum('amount'), 0, ',', '.') }}
                                                </p>
                                            </td>
                                            <td class="py-3 px-5 border-b border-blue-gray-50">
                                                <p
                                                    class="block antialiased font-sans text-xs font-medium text-blue-gray-600">
                                                    Rp.
                                                    {{ number_format($project->target_amount, 0, ',', '.') }}
                                                </p>
                                            </td>
                                            <td class="py-3 px-5 border-b border-blue-gray-50">
                                                <p
                                                    class="block antialiased font-sans text-xs font-medium text-blue-gray-600">
                                                    @php
                                                        $current_date = \Carbon\Carbon::now()->startOfDay();
                                                        $target_date = \Carbon\Carbon::parse(
                                                            $project->target_date,
                                                        )->startOfDay();
                                                        $days = $current_date->diffInDays($target_date);
                                                        $days = $days > 0 ? $days : 0;
                                                    @endphp
                                                    {{ $days }} hari lagi</p>
                                            </td>
                                            <td class="py-3 px-5 border-b border-blue-gray-50">
                                                <div class="w-10/12">
                                                    @php
                                                        $target_amount = $project->target_amount;
                                                        $collected_amount = $project->collected_amount;
                                                        $percent = round(($collected_amount / $target_amount) * 100);
                                                    @endphp
                                                    <p
                                                        class="antialiased font-sans mb-1 block text-xs font-medium text-blue-gray-600">
                                                        {{ $percent > '100' ? '100' : $percent }}%</p>
                                                    <div
                                                        class="flex flex-start bg-blue-gray-50 overflow-hidden w-full rounded-sm font-sans text-xs font-medium h-1">
                                                        <div class="flex justify-center items-center h-full bg-gradient-to-tr from-blue-600 to-blue-400 text-white"
                                                            style="width: {{ $percent > '100' ? '100' : $percent }}%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex gap-2">

                                                    <a href='{{ route('donation.show', $project->id) }}'
                                                        class="block text-blue-600 hover:text-blue-400">
                                                        <div class="w-4 h-4">
                                                            <svg viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path d="M13 11L22 2M22 2H16.6562M22 2V7.34375"
                                                                        stroke="rgb(22 163 74)" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </path>
                                                                    <path
                                                                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2.49073 19.5618 2.16444 18.1934 2.0551 16"
                                                                        stroke="rgb(22 163 74)" stroke-width="1.5"
                                                                        stroke-linecap="round"></path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="6" class="text-center text-sm text-gray-500">Tidak ada
                                                kegiatan
                                            </th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="my-2 p-6">
                            {{ $my_projects->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('script')
        <script>
            function previews(e) {
                const [file] = e.files;
                const extension_available = ['png', 'jpg', 'jpeg'];
                const extension_file = file['type'].split('/')[1];
                if (extension_available.includes(extension_file)) {
                    document.getElementById('preview-label').classList.add('hidden')
                    document.getElementById('preview').src = URL.createObjectURL(file);
                }

            }
        </script>

        <script src="{{ asset('storage/assets/js/jquery-3.7.1.js') }}"></script>
        <script src="{{ asset('storage/assets/js/jquery.mask.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.uang').mask('000.000.000', {
                    reverse: true
                });

            })
        </script>
    @endpush
</x-app-layout>
