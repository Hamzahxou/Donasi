<x-app-layout title="Pembayaran">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Konfirmasi user upgrade') }}
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
                                    placeholder="Cari user" value="{{ request()->q }}" />
                            </div>
                            <select
                                name="status"class="border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 ">
                                <option value="all" {{ request()->status == '' ? 'selected' : '' }}>Semua</option>
                                <option value="true" {{ request()->status == 'true' ? 'selected' : '' }}>
                                    Upgrade</option>
                                <option value="false" {{ request()->status == 'false' ? 'selected' : '' }}>
                                    Tidak Upgrade</option>
                            </select>
                            <x-primary-button type="submit">cari</x-primary-button>
                        </div>
                    </form>

                    <hr class="border-b-2 border-taupeGray mt-4 mb-4 block" />
                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap table-auto">
                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4 w-[80px]">No</td>
                                <td class="border px-6 py-4 lg:w-[250px] hidden lg:table-cell">Dokumen</td>
                                <td class="border px-6 py-4 lg:w-[250px]">Nama</td>
                                <td class="border px-6 py-4 lg:w-[250px] hidden lg:table-cell">Tanggal</td>
                                <td class="border px-6 py-4 lg:w-[150px] hidden lg:table-cell">Status</td>
                                <td class="border px-6 py-4  w-[100px]">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($upgrade_accounts as $i => $upgrade)
                                <tr x-data="{ approve: {} }">
                                    <td class="border px-6 py-4 text-center">
                                        {{ $upgrade_accounts->firstItem() + $loop->index }}
                                    </td>
                                    <td class="border px-6 py-4 hidden lg:table-cell">
                                        <div class="w-32 mx-auto">
                                            @if (explode('.', $upgrade->supporting_documents)[1] == 'pdf')
                                                <a href="{{ asset('storage/' . $upgrade->supporting_documents) }}"
                                                    class="w-full h-full bg-center bg-cover md:w-32 max-w-full max-h-full">Dokument</a>
                                            @else
                                                <img src="{{ asset('storage/' . $upgrade->supporting_documents) }}"
                                                    class="w-full h-full bg-center bg-cover md:w-32 max-w-full max-h-full"
                                                    alt="bukti dokument" />
                                            @endif
                                        </div>
                                    </td>
                                    <td class="border px-6 py-4">
                                        {{ $upgrade->user->name }}
                                    </td>
                                    <td class="border px-6 py-4 text-center text-gray-500 text-sm hidden lg:table-cell">
                                        {{ $upgrade->created_at->isoFormat('dddd, D MMMM YYYY') }}
                                    </td>
                                    <td class="border px-6 py-4 text-center text-gray-500 text-sm hidden lg:table-cell">
                                        @if ($upgrade->is_approved)
                                            <span
                                                class="inline-block text-nowrap bg-green-500 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-400">Disetujui</span>
                                        @else
                                            <span
                                                class="inline-block text-nowrap bg-red-500 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-400">Tidak
                                                Disetujui</span>
                                        @endif
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
                                            <form action="{{ route('upgrade-akun.destroy', $upgrade->id) }}"
                                                method="post" class="flex justify-center align-center">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="block" onclick="confirmDelete(event)">
                                                    <div class="w-5 h-5">
                                                        <svg viewBox="0 0 24 24" class="text-red-600 hover:text-red-400"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                        </div>

                                        <div x-show="approve[{{ $i }}]"
                                            class="fixed inset-0 bg-gray-800/60 bg-opacity-50 backdrop-filter backdrop-blur-xl flex justify-center items-center px-10 w-full">
                                            <div x-data="{ image_{{ $i }}: false }"
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
                                                <form action="{{ route('upgrade-akun.update', $upgrade->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="w-full" x-show="image_{{ $i }}">
                                                        <x-secondary-button
                                                            x-on:click="image_{{ $i }} = false"
                                                            class="mb-2">kembali</x-secondary-button>
                                                    </div>
                                                    <x-primary-button type="button"
                                                        x-on:click="image_{{ $i }} = true"
                                                        x-show="!image_{{ $i }}">Dokument</x-primary-button>
                                                    <div class="my-2">
                                                        <table class="text-gray-500 text-md">
                                                            <tr class="border-b">
                                                                <td>Nama Akun Bank</td>
                                                                <th>:</th>
                                                                <td><b>{{ $upgrade->bank_account_name }}</b></td>
                                                            </tr>
                                                            <tr class="border-b">
                                                                <td>Nomor Akun Bank</td>
                                                                <th>:</th>
                                                                <td>{{ $upgrade->bank_account_number }}</td>
                                                            </tr>
                                                            <tr class="border-b">
                                                                <td>Bank Type</td>
                                                                <th>:</th>
                                                                <td>{{ $upgrade->bank_branch }}</td>
                                                            </tr>
                                                            <tr class="border-b">
                                                                <td>Nomor Telp</td>
                                                                <th>:</th>
                                                                <td>{{ $upgrade->phone }}</td>
                                                            </tr>
                                                            <tr class="border-b">
                                                                <td>Alasan Upgrade</td>
                                                                <th>:</th>
                                                                <td>{{ $upgrade->upgrade_reason }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="w-full" x-show="image_{{ $i }}">
                                                        @if (explode('.', $upgrade->supporting_documents)[1] == 'pdf')
                                                            <a href="{{ asset('storage/' . $upgrade->supporting_documents) }}"
                                                                class="w-full h-full bg-center bg-cover md:w-32 max-w-full max-h-full">Dokument</a>
                                                        @else
                                                            <img src="{{ asset('storage/' . $upgrade->supporting_documents) }}"
                                                                class="w-full h-full bg-center bg-cover md:w-32 max-w-full max-h-full"
                                                                alt="bukti dokument" />
                                                        @endif
                                                    </div>
                                                    <div x-show="!image_{{ $i }}" class="my-2">
                                                        <x-input-label class="w-full"
                                                            for="konfirmasi_{{ $i }}">Konfirmasi</x-input-label>
                                                        <select name="konfirmasi"
                                                            class="border-orange-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm w-full"
                                                            id="konfirmasi_{{ $i }}"
                                                            onchange="ConfirmasiVerifed(this.value, '{{ $i }}')">
                                                            <option value="1"
                                                                {{ $upgrade->is_approved ? 'selected disabled' : '' }}>
                                                                Ya</option>
                                                            <option value="0"
                                                                {{ !$upgrade->is_approved ? 'selected disabled' : '' }}>
                                                                Tidak</option>
                                                        </select>
                                                        <x-input-error class="mt-2" :messages="$errors->get('konfirmasi')" />
                                                        <x-primary-button type="submit" class="hidden my-2"
                                                            id="save_{{ $i }}">
                                                            Simpan
                                                        </x-primary-button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="6" class="border px-6 py-4">Tidak ada data</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {{ $upgrade_accounts->appends(request()->query())->links() }}
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
