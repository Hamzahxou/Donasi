<x-main title="show">

    @push('styles')
        <style>
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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            <h1 class="text-2xl font-bold text-center my-4 text-gray-900">{{ $project->title }}</h1>
            <div class="flex justify-between items-center">
                <p class="text-sm md:text-md text-gray-600">Terkumpul <b>
                        {{ number_format($project->collected_amount, 0, ',', '.') }}</b> sampai Rp.
                    {{ number_format($project->target_amount, 0, ',', '.') }}</p>
                <div class="flex gap-2 justify-end flex-wrap">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600 font-bold flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                                </path>
                            </svg>
                            {{ $project->donations_count }} Donasi
                        </p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600 font-bold flex items-center gap-1">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 2C8.55228 2 9 2.44772 9 3V6C9 6.55228 8.55228 7 8 7C7.44772 7 7 6.55228 7 6V3C7 2.44772 7.44772 2 8 2Z"
                                        fill="rgb(75 85 99 / var(--tw-text-opacity))"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16 2C16.5523 2 17 2.44772 17 3V6C17 6.55228 16.5523 7 16 7C15.4477 7 15 6.55228 15 6V3C15 2.44772 15.4477 2 16 2Z"
                                        fill="rgb(75 85 99 / var(--tw-text-opacity))"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 3C4.23858 3 2 5.23858 2 8V17C2 19.7614 4.23858 22 7 22H17C19.7614 22 22 19.7614 22 17V8C22 5.23858 19.7614 3 17 3H7ZM8 13C8 12.4477 8.44772 12 9 12H15C15.5523 12 16 12.4477 16 13C16 13.5523 15.5523 14 15 14H9C8.44772 14 8 13.5523 8 13Z"
                                        fill="rgb(75 85 99 / var(--tw-text-opacity))"></path>
                                </g>
                            </svg>
                            @php
                                $current_date = \Carbon\Carbon::now()->startOfDay();
                                $target_date = \Carbon\Carbon::parse($project->target_date)->startOfDay();
                                $days = $current_date->diffInDays($target_date);
                                $days = $days > 0 ? $days : 0;
                            @endphp
                            {{ $days }} hari lagi
                        </p>
                    </div>
                </div>
            </div>

            @php
                $target_amount = $project->target_amount;
                $collected_amount = $project->collected_amount;
                $percent = round(($collected_amount / $target_amount) * 100);

            @endphp
            <div class="w-full h-4 bg-slate-400 rounded-full my-2 overflow-hidden">
                <div class="h-full bg-orange-500 rounded-full"
                    style="width: {{ $percent > '100' ? '100' : $percent }}%">
                </div>
            </div>

        </div>
        <div class="my-6">
            <div class="block lg:flex gap-2">
                <div class="min-h-screen flex-1">
                    <div class="w-9/12 mx-auto">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="ui/ux review check"
                            class="w-full rounded-md" />
                    </div>

                    <div x-data="{ openTab: 1 }" class="my-8">
                        <div class="flex justify-center items-center gap-2 w-full mb-4">
                            <button x-on:click="openTab = 1" :class="{ 'bg-orange-300 text-white': openTab === 1 }"
                                class=" py-2 px-4 rounded-md bg-gray-100 focus:outline-none focus:shadow-outline-orange transition-all duration-300">Tentang
                            </button>
                            <button x-on:click="openTab = 2" :class="{ 'bg-orange-300 text-white': openTab === 2 }"
                                class=" py-2 px-4 rounded-md bg-gray-100 focus:outline-none focus:shadow-outline-orange transition-all duration-300">Berita
                                Terbaru
                            </button>
                            <button x-on:click="openTab = 3" :class="{ 'bg-orange-300 text-white': openTab === 3 }"
                                class=" py-2 px-4 rounded-md bg-gray-100 focus:outline-none focus:shadow-outline-orange transition-all duration-300">Komentar
                            </button>
                        </div>

                        <div x-show="openTab === 1" class="transition-all duration-300">
                            <div class="">
                                {{ $project->description }}

                                <br>
                                <hr>
                                <br>

                                <div class="trix">
                                    {!! $project->content !!}
                                </div>
                            </div>
                        </div>
                        <div x-show="openTab === 2" class="transition-all duration-300">
                            <div class="">
                                @forelse ($project->projectUpdates as $projectUpdates)
                                    <div class="mb-4 border-b-2 border-dashed p-2">
                                        <p class="text-gray-700 text-md">
                                            {{ \Carbon\Carbon::parse($projectUpdates->created_at)->isoFormat('dddd, D MMMM YYYY') }}
                                        </p>
                                        <div class="flex flex-wrap gap-3">
                                            <img src="{{ asset('storage/' . $projectUpdates->image) }}"
                                                class="w-full md:w-96 float-left rounded-md" alt="">
                                            {!! $projectUpdates->update_content !!}
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center text-md text-gray-500">Belum ada kegiatan terbaru</p>
                                @endforelse
                            </div>
                        </div>
                        <div x-show="openTab === 3" class="transition-all duration-300">
                            <div class="">

                                <section class=" py-8 lg:py-16 antialiased">
                                    <div class="max-w-2xl mx-auto px-4">
                                        <div class="flex justify-between items-center mb-6">
                                            <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Komentar
                                            </h2>
                                        </div>
                                        @auth
                                            <form class="mb-6" action="{{ route('comment.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                                <div
                                                    class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                                                    <label for="comment" class="sr-only">Komentar</label>
                                                    <textarea id="comment" rows="6"
                                                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none  " placeholder="Komentar..."
                                                        required name="comment"></textarea>
                                                </div>
                                                <div class="flex justify-end">
                                                    <x-secondary-button
                                                        type="submit">{{ __('Kirim') }}</x-secondary-button>
                                                </div>
                                            </form>
                                        @else
                                            <div
                                                class="mb-6 border border-dashed border-slate-600 bg-gray-100 w-full h-32 rounded-md flex justify-center items-center flex-col gap-2">
                                                <p class="text-slate-600">Login untuk memulai komentar</p>
                                                <a href="{{ route('login') }}"
                                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Login</a>
                                            </div>
                                        @endauth
                                        @forelse ($project->comments as $comment)
                                            <article class="p-6 text-base bg-white rounded-lg mb-4">
                                                <div class="flex justify-between items-center mb-1">
                                                    <div class="flex items-center">
                                                        <p
                                                            class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold">
                                                            @if ($comment->user->avatar)
                                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                                    src="{{ asset('storage/' . $comment->user->avatar) }}"
                                                                    alt=" {{ $comment->user->name }}">
                                                            @else
                                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                                    src="{{ asset('https://api.dicebear.com/9.x/bottts-neutral/svg?seed=' . $comment->user->name) }}"
                                                                    alt=" {{ $comment->user->name }}">
                                                            @endif
                                                            @if ($comment->user->name)
                                                                {{ explode(' ', $comment->user->name)[0] }}
                                                            @endif
                                                            @if ($comment->user->id == $project->user->id)
                                                                <span
                                                                    class="ms-2 bg-slate-800 text-slate-100 text-xs font-medium me-2 px-3 py-1 rounded">Pemilik</span>
                                                            @endif

                                                        </p>
                                                        <p class="text-sm text-gray-600 "><time pubdate
                                                                datetime="2022-02-08"
                                                                title="February 8th, 2022">{{ $comment->created_at->isoFormat('dddd, D MMM YYYY') }}</time>
                                                        </p>
                                                    </div>
                                                    @if (auth()->user() && $comment->user->id == auth()->user()->id)
                                                        <div x-data="{ dropdownOpen: false }" class="relative">
                                                            <button @click="dropdownOpen = !dropdownOpen"
                                                                class="relative z-10 block items-center p-2 text-sm font-medium text-center text-gray-900  bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 ">
                                                                <svg class="h-6 w-6 text-dark"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                                                </svg>
                                                            </button>

                                                            <div x-show="dropdownOpen" @click="dropdownOpen = false"
                                                                class="fixed inset-0 h-full w-full z-10"></div>

                                                            <div x-show="dropdownOpen"
                                                                class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-20">
                                                                <form
                                                                    action="{{ route('comment.update', $comment->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="content"
                                                                        value="{{ $comment->comment }}">
                                                                    <button type="submit" onclick="editComment()"
                                                                        class="block w-full text-start px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">Edit</button>
                                                                </form>
                                                                <form
                                                                    action="{{ route('comment.destroy', $comment->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        onclick="hapusCommenConfim()"
                                                                        class="block w-full text-start px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <p class="text-gray-500 ">{{ $comment->comment }}</p>
                                                @auth
                                                    <div class="flex items-center mt-4 space-x-4">
                                                        <button type="button"
                                                            onclick="reply(this.parentElement.parentElement, '{{ $comment->id }}', '{{ route('comment-reply.store') }}')"
                                                            class="flex items-center text-sm text-gray-500 hover:underline font-medium">
                                                            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 20 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                                            </svg>
                                                            Balas
                                                        </button>
                                                    </div>
                                                @endauth
                                            </article>
                                            @foreach ($comment->commentReplies as $reply)
                                                <article
                                                    class="p-6 text-base bg-white rounded-lg mb-4 mb-3 ml-6 lg:ml-12 relative"
                                                    data-idReply="{{ $reply->id }}">
                                                    <div class="flex justify-between items-center mb-1">
                                                        <div class="flex items-center">
                                                            <p
                                                                class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold">
                                                                @if ($reply->user->avatar)
                                                                    <img class="mr-2 w-6 h-6 rounded-full"
                                                                        src="{{ asset('storage/' . $reply->user->avatar) }}"
                                                                        alt="{{ $reply->user->name }}">
                                                                @else
                                                                    <img class="mr-2 w-6 h-6 rounded-full"
                                                                        src="{{ asset('https://api.dicebear.com/9.x/bottts-neutral/svg?seed=' . $reply->user->name) }}"
                                                                        alt="{{ $reply->user->name }}">
                                                                @endif
                                                                @if ($reply->user->name)
                                                                    {{ explode(' ', $reply->user->name)[0] }}
                                                                @endif
                                                                @if ($reply->user->id == $project->user->id)
                                                                    <span
                                                                        class="ms-2 bg-slate-800 text-slate-100 text-xs font-medium px-3 py-1 rounded">Pemilik</span>
                                                                @endif
                                                                @if ($reply->parent_reply_id)
                                                                    <div class="flex items-center cursor-pointer me-2"
                                                                        onclick="showReply({{ $reply->parent_reply_id }})">
                                                                        <div class="w-5 h-5">
                                                                            <svg viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <g id="SVGRepo_bgCarrier"
                                                                                    stroke-width="0"></g>
                                                                                <g id="SVGRepo_tracerCarrier"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                </g>
                                                                                <g id="SVGRepo_iconCarrier">
                                                                                    <path
                                                                                        d="M19.5 12L14.5 7M19.5 12L14.5 17M19.5 12L9.5 12C7.83333 12 4.5 13 4.5 17"
                                                                                        stroke="#1C274C"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"></path>
                                                                                </g>
                                                                            </svg>
                                                                        </div>
                                                                        @if ($reply->parentReply->user->name)
                                                                            {{ explode(' ', $reply->parentReply->user->name)[0] }}
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </p>
                                                            <p class="text-sm text-gray-600 "><time pubdate
                                                                    datetime="2022-02-08"
                                                                    title="February 8th, 2022">{{ $reply->created_at->isoFormat('dddd, D MMM YYYY') }}</time>
                                                            </p>
                                                        </div>
                                                        @if (auth()->user() && $reply->user->id == auth()->user()->id)
                                                            <div x-data="{ dropdownOpen: false }" class="relative">
                                                                <button @click="dropdownOpen = !dropdownOpen"
                                                                    class="relative z-10 block items-center p-2 text-sm font-medium text-center text-gray-900  bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 ">
                                                                    <svg class="h-6 w-6 text-dark"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                                                    </svg>
                                                                </button>

                                                                <div x-show="dropdownOpen"
                                                                    @click="dropdownOpen = false"
                                                                    class="fixed inset-0 h-full w-full z-10"></div>

                                                                <div x-show="dropdownOpen"
                                                                    class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-20">
                                                                    <form
                                                                        action="{{ route('comment-reply.update', $reply->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="content"
                                                                            value="{{ $reply->comment }}">
                                                                        <button type="submit" onclick="editComment()"
                                                                            class="block w-full text-start px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">Edit</button>
                                                                    </form>
                                                                    <form
                                                                        action="{{ route('comment-reply.destroy', $reply->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            onclick="hapusCommenConfim()"
                                                                            class="block w-full text-start px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <p class="text-gray-500 ">{{ $reply->comment }}</p>
                                                    @auth
                                                        <div class="flex items-center mt-4 space-x-4">
                                                            <button type="button"
                                                                onclick="reply(this.parentElement.parentElement, '{{ $comment->id }}', '{{ route('comment-reply.store') }}', {{ $reply->id }})"
                                                                class="flex items-center text-sm text-gray-500 hover:underline font-medium">
                                                                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 20 18">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                                                </svg>
                                                                Balas
                                                            </button>
                                                        </div>
                                                    @endauth
                                                </article>
                                            @endforeach
                                        @empty
                                            <p class="text-center text-md text-gray-500">Belum ada komentar</p>
                                        @endforelse
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>

                </div>
                <div x-data="{ share: false }" class="bg-gray-200 rounded-md h-screen flex-initial lg:w-80  ">
                    <div class="w-full h-full  flex flex-col items-center p-2 gap-2 overflow-y-auto">
                        <div x-data="{ donasi: false }" class="w-full">
                            @auth

                                @if ($project->is_active)
                                    <x-primary-button x-on:click="donasi = true" class="w-full py-4">Donasi
                                        Sekarang</x-primary-button>
                                    <div x-show="donasi"
                                        class="fixed inset-0 bg-gray-800/60 bg-opacity-50 backdrop-filter backdrop-blur-xl flex justify-center items-center px-10 w-full">
                                        <div
                                            class="bg-white p-5 relative rounded-md w-96 max-h-screen overflow-y-auto overflow-x-hidden ">
                                            <button x-on:click="donasi = false"
                                                class="absolute rounded-full top-2 right-2 text-sm text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                            <!-- component -->
                                            <!-- This is an example component -->
                                            <div x-data="{ payment: null }" class='pb-8 mx-auto space-y-4'>
                                                <div x-show="payment === null" class="space-y-4">
                                                    <p class="text-sm font-medium text-center text-neutral-500">
                                                        Pilih Metode Donasi
                                                    </p>
                                                    {{-- <div class="relative" x-on:click="payment = 'bank'">
                                         <input type="radio" name="options" id="option1-checkbox" value="1"
                                             class="hidden peer">
                                         <label for="option1-checkbox"
                                             class="inline-flex items-center justify-between w-full p-5 bg-white border-2 rounded-lg cursor-pointer group border-neutral-200/70 text-neutral-600 peer-checked:border-blue-400 peer-checked:text-neutral-900 peer-checked:bg-blue-200/50 hover:text-neutral-900 hover:border-neutral-300">
                                             <div class="flex items-center space-x-5">
                                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                     class="w-10 h-10">
                                                     <path
                                                         d="M535 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l64 64c4.5 4.5 7 10.6 7 17s-2.5 12.5-7 17l-64 64c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l23-23L384 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l174.1 0L535 41zM105 377l-23 23L256 400c13.3 0 24 10.7 24 24s-10.7 24-24 24L81.9 448l23 23c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 441c-4.5-4.5-7-10.6-7-17s2.5-12.5 7-17l64-64c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM96 64l241.9 0c-3.7 7.2-5.9 15.3-5.9 24c0 28.7 23.3 52 52 52l117.4 0c-4 17 .6 35.5 13.8 48.8c20.3 20.3 53.2 20.3 73.5 0L608 169.5 608 384c0 35.3-28.7 64-64 64l-241.9 0c3.7-7.2 5.9-15.3 5.9-24c0-28.7-23.3-52-52-52l-117.4 0c4-17-.6-35.5-13.8-48.8c-20.3-20.3-53.2-20.3-73.5 0L32 342.5 32 128c0-35.3 28.7-64 64-64zm64 64l-64 0 0 64c35.3 0 64-28.7 64-64zM544 320c-35.3 0-64 28.7-64 64l64 0 0-64zM320 352a96 96 0 1 0 0-192 96 96 0 1 0 0 192z"
                                                         fill="#1C274C" />
                                                 </svg>
                                                 <div class="flex flex-col justify-start">
                                                     <div class="w-full text-lg font-semibold">Midtrans</div>
                                                     <div class="w-full text-sm opacity-60">Layanan lebih mudah
                                                     </div>
                                                 </div>
                                             </div>
                                         </label>
                                     </div> --}}
                                                    <div class="relative" x-on:click="payment = 'transfer'">
                                                        <input type="radio" name="options" id="option2-checkbox"
                                                            value="2" class="hidden peer">
                                                        <label for="option2-checkbox"
                                                            class="inline-flex items-center justify-between w-full p-5 bg-white border-2 rounded-lg cursor-pointer group border-neutral-200/70 text-neutral-600 peer-checked:border-orange-400 peer-checked:text-neutral-900 peer-checked:bg-orange-200/50 hover:text-neutral-900 hover:border-neutral-300">
                                                            <div class="flex items-center space-x-5">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 512 512" class="w-10 h-10">
                                                                    <path
                                                                        d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L80 128c-8.8 0-16-7.2-16-16s7.2-16 16-16l368 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L64 32zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"
                                                                        fill="#1C274C" />
                                                                </svg>
                                                                <div class="flex flex-col justify-start">
                                                                    <div class="w-full text-lg font-semibold">Transfer
                                                                    </div>
                                                                    <div class="w-full text-sm opacity-60">Layanan kontrol
                                                                        manual
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                {{-- <div x-show="payment === 'bank'">
                                         <form action="" method="post" class="w-full">
                                             <x-text-input id="nominal" class="mt-1 block w-full uang p-4"
                                                 type="text" name="nominal" value="5000" required
                                                 autofocus />
                                             <div class="flex gap-2 flex-wrap my-3">
                                                 <x-secondary-button type="button"
                                                     onclick="document.getElementById('nominal').value = '5.000'">Rp.5.000</x-secondary-button>
                                                 <x-secondary-button type="button"
                                                     onclick="document.getElementById('nominal').value = '10.000'">Rp.10.000</x-secondary-button>
                                                 <x-secondary-button type="button"
                                                     onclick="document.getElementById('nominal').value = '20.000'">Rp.20.000</x-secondary-button>
                                                 <x-secondary-button type="button"
                                                     onclick="document.getElementById('nominal').value = '50.000'">Rp.50.000</x-secondary-button>
                                                 <x-secondary-button type="button"
                                                     onclick="document.getElementById('nominal').value = '100.000'">Rp.100.000</x-secondary-button>
                                                 <x-secondary-button type="button"
                                                     onclick="document.getElementById('nominal').value = '500.000'">Rp.500.000</x-secondary-button>
                                             </div>
                                             <x-primary-button type="submit" class="w-full">
                                                 Kirim
                                             </x-primary-button>
                                         </form>
                                     </div> --}}

                                                <div x-show="payment === 'transfer'" x-data="{ form: true }"
                                                    class="relative">
                                                    <div x-show="form">
                                                        <div x-show="payment !== null">
                                                            <x-secondary-button x-on:click="payment = null">
                                                                kembali
                                                            </x-secondary-button>
                                                        </div>

                                                        <x-input-label class="w-full" for="text">Bank Negara
                                                            Indonesia(BNI)</x-input-label>
                                                        <small class="text-[10px] text-gray-600">Ke <b>Muhammad Hamzah
                                                                Fansuri</b></small>
                                                        <div class="flex justify-center items-center w-full gap-2">
                                                            <x-text-input value="1945514054"
                                                                class="w-full bg-gray-100 p-1 text-sm" id="text"
                                                                readonly />
                                                            <x-secondary-button class="ml-2" type="button"
                                                                id="copy">
                                                                <svg viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg" class="w-3 h-3">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round"></g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <path
                                                                            d="M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z"
                                                                            stroke="#1C274C" stroke-width="1.5"></path>
                                                                        <path
                                                                            d="M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5"
                                                                            stroke="#1C274C" stroke-width="1.5"></path>
                                                                    </g>
                                                                </svg>
                                                            </x-secondary-button>
                                                        </div>
                                                    </div>
                                                    <div class="w-full my-2">
                                                        <form action="{{ route('donation.store') }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div x-show="form">
                                                                <input type="hidden" name="project_id"
                                                                    value="{{ $project->id }}">
                                                                <div class="my-2">
                                                                    <x-input-label class="w-full" for="namaAkun">Nama Akun
                                                                        bank</x-input-label>
                                                                    <x-text-input placeholder="Nama akun Bank"
                                                                        class="w-full" name="namaAkun" :value="old('namaAkun')"
                                                                        id="namaAkun" required autofocus />
                                                                    <x-input-error class="mt-2" :messages="$errors->get('namaAkun')" />
                                                                </div>
                                                                <div class="my-2">
                                                                    <x-input-label class="w-full"
                                                                        for="nominal_transfer">Nominal</x-input-label>
                                                                    <x-text-input placeholder="Nominal ditransfer"
                                                                        class="w-full uang" name="nominal"
                                                                        :value="old('nominal')" min="500"
                                                                        max="9999999999999.99" id="nominal_transfer"
                                                                        reuired />
                                                                    <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
                                                                </div>
                                                                <label
                                                                    class="relative mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center justify-center rounded-xl border-2 border-dashed border-orange-400 bg-white p-6 text-center"
                                                                    htmlFor="dropzone-file">
                                                                    <div class="flex justify-center flex-col items-center "
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

                                                                        <p class="mt-2 text-gray-500 tracking-wide">Unggah
                                                                            file Anda
                                                                            <b>berkas PNG, JPG, JPEG</b>
                                                                        </p>

                                                                        <input id="dropzone-file" type="file"
                                                                            class="hidden" name="image"
                                                                            onchange="previews(this)"
                                                                            accept="image/png, image/jpeg, image/jpg"
                                                                            required />

                                                                    </div>
                                                                    <img id="preview" class="w-full rounded-md">
                                                                </label>
                                                                <x-input-error class="mt-2" :messages="$errors->get('image')" />

                                                                <div class="w-full flex justify-between gap-2 mt-2">
                                                                    <x-primary-button class="w-full"
                                                                        type="submit">Kirim</x-primary-button>
                                                                    <x-secondary-button type="button"
                                                                        x-on:click="form = false">
                                                                        <svg viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            class="w-5 h-5">
                                                                            <g id="SVGRepo_bgCarrier" stroke-width="0">
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
                                                                        placeholder="ketik pesan untuk donasi ini"></textarea>
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

                                                {{-- <div class="relative" x-show="payment === 'success'">
                                                    <div class="flex justify-center">
                                                        <div class="rounded-full bg-green-200 p-6">
                                                            <div
                                                                class="flex h-16 w-16 items-center justify-center rounded-full bg-green-500 p-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="h-8 w-8 text-white">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M4.5 12.75l6 6 9-13.5" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3 class="my-4 text-center text-3xl font-semibold text-gray-700">
                                                        Terimakasih!!!</h3>
                                                    <p class=" text-center font-normal text-gray-600">
                                                        Donasimu sedang kami proses</p>
                                                    <button x-on:click="payment = null"
                                                        class="mx-auto mt-10 block rounded-xl border-4 border-transparent bg-orange-400 px-6 py-3 text-center text-base font-medium text-orange-100 outline-8 hover:outline hover:duration-300">Tutup</button>
                                                </div> --}}
                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <x-primary-button class="w-full py-4 bg-red-500" disabled>Donasi
                                        Ditutup</x-primary-button>
                                @endif
                            @else
                                <a href="{{ route('login') }}"
                                    class="inline-flex w-full py-4 justify-center items-center bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 focus:bg-orange-700 active:bg-orange-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                    disabled>Login Untuk Donasi</a>
                            @endauth

                        </div>
                        <p class="text-sm text-slate-700">Bagikan kepada yang lainnya</p>
                        <x-secondary-button class="w-full py-4 gap-1" @click="share = ! share">
                            <div class="w-3 h-3"><svg viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16.5 2.25C14.7051 2.25 13.25 3.70507 13.25 5.5C13.25 5.69591 13.2673 5.88776 13.3006 6.07412L8.56991 9.38558C8.54587 9.4024 8.52312 9.42038 8.50168 9.43939C7.94993 9.00747 7.25503 8.75 6.5 8.75C4.70507 8.75 3.25 10.2051 3.25 12C3.25 13.7949 4.70507 15.25 6.5 15.25C7.25503 15.25 7.94993 14.9925 8.50168 14.5606C8.52312 14.5796 8.54587 14.5976 8.56991 14.6144L13.3006 17.9259C13.2673 18.1122 13.25 18.3041 13.25 18.5C13.25 20.2949 14.7051 21.75 16.5 21.75C18.2949 21.75 19.75 20.2949 19.75 18.5C19.75 16.7051 18.2949 15.25 16.5 15.25C15.4472 15.25 14.5113 15.7506 13.9174 16.5267L9.43806 13.3911C9.63809 12.9694 9.75 12.4978 9.75 12C9.75 11.5022 9.63809 11.0306 9.43806 10.6089L13.9174 7.4733C14.5113 8.24942 15.4472 8.75 16.5 8.75C18.2949 8.75 19.75 7.29493 19.75 5.5C19.75 3.70507 18.2949 2.25 16.5 2.25ZM14.75 5.5C14.75 4.5335 15.5335 3.75 16.5 3.75C17.4665 3.75 18.25 4.5335 18.25 5.5C18.25 6.4665 17.4665 7.25 16.5 7.25C15.5335 7.25 14.75 6.4665 14.75 5.5ZM6.5 10.25C5.5335 10.25 4.75 11.0335 4.75 12C4.75 12.9665 5.5335 13.75 6.5 13.75C7.4665 13.75 8.25 12.9665 8.25 12C8.25 11.0335 7.4665 10.25 6.5 10.25ZM16.5 16.75C15.5335 16.75 14.75 17.5335 14.75 18.5C14.75 19.4665 15.5335 20.25 16.5 20.25C17.4665 20.25 18.25 19.4665 18.25 18.5C18.25 17.5335 17.4665 16.75 16.5 16.75Z"
                                            fill="#1C274C"></path>
                                    </g>
                                </svg></div> Bagikan
                        </x-secondary-button>
                        <div :class="{ 'flex': share, 'hidden': !share }"
                            class=" flex-wrap justify-center gap-2 w-full">
                            <a href="https://api.whatsapp.com/send?text={{ url()->current() }}"
                                class=" px-4 py-2 bg-green-500 rounded-md text-white text-sm flex gap-3">
                                <div class="w-3 h-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
                                            fill="#ffffff" />
                                    </svg></div>
                            </a>
                            <a href="https://web.facebook.com/sharer.php?u={{ url()->current() }}"
                                class=" px-4 py-2 bg-blue-500 rounded-md text-white text-sm flex gap-3">
                                <div class="w-3 h-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"
                                            fill="#ffffff" />
                                    </svg></div>
                            </a>
                            <a href="https://t.me/share/url?url= {{ url()->current() }}"
                                class=" px-4 py-2 bg-blue-400 rounded-md text-white text-sm flex gap-3">
                                <div class="w-3 h-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                        <path
                                            d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"
                                            fill="#ffffff" />
                                    </svg></div>
                            </a>
                        </div>
                        <div class="my-2 bg-white w-full rounded-md text-gray-500 overflow-hidden">
                            <div class="bg-gray-100 py-2 px-4 border-b-2 ">
                                <h2 class="text-md font-semibold text-gray-800 ">Penggalang Dana</h2>
                            </div>
                            <div class="p-3 flex gap-2">
                                @if ($project->user->avatar)
                                    <img src="{{ asset('storage/' . $project->user->avatar) }}"
                                        alt="{{ $project->user->name }}" class="w-7 h-7 rounded-full object-cover">
                                @else
                                    <img src="https://api.dicebear.com/9.x/bottts-neutral/svg?seed={{ $project->user->name }}"
                                        alt="{{ $project->user->name }}" class="w-7 h-7 rounded-full object-cover">
                                @endif
                                {{ $project->user->name }}
                            </div>
                        </div>
                        <div class="bg-white w-full rounded-md overflow-x-hidden overflow-y-auto">
                            <div class="bg-gray-100 py-2 px-4 ">
                                <h2 class="text-lg font-semibold text-gray-800 ">Para donatur</h2>
                            </div>
                            <ul class="divide-y divide-gray-200">
                                @forelse ($project->donations as $i=> $donation)
                                    @php
                                        $i++;
                                    @endphp
                                    <li class="py-4 px-6 border-b border-gray-200">
                                        <div class="flex items-center ">
                                            <span
                                                class="text-gray-700 text-lg font-medium mr-4">{{ $i }}.</span>

                                            @if ($donation->user->avatar)
                                                <img src="{{ asset('storage/' . $donation->user->avatar) }}"
                                                    alt="{{ $donation->user->name }}"
                                                    class="w-7 h-7 rounded-full object-cover mr-4">
                                            @else
                                                <img src="https://api.dicebear.com/9.x/bottts-neutral/svg?seed={{ $donation->user->name }}"
                                                    alt="{{ $donation->user->name }}"
                                                    class="w-7 h-7 rounded-full object-cover mr-4">
                                            @endif
                                            <div class="flex-1">
                                                <h3 class="text-md font-medium text-gray-800">
                                                    {{ Str::limit($donation->user->name, '16', '...') }}
                                                </h3>
                                                <p class="text-gray-600 text-base">Rp.
                                                    {{ number_format($donation->amount, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                        @if ($donation->message)
                                            <div x-data="{ open_{{ $i }}: false }">
                                                <div class="w-full flex justify-end">
                                                    <button class="w-5 h-5"
                                                        x-on:click="open_{{ $i }} = !open_{{ $i }}">
                                                        <svg viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M8 10.5H16M8 14.5H11M21.0039 12C21.0039 16.9706 16.9745 21 12.0039 21C9.9675 21 3.00463 21 3.00463 21C3.00463 21 4.56382 17.2561 3.93982 16.0008C3.34076 14.7956 3.00391 13.4372 3.00391 12C3.00391 7.02944 7.03334 3 12.0039 3C16.9745 3 21.0039 7.02944 21.0039 12Z"
                                                                    stroke="#000000" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="mt-2" x-show="open_{{ $i }}">
                                                    <p class="text-sm text-gray-600">{{ $donation->message }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    </li>

                                @empty
                                    <li class="text-gray-700 text-sm text-center p-5 font-medium mr-4">Tidak ada donasi
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
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

        <script>
            const input = document.getElementById("text");
            const copyButton = document.getElementById("copy");

            const copyText = (e) => {
                input.select();
                document.execCommand("copy");
            };


            copyButton.addEventListener("click", (e) => copyText(e));
        </script>

        <script>
            function hapusCommenConfim() {
                event.preventDefault();
                let form = event.target.form;
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Ini akan menghapus komentar ini",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#333',
                    cancelButtonColor: '#c3c3c3',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }


            async function editComment() {
                event.preventDefault();
                let form = event.target.form;
                let comment = form.querySelector("input[name='content']").value;
                const {
                    value: text
                } = await Swal.fire({
                    input: "textarea",
                    inputLabel: "Ubah Komentar",
                    inputValue: comment,
                    inputPlaceholder: "Type your message here...",
                    inputAttributes: {
                        "aria-label": "Type your message here"
                    },
                    showCancelButton: true,
                    cancelButtonText: "Batal",
                    confirmButtonText: "Simpan",
                    cancelButtonColor: "#c3c3c3",
                    confirmButtonColor: "#333",
                    inputValidator: (value) => {
                        if (!value) {
                            return "Tidak boleh kosong!";
                        }
                    }
                });
                if (text) {
                    form.querySelector("input[name='content']").value = text;
                    form.submit();
                }
            }

            function templateForm(route, id, reply) {
                return `
        <article id="reply">
            <form class="mb-6" action="${route}" method="post">
                @csrf
                <input type="hidden" name="comment_id" value="${id}"/>
                <input type="hidden" name="reply" value="${reply}"/>
                <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                  <label for="comment" class="sr-only">Komentar</label>
                  <textarea id="comment" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none  " placeholder="Balas Komentar..." required name="comment"></textarea>
                </div>
                <div class="flex justify-end gap-2">
                    <x-secondary-button onclick="(this.parentElement.parentElement.parentElement.remove())">Batal</x-secondary-button>
                    <x-primary-button type="submit">{{ __('Kirim') }}</x-primary-button>
                </div>
            </form>
        </article>
        `
            }

            function reply(el, id, route, reply = '') {
                if (document.getElementById("reply")) {
                    document.getElementById("reply").remove();
                }
                el.insertAdjacentHTML("afterend", templateForm(route, id, reply));
            }

            const templateReplyShow =
                `<div class="w-2 bg-slate-500 absolute top-0 bottom-0 -left-5 animate-pulse" id="replyShow"></div>`
            const data_idReply = document.querySelectorAll('[data-idReply]');

            function showReply(id) {
                const replyShow = document.getElementById("replyShow");
                if (replyShow) {
                    replyShow.remove();
                }
                data_idReply.forEach(el => {
                    if (el.getAttribute('data-idReply') == id) {
                        el.insertAdjacentHTML("afterbegin", templateReplyShow);
                    }
                });
            }
        </script>
    @endpush
</x-main>
