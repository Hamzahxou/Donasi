<x-app-layout title="{{ __('Edit kegiatan') }}">

    @push('styles')
        <link rel="stylesheet" type="text/css" href="{{ asset('storage/assets/trix/trix.css') }}">
        <script type="text/javascript" src="{{ asset('storage/assets/trix/trix.umd.min.js') }}"></script>
        <style>
            .trix {
                width: 100%;
            }

            .trix h1 {
                font-size: 1.25rem !important;
                line-height: 1.25rem !important;
                margin-bottom: 1rem;
                font-weight: 600;
            }

            .trix a:not(.no-underline) {
                text-decoration: underline;
            }

            .trix a:visited {
                color: green;
            }

            .trix ul {
                list-style-type: disc;
                padding-left: 1rem;
            }

            .trix ol {
                list-style-type: decimal;
                padding-left: 1rem;
            }

            .trix pre {
                display: inline-block;
                width: 100%;
                vertical-align: top;
                font-family: monospace;
                font-size: 1.5em;
                padding: 0.5em;
                white-space: pre;
                background-color: #eee;
                overflow-x: auto;
            }

            .trix blockquote {
                border: 0 solid #ccc;
                border-left-width: 0px;
                border-left-width: 0.3em;
                margin-left: 0.3em;
                padding-left: 0.6em;
            }
        </style>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kegiatan / Project
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <section x-data="{ open: 1 }">
                    <div class="flex justify-between items-center">
                        <a x-show="open === 1" href="{{ route('kegiatan.index') }}"
                            class="mb-2 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">kembali</a>
                        <x-secondary-button x-show="open === 2" type="button"
                            x-on:click="open = 1">kembali</x-secondary-button>

                        <x-secondary-button type="button" x-on:click="open = 2" x-show="open === 1">Kegiatan
                            terbaru</x-secondary-button>
                    </div>
                    <form x-show="open === 1" method="post" action="{{ route('kegiatan.update', $project->id) }}"
                        class="space-y-6" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="block lg:flex gap-2 w-full">
                            <div class="lg:w-3/5">
                                <div>
                                    <x-input-label for="title" :value="__('Judul Kegiatan / Project')" />
                                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                        :value="old('title', $project->title)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                </div>
                                <div class="my-2">
                                    <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                    <textarea id="deskripsi" name="deskripsi" type="text"
                                        class="mt-1 block w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                                        required rows="5" />{{ old('deskripsi', $project->description) }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                                </div>
                                <div class="trix">
                                    <x-input-label for="x" :value="__('Konten')" />
                                    <input id="x" type="hidden" value="{{ old('content', $project->content) }}"
                                        name="content">
                                    <trix-editor input="x"
                                        class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm min-h-[350px]"></trix-editor>
                                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                                </div>



                            </div>
                            <div class="lg:w-2/5">

                                <div>
                                    <label
                                        class="relative mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center justify-center rounded-xl border-2 border-dashed border-orange-400 bg-white p-6 text-center"
                                        htmlFor="dropzone-file">
                                        <div class="hidden justify-center flex-col items-center label-init">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-orange-800"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                strokeWidth="2">
                                                <path strokeLinecap="round" strokeLinejoin="round"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>

                                            <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">
                                                Gambar Kegiatan / Peoject</h2>

                                            <p class="mt-2 text-gray-500 tracking-wide">Unggah
                                                file Anda
                                                <b>berkas PNG, JPG, JPEG</b>
                                            </p>

                                            <input id="dropzone-file" type="file" class="hidden" name="gambar"
                                                onchange="ImgPreview(this)" accept="image/png, image/jpeg, image/jpg" />

                                        </div>
                                        <img id="preview" src="{{ asset('storage/' . $project->image) }}"
                                            class="w-full rounded-md">
                                    </label>
                                    <x-input-error class="mt-2" :messages="$errors->get('gambar')" />
                                </div>
                                <div class="my-2">
                                    <x-input-label for="target_dana" :value="__('Target Dana')" />
                                    <div class="relative">
                                        <x-text-input id="target_dana" name="target_dana" type="text"
                                            class="mt-1 block w-full uang" :value="old(
                                                'target_dana',
                                                number_format($project->target_amount, 0, ',', '.'),
                                            )" required />
                                        <span class="absolute top-0 left-1 text-[10px] text-gray-700">Rp. </span>
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('target_dana')" />
                                </div>
                                <div class="my-2">
                                    <x-input-label for="tanggal_akhir" :value="__('Tanggal Akhir')" />
                                    <x-text-input id="tanggal_akhir" name="tanggal_akhir" type="date"
                                        class="mt-1 block w-full" :value="old('tanggal_akhir', $project->target_date)" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('tanggal_akhir')" />
                                </div>

                                <div class="my-2">
                                    <x-input-label for="kategori" :value="__('Kategori')" />
                                    <select name="kategori" id="kategori"
                                        class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $project->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('kategori')" />

                                </div>
                                <div>
                                    <x-primary-button type="submit">
                                        {{ __('Simpan') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>

                    </form>
                    <div x-show="open === 2">
                        <div x-data="{ tambah: false }" class="my-4">
                            <x-primary-button type="button" x-on:click="tambah = !tambah" class="mx-auto">
                                {{ __('Tambah pembaruan') }}
                            </x-primary-button>

                            <form x-show="tambah == true" method="post" action="" class="space-y-6"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="block lg:flex gap-2 w-full">
                                    <div class="lg:w-3/5">
                                        <div class="trix">
                                            <x-input-label for="x_tambah" :value="__('Konten')" />
                                            <input id="x_tambah" type="hidden" value="{{ old('content') }}"
                                                name="content">
                                            <trix-editor input="x_tambah"
                                                class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm min-h-[350px]"></trix-editor>
                                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                                        </div>
                                    </div>
                                    <div class="lg:w-2/5">
                                        <div>
                                            <label
                                                class="relative mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center justify-center rounded-xl border-2 border-dashed border-orange-400 bg-white p-6 text-center"
                                                htmlFor="dropzone-file">
                                                <div class="flex justify-center flex-col items-center label-init">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-10 w-10 text-orange-800" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                                                        <path strokeLinecap="round" strokeLinejoin="round"
                                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>

                                                    <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">
                                                        Gambar Kegiatan / Peoject</h2>

                                                    <p class="mt-2 text-gray-500 tracking-wide">Unggah
                                                        file Anda
                                                        <b>berkas PNG, JPG, JPEG</b>
                                                    </p>

                                                    <input id="dropzone-file" type="file" class="hidden"
                                                        name="gambar" onchange="ImgPreview(this)"
                                                        accept="image/png, image/jpeg, image/jpg" />

                                                </div>
                                                <img id="preview" class="w-full rounded-md">
                                            </label>
                                            <x-input-error class="mt-2" :messages="$errors->get('gambar')" />
                                        </div>
                                        <div class="my-2">
                                            <x-primary-button type="submit">
                                                {{ __('Tambah') }}
                                            </x-primary-button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                        @forelse ($project->projectUpdates as $i => $projectUpdates)
                            <div class="py-5 px-3 rounded-md  border-2 border-dotted border-orange-400 mb-3">
                                <details class="group">
                                    <summary
                                        class="flex justify-between items-center font-medium cursor-pointer list-none">
                                        <span>
                                            {{ \Carbon\Carbon::parse($projectUpdates->created_at)->isoFormat('dddd, D MMMM YYYY') }}
                                        </span>
                                        <span class="transition group-open:rotate-180">
                                            <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                <path d="M6 9l6 6 6-6"></path>
                                            </svg>
                                        </span>
                                    </summary>

                                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                    <form method="post" action="" class="space-y-6"
                                        enctype="multipart/form-data" novalidate>
                                        @csrf
                                        @method('PUT')
                                        <div class="block lg:flex gap-2 w-full">
                                            <div class="lg:w-3/5">
                                                <div class="trix">
                                                    <x-input-label for="x_{{ $i }}" :value="__('Konten')" />
                                                    <input id="x_{{ $i }}" type="hidden"
                                                        value="{{ old('content', $project->content) }}"
                                                        name="content">
                                                    <trix-editor input="x_{{ $i }}"
                                                        class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm min-h-[350px]"></trix-editor>
                                                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                                                </div>



                                            </div>
                                            <div class="lg:w-2/5">
                                                <div>
                                                    <label
                                                        class="relative mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center justify-center rounded-xl border-2 border-dashed border-orange-400 bg-white p-6 text-center"
                                                        htmlFor="dropzone-file">
                                                        <div
                                                            class="hidden justify-center flex-col items-center label-init">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-10 w-10 text-orange-800" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor"
                                                                strokeWidth="2">
                                                                <path strokeLinecap="round" strokeLinejoin="round"
                                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                            </svg>

                                                            <h2
                                                                class="mt-4 text-xl font-medium text-gray-700 tracking-wide">
                                                                Gambar Kegiatan / Peoject</h2>

                                                            <p class="mt-2 text-gray-500 tracking-wide">Unggah
                                                                file Anda
                                                                <b>berkas PNG, JPG, JPEG</b>
                                                            </p>

                                                            <input id="dropzone-file" type="file" class="hidden"
                                                                name="gambar" onchange="ImgPreview(this)"
                                                                accept="image/png, image/jpeg, image/jpg" />

                                                        </div>
                                                        <img id="preview"
                                                            src="{{ asset('storage/' . $project->image) }}"
                                                            class="w-full rounded-md">
                                                    </label>
                                                    <x-input-error class="mt-2" :messages="$errors->get('gambar')" />
                                                </div>
                                                <div class="my-2 flex gap-3 flex-wrap">
                                                    <x-primary-button type="submit">
                                                        {{ __('Ubah') }}
                                                    </x-primary-button>
                                                    <x-danger-button>Hapus</x-danger-button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                    </p>
                                </details>
                            </div>
                        @empty
                            <p class="text-center text-gray-500">Tidak ada pembaruan</p>
                        @endforelse
                    </div>
                </section>

            </div>
        </div>
    </div>




    @push('script')
        <script src="{{ asset('storage/assets/js/jquery-3.7.1.js') }}"></script>
        <script src="{{ asset('storage/assets/js/jquery.mask.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.uang').mask('000.000.000', {
                    reverse: true
                });

            })
        </script>
        <script>
            function ImgPreview(e) {
                const [file] = e.files;
                const extension_available = ['png', 'jpg', 'jpeg'];
                const extension_file = file['type'].split('/')[1];
                if (extension_available.includes(extension_file)) {
                    e.parentElement.classList.add('hidden')
                    e.parentElement.classList.remove('flex')
                    e.parentElement.parentElement.querySelector('img').src = URL.createObjectURL(file);
                }
            }
        </script>
    @endpush
</x-app-layout>
