<x-app-layout title="Category">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Categori') }}
        </h2>
    </x-slot>

    <!-- component -->
    <div class="bg-gray-100">

        <div class="flex flex-col mx-3 mt-6 lg:flex-row">
            <div class="w-full lg:w-1/3 m-1">
                <form action="{{ route('category.store') }}" method="POST" class="w-full bg-white shadow-md p-6">
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
                            <x-secondary-button type="button">Batal</x-secondary-button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="w-full lg:w-2/3 m-1 bg-white shadow-lg text-lg rounded-sm border border-gray-200">
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
                                            <a href="#"
                                                class="rounded-md hover:bg-green-100 text-green-600 p-2 flex justify-between items-center">
                                                <span>
                                                    <FaEdit class="w-4 h-4 mr-1" />
                                                </span> Ubah
                                            </a>
                                            <form action="{{ route('category.destroy', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="rounded-md hover:bg-red-100 text-red-600 p-2 flex justify-between items-center">
                                                    <span>
                                                        <FaTrash class="w-4 h-4 mr-1" />
                                                    </span> Hapus
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
</x-app-layout>
