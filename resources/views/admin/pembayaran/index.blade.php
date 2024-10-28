<x-app-layout title="Pembayaran">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Konfirmasi Donasi Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-x-auto">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="w-full">
                        <div class="flex gap-2 items-center">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" name="q" id="default-search"
                                    class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 "
                                    placeholder="Cari Kegiatan" value="{{ request()->q }}" />
                            </div>
                            <select
                                name="status"class="border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 ">
                                <option value="true" {{ request()->status == 'true' ? 'selected' : '' }}>
                                    Terdata</option>
                                <option value="false"
                                    {{ request()->status == 'false' || request()->status == '' ? 'selected' : '' }}>
                                    Tidak terdata</option>
                            </select>
                            <x-primary-button type="submit">cari</x-primary-button>
                        </div>
                    </form>

                    <hr class="border-b-2 border-taupeGray mt-4 mb-4 block" />
                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap table-auto">
                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4 w-[80px]">No</td>
                                <td class="border px-6 py-4 lg:w-[250px] hidden lg:table-cell">Bukti TF</td>
                                <td class="border px-6 py-4 lg:w-[250px]">Nama</td>
                                <td class="border px-6 py-4 lg:w-[250px] hidden lg:table-cell">Tanggal</td>
                                <td class="border px-6 py-4 lg:w-[150px] hidden lg:table-cell">Jumlah</td>
                                <td class="border px-6 py-4  w-[100px]">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($donations as $i => $donation)
                                <tr x-data="{ approve: {} }">
                                    <td class="border px-6 py-4 text-center">
                                        {{ $donations->firstItem() + $loop->index }}
                                    </td>
                                    <td class="border px-6 py-4 hidden lg:table-cell">
                                        <div class="w-32 mx-auto">
                                            <img src="{{ asset('storage/' . $donation->image) }}"
                                                class="w-full h-full bg-center bg-cover md:w-32 max-w-full max-h-full"
                                                alt="bukti transfer {{ $donation->user->name }}" />
                                        </div>
                                    </td>
                                    <td class="border px-6 py-4">
                                        {{ $donation->user->name }}
                                        <div class="block lg:hidden text-sm text-gray-500">
                                            Rp. {{ number_format($donation->amount, 0, ',', '.') }}
                                            |
                                            {{ \Carbon\Carbon::parse($donation->created_at)->isoFormat('dddd, D MMMM YYYY') }}
                                        </div>
                                    </td>
                                    <td class="border px-6 py-4 text-center text-gray-500 text-sm hidden lg:table-cell">
                                        {{ \Carbon\Carbon::parse($donation->created_at)->isoFormat('dddd, D MMMM YYYY') }}
                                    </td>
                                    <td class="border px-6 py-4 text-center text-sm hidden lg:table-cell">
                                        Rp. {{ number_format($donation->amount, 0, ',', '.') }}
                                    </td>
                                    <td class="border px-6 py-4">
                                        <div class="flex justify-center gap-2">
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
                                                                stroke="rgb(22 163 74)" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path
                                                                d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8"
                                                                stroke="rgb(22 163 74)" stroke-width="1.5"
                                                                stroke-linecap="round"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </button>
                                            @if (request()->status == 'false' || request()->status == '')
                                                <form action="{{ route('pembayaran.destroy', $donation->id) }}"
                                                    method="post" class="flex justify-center align-center">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="block"
                                                        onclick="confirmDelete(event)">
                                                        <div class="w-5 h-5">
                                                            <svg viewBox="0 0 24 24"
                                                                class="text-red-600 hover:text-red-400" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path d="M20.5001 6H3.5" stroke="rgb(220 38 38)"
                                                                        stroke-width="1.5" stroke-linecap="round">
                                                                    </path>
                                                                    <path d="M9.5 11L10 16" stroke="rgb(220 38 38)"
                                                                        stroke-width="1.5" stroke-linecap="round">
                                                                    </path>
                                                                    <path d="M14.5 11L14 16" stroke="rgb(220 38 38)"
                                                                        stroke-width="1.5" stroke-linecap="round">
                                                                    </path>
                                                                    <path
                                                                        d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                                        stroke="rgb(220 38 38)" stroke-width="1.5">
                                                                    </path>
                                                                    <path
                                                                        d="M18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5M18.8334 8.5L18.6334 11.5"
                                                                        stroke="rgb(220 38 38)" stroke-width="1.5"
                                                                        stroke-linecap="round"></path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <div x-show="approve[{{ $i }}]"
                                            class="fixed inset-0 bg-gray-800/60 bg-opacity-50 backdrop-filter backdrop-blur-xl flex justify-center items-center px-10 w-full">
                                            <div
                                                class="bg-white p-5 relative rounded-md w-96 max-h-screen overflow-y-auto overflow-x-hidden ">
                                                <button x-on:click="approve[{{ $i }}] = false"
                                                    class="absolute rounded-full top-2 right-2 text-sm text-gray-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                                <form action="{{ route('pembayaran.update', $donation->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="project_id"
                                                        value="{{ $donation->project_id }}">
                                                    <div class="my-2">
                                                        <x-input-label class="w-full"
                                                            for="konfirmasi_{{ $i }}">Konfirmasi</x-input-label>
                                                        <select name="konfirmasi"
                                                            class="border-orange-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm w-full"
                                                            id="konfirmasi_{{ $i }}"
                                                            onchange="ConfirmasiVerifed(this.value, '{{ $i }}')">
                                                            {{-- @if ($donation->is_verified)
                                                            <option value="0">Tolak</option>
                                                        @else
                                                            <option value="1">Terima</option>
                                                        @endif --}}
                                                            <option value="1"
                                                                {{ $donation->is_verified ? 'selected disabled' : '' }}>
                                                                Ya</option>
                                                            <option value="0"
                                                                {{ !$donation->is_verified ? 'selected disabled' : '' }}>
                                                                Tidak</option>
                                                        </select>
                                                        <x-input-error class="mt-2" :messages="$errors->get('konfirmasi')" />
                                                    </div>
                                                    <x-primary-button type="submit" class="hidden"
                                                        id="save_{{ $i }}">
                                                        Simpan
                                                    </x-primary-button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="6" class="border px-6 py-4">Tidak ada pembayaran</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {{ $donations->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            function ConfirmasiVerifed(value, id) {
                document.getElementById('save_' + id).classList.remove('hidden');
            }
        </script>

        <script>
            function confirmDelete(e) {
                e.preventDefault();
                const form = e.target.closest('form');
                Swal.fire({
                    title: "Kamu Yakin?",
                    text: "Data ini akan dihapus?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "rgb(249 115 22)",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
