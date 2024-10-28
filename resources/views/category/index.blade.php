<x-app-layout title="Category">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Categori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100">
                <div class="flex flex-col mx-3 mt-6 lg:flex-row">
                    <div class="w-full lg:w-1/3 m-1 bg-white shadow-lg rounded-md">
                        <div id="editCategory"></div>
                    </div>
                    <div class="w-full lg:w-2/3 m-1 bg-white shadow-lg text-lg rounded-md border border-gray-200">
                        <div class="overflow-x-auto rounded-lg p-3">
                            <table class="table-auto w-full">
                                <thead class="text-sm font-semibold uppercase text-gray-800 bg-gray-50">
                                    <tr>
                                        <th></th>
                                        <th class="p-2">
                                            <div class="font-semibold">Category</div>
                                        </th>
                                        <th class="p-2">
                                            <div class="font-semibold text-center">Aksi</div>
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td class="p-2">
                                                <div class="flex justify-center">
                                                    <button type="button"
                                                        onclick="editCustom('{{ $category->name }}', '{{ route('category.update', ['category' => $category->id]) }}')"
                                                        class="rounded-md hover:bg-green-100 text-green-600 p-2 flex justify-between items-center">
                                                        <div class="w-5 h-5">
                                                            <svg viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path
                                                                        d="M10 21.9948C6.58687 21.9658 4.70529 21.7764 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8"
                                                                        stroke="rgb(22 163 74)" stroke-width="1.5"
                                                                        stroke-linecap="round"></path>
                                                                    <path
                                                                        d="M2.5 7.25C2.08579 7.25 1.75 7.58579 1.75 8C1.75 8.41421 2.08579 8.75 2.5 8.75V7.25ZM22 7.25H2.5V8.75H22V7.25Z"
                                                                        fill="rgb(22 163 74)"></path>
                                                                    <path d="M10.5 2.5L7 8" stroke="rgb(22 163 74)"
                                                                        stroke-width="1.5" stroke-linecap="round">
                                                                    </path>
                                                                    <path d="M17 2.5L13.5 8" stroke="rgb(22 163 74)"
                                                                        stroke-width="1.5" stroke-linecap="round">
                                                                    </path>
                                                                    <path
                                                                        d="M18.562 13.9354L18.9791 13.5183C19.6702 12.8272 20.7906 12.8272 21.4817 13.5183C22.1728 14.2094 22.1728 15.3298 21.4817 16.0209L21.0646 16.438M18.562 13.9354C18.562 13.9354 18.6142 14.8217 19.3962 15.6038C20.1783 16.3858 21.0646 16.438 21.0646 16.438M18.562 13.9354L14.7275 17.77C14.4677 18.0297 14.3379 18.1595 14.2262 18.3027C14.0945 18.4716 13.9815 18.6544 13.8894 18.8478C13.8112 19.0117 13.7532 19.1859 13.637 19.5344L13.2651 20.65L13.1448 21.0109M21.0646 16.438L17.23 20.2725C16.9703 20.5323 16.8405 20.6621 16.6973 20.7738C16.5284 20.9055 16.3456 21.0185 16.1522 21.1106C15.9883 21.1888 15.8141 21.2468 15.4656 21.363L14.35 21.7349L13.9891 21.8552M13.9891 21.8552L13.6281 21.9755C13.4567 22.0327 13.2676 21.988 13.1398 21.8602C13.012 21.7324 12.9673 21.5433 13.0245 21.3719L13.1448 21.0109M13.9891 21.8552L13.1448 21.0109"
                                                                        stroke="rgb(22 163 74)" stroke-width="1.5">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </button>
                                                    <form action="{{ route('category.destroy', $category->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="hapusCategory(event)"
                                                            class="rounded-md hover:bg-red-100 text-red-600 p-2 flex justify-between items-center">
                                                            <div class="w-5 h-5">
                                                                <svg viewBox="0 0 24 24"
                                                                    class="text-red-600 hover:text-red-400"
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
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="3">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @push('script')
        <script>
            function template(value, url) {
                if (value && url) {
                    return `
                      <form action="${url}" method="POST" class="w-full p-6">
                            @csrf
                            @method('PUT')
                    <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-full px-3 mb-6">
                                    <x-input-label for="category" value="Nama Category" />
                                    <x-text-input id="category"
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        type="text" name="category" :value="old('category', '${value}')" required autofocus
                                        placeholder="Nama Category" />
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>

                                <div class="w-full md:w-full px-3 mb-6 flex gap-2">
                                    <x-primary-button type="submit">Update</x-primary-button>
                                    <x-secondary-button onclick="closeEditCategory()" type="button">Batal</x-secondary-button>
                                </div>

                            </div>
                        </form>`
                } else {
                    return `<form action="{{ route('category.store') }}" method="POST" class="w-full p-6">
                            @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-full px-3 mb-6">
                                    <x-input-label for="category" value="Nama Category" />
                                    <x-text-input id="category"
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        type="text" name="category" :value="old('category')" required autofocus
                                        placeholder="Nama Category" />
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>

                                <div class="w-full md:w-full px-3 mb-6 flex gap-2">
                                    <x-primary-button type="submit">Simpan</x-primary-button>
                                </div>

                            </div></form>`
                }
            }


            document.getElementById('editCategory').innerHTML = template()

            function editCustom(value, url) {
                document.getElementById('editCategory').innerHTML = template(value, url)
            }

            function closeEditCategory() {
                document.getElementById('editCategory').innerHTML = template()
            }
        </script>

        <script>
            function hapusCategory(e) {
                e.preventDefault()
                const form = e.target.closest('form')
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
                        form.submit()
                    }
                })
            }
        </script>
    @endpush
</x-app-layout>
