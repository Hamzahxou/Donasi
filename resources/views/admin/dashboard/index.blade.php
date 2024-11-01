<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-12 grid gap-y-10 gap-x-6 md:grid-cols-4 xl:grid-cols-4">
                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
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
                            Dana Tertunda</p>
                        <h4
                            class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                            @php
                                $total_dana = $donations->where('is_verified', false)->sum('amount');
                            @endphp
                            Rp. {{ number_format($total_dana, 0, ',', '.') }}</h4>
                    </div>
                    {{-- <div class="border-t border-blue-gray-50 p-4">
                        <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                            <strong class="text-red-500">-2%</strong>&nbsp;than yesterday
                        </p>
                    </div> --}}
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
                            Rp.<strong class="text-green-500">
                                @php
                                    $total_dana = $donations->where('is_verified', true)->sum('amount');
                                @endphp
                                {{ number_format($total_dana, 0, ',', '.') }}
                            </strong>
                        </h4>
                    </div>
                    {{-- <div class="border-t border-blue-gray-50 p-4">
                        <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                            <strong class="text-green-500">+5%</strong>&nbsp;than yesterday
                        </p>
                    </div> --}}
                </div>
                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-pink-600 to-pink-400 text-white shadow-pink-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-6 h-6 text-white">
                            <path fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                            Jumlah Donasi</p>
                        <h4
                            class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                            {{ $donations->count() }}</h4>
                    </div>
                    {{-- <div class="border-t border-blue-gray-50 p-4">
                        <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                            <strong class="text-green-500">+3%</strong>&nbsp;than last month
                        </p>
                    </div> --}}
                </div>
                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-gray-600 to-gray-400 text-white shadow-gray-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-6 h-6 text-white">
                            <path
                                d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                            </path>
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">
                            Jumlah Kegiatan</p>
                        <h4
                            class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
                            {{ $projects->count() }}</h4>
                    </div>
                    {{-- <div class="border-t border-blue-gray-50 p-4">
                        <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
                            <strong class="text-green-500">+3%</strong>&nbsp;than last month
                        </p>
                    </div> --}}
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
                                Kegiatan / Project</h6>
                        </div>
                    </div>

                    <div class="p-6 w-full">
                        <form class="w-full">
                            <div class="flex gap-2 items-center">
                                <div class="relative w-full">
                                    <select
                                        name="user"class="w-full border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 ">
                                        <option value="" {{ request()->user == '' ? 'selected' : '' }}>
                                            Semua user</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ request()->user == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }} {{ $user->role == 'admin' ? '(admin)' : '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <select
                                    name="status"class=" border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 ">
                                    <option value="" {{ request()->status == '' ? 'selected' : '' }}>
                                        Semua</option>
                                    <option value="true" {{ request()->status == 'true' ? 'selected' : '' }}>
                                        Aktif</option>
                                    <option value="false" {{ request()->status == 'false' ? 'selected' : '' }}>
                                        Tidak Aktif</option>
                                </select>
                                {{-- <select
                                    name="sampah"class="hidden border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 ">
                                    <option value="false"
                                        {{ request()->sampah == 'false' || request()->sampah == '' ? 'selected' : '' }}>
                                        Disimpan</option>
                                    <option value="true" {{ request()->sampah == 'true' ? 'selected' : '' }}>
                                        Dihapus</option>
                                </select> --}}
                                <x-primary-button type="submit">cari</x-primary-button>
                            </div>
                        </form>
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
                                            Dana Terkumpul</p>
                                    </th>
                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                        <p
                                            class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                            Jumlah Donasi</p>
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
                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $i => $project)
                                    <tr x-data="{ approve: {} }">
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
                                                Rp. {{ number_format($project->collected_amount, 0, ',', '.') }}</p>
                                        </td>
                                        <td class="py-3 text-center px-5 border-b border-blue-gray-50">
                                            <p
                                                class="block antialiased font-sans text-xs font-medium text-blue-gray-600">
                                                {{ $project->donations->count() }}</p>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <p
                                                class="block antialiased font-sans text-xs font-medium text-blue-gray-600">
                                                Rp. {{ number_format($project->target_amount, 0, ',', '.') }}</p>
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
                                        <td class="py-3 px-5 border-b border-blue-gray-50">

                                            <div class="flex gap-2 justify-end px-2 items-center">
                                                @if ($project->user->role != 'admin')
                                                    <button x-on:click="approve[{{ $i }}] = true"
                                                        class="block text-blue-600 hover:text-blue-400">
                                                        <div class="w-5 h-5">
                                                            <svg viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path d="M8.5 12.5L10.5 14.5L15.5 9.5"
                                                                        stroke="orange" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </path>
                                                                    <path
                                                                        d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8"
                                                                        stroke="orange" stroke-width="1.5"
                                                                        stroke-linecap="round"></path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </button>
                                                @endif
                                                <a href='{{ route('donation.show', $project->id) }}'
                                                    class="block text-blue-600 hover:text-blue-400">
                                                    <div class="w-5 h-5">
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
                                            @if ($project->user->role != 'admin')
                                                <div x-show="approve[{{ $i }}]"
                                                    class="fixed inset-0 bg-gray-800/60 bg-opacity-50 backdrop-filter backdrop-blur-xl flex justify-center items-center px-10 w-full">
                                                    <div x-data="{ image_{{ $i }}: false }"
                                                        class="bg-white p-5 relative rounded-md w-96 max-h-screen overflow-y-auto overflow-x-hidden ">
                                                        <button x-on:click="approve[{{ $i }}] = false"
                                                            class="absolute rounded-full top-2 right-2 text-sm text-gray-600">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="h-6 w-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                        <x-secondary-button type="button"
                                                            x-on:click="image_{{ $i }} = null"
                                                            x-show="image_{{ $i }} !== null">Informasi
                                                            Donasi</x-secondary-button>
                                                        <div class="my-2">
                                                            <table class="text-gray-500 text-md">
                                                                <tr>
                                                                    <td>Nama Akun Bank</td>
                                                                    <th>:</th>
                                                                    <td><b>{{ $project->user->UpgradeAccount->bank_account_name }}</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Type Bank</td>
                                                                    <th>:</th>
                                                                    <td><b>{{ $project->user->UpgradeAccount->bank_branch }}</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nomor Bank</td>
                                                                    <th>:</th>
                                                                    <td><b>{{ $project->user->UpgradeAccount->bank_account_number }}</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Telp</td>
                                                                    <th>:</th>
                                                                    <td><b>{{ $project->user->UpgradeAccount->phone }}</b>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="w-full border-dashed border-2 border-gray-400 p-2"
                                                            x-show="image_{{ $i }} === null">
                                                            <table class="text-gray-500 text-md">
                                                                <tr>
                                                                    <td>Nama Kegiatan</td>
                                                                    <th>:</th>
                                                                    <td><b>{{ $project->title }}</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Target Dana</td>
                                                                    <th>:</th>
                                                                    <td>Rp.
                                                                        <b>{{ number_format($project->target_amount, 0, ',', '.') }}</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Dana Terkumpul</td>
                                                                    <th>:</th>
                                                                    <td>Rp.
                                                                        <b>{{ number_format($project->collected_amount, 0, ',', '.') }}</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Batas Tanggal</td>
                                                                    <th>:</th>
                                                                    <td>{{ \Carbon\Carbon::parse($project->target_date)->isoFormat('dddd, D MMMM YYYY') }}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
