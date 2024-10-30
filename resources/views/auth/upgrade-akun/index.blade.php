<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upgrade Akun') }}
        </h2>
    </x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
            class='break-inside relative overflow-hidden flex flex-col justify-between space-y-2 text-sm rounded-xl w-full p-4 mb-4 bg-[#5E17F4] text-white'>
            <span class='uppercase text-xs text-[#D2BDFF]'>perbarui akun</span>
            <div class='flex flex-row items-center space-x-3'>
                <svg width='58' height='56' viewBox='0 0 52 50' fill='none' xmlns='http://www.w3.org/2000/svg'>
                    <path
                        d='M32.6458 38.4379C33.9918 37.1198 33.2655 34.0922 31.0668 30.5948C31.8658 30.4707 32.6129 30.281 33.178 29.9905C35.2112 28.9466 36.584 27.044 37.6232 25.0759C38.7403 22.9647 39.49 20.644 40.9477 18.7215C41.1939 18.3966 41.44 18.1052 41.6853 17.831C44.8304 18.206 47.3412 18.8784 47.3412 18.8784L48.3006 16.4534C47.0896 16.0212 45.848 15.6791 44.586 15.4302C45.3591 14.9931 45.8635 14.8569 45.8635 14.8569L44.9543 12.4121C43.4966 13.025 42.3136 13.9293 41.323 15.0121C37.6206 14.806 33.8921 15.5397 30.9506 17.8086C28.7389 19.5155 27.2447 21.8819 25.839 24.2491C24.5935 23.0333 23.2671 21.9023 21.8688 20.8638C22.134 20.4302 22.4182 20.0405 22.7242 19.7397C24.5728 17.9293 27.0116 16.7716 28.6115 14.7C31.9742 10.35 29.5146 3.53103 26.7481 0C26.2524 0.475 25.4325 1.16724 24.8155 1.71379C27.7561 4.70948 29.8127 9.95431 27.5082 13.8733C26.2203 16.0638 23.8404 17.4379 22.1764 19.3198C21.8887 19.6466 21.6313 20.0603 21.3982 20.5172C17.0466 17.4129 13.053 16.1638 11.4704 17.7138C11.3133 17.8737 11.1838 18.0584 11.0874 18.2603L11.0813 18.2543L11.0388 18.3776C10.9799 18.5112 10.9261 18.65 10.8897 18.8017L0 50L31.774 38.95L31.7653 38.9414C32.1068 38.8319 32.4075 38.6707 32.6458 38.4379ZM6.32065 45.9759L3.66863 44.7465L5.45831 39.6172L13.6666 43.4207L6.32065 45.9759ZM21.0116 40.8664L7.24972 34.4879L9.0394 29.3595L19.3233 34.494C13.1847 30.5198 10.8291 24.2293 10.8291 24.2293L11.441 22.4767C12.5286 25.2138 14.9215 28.6224 18.2097 31.8397C21.5256 35.0862 25.0399 37.4379 27.8488 38.4888L21.0116 40.8664ZM26.2975 24.7112C27.7344 22.6621 29.2156 20.594 31.2748 19.1224C33.2352 17.7207 36.4176 17.4647 39.4345 17.6328C38.4153 19.4034 37.6622 21.3681 36.9861 23.2552C36.1689 25.5397 35.0734 27.9086 32.9847 29.3095C32.4214 29.6871 31.6318 29.9629 30.7886 30.1672C29.6298 28.4009 28.1097 26.5336 26.2975 24.7112Z'
                        fill='white' />
                    <path
                        d='M18.2287 16.3793C19.0971 16.3793 16.4937 13.7931 16.9287 11.525C18.5962 11.3974 22.4078 12.1448 20.1892 9.11379C22.699 9.55345 23.9991 7.68966 21.6296 5.92328C22.4182 5.97845 23.6437 4.49914 22.764 4.31207C19.9456 3.7181 18.8423 5.23448 20.6312 7.42155C18.7505 7.07328 17.2173 7.9431 18.63 9.89655C13.1994 9.22328 16.2891 16.3793 18.2287 16.3793ZM36.8726 14.081C37.6864 13.7155 36.3058 11.3009 35.8569 10.6836C39.2915 10.3181 39.1615 9.3 37.0078 7.11897C42.8631 7.31466 37.1889 4.00431 37.9846 2.69397C38.6736 1.55776 40.7874 2.74914 40.5915 2.11638C39.9311 0 33.6668 1.43103 37.631 5.38276C34.1712 5.45 33.8393 6.575 36.4176 8.9069C31.9265 8.95603 35.5908 14.6552 36.8726 14.081ZM51.7378 22.6078C50.3667 22.9897 50.1553 22.8466 50.3381 24.2043C47.1713 22.7543 43.8207 20.7379 45.854 26.0802C42.2573 23.95 42.4367 25.8155 41.7641 28.8853C40.8888 28.2069 39.6451 26.419 39.6451 26.419L38.3278 27.5319C38.3278 27.5319 40.7414 30.9181 41.9331 30.7259C42.9809 30.5578 43.5512 28.5879 43.6093 26.8517C46.946 28.2526 48.5432 28.4397 47.017 24.3431C49.6846 25.8336 52.9555 27.1483 51.7378 22.6078ZM3.50916 7.27328L5.96011 9.71207L3.50916 12.15L1.05734 9.71207L3.50916 7.27328ZM24.1005 26.5181L21.6478 28.956L19.1959 26.5164L21.6486 24.0776L24.1005 26.5181ZM13.1908 3.44828L15.6417 5.88621L13.1899 8.32586L10.7389 5.88621L13.1908 3.44828ZM39.8765 37.4862L37.4238 35.0474L39.8748 32.6078L42.3275 35.0466L39.8765 37.4862ZM34.4113 45.85L31.9603 43.4121L34.4113 40.9733L36.8631 43.4121L34.4113 45.85ZM45.1649 47.7759L42.7123 45.3371L45.1623 42.8974L47.615 45.3362L45.1649 47.7759ZM47.6159 36.669L45.1649 34.2302L47.6159 31.7922L50.0668 34.2302L47.6159 36.669ZM43.5243 6.03448L45.9753 8.47241L43.5235 10.9112L41.0725 8.47241L43.5243 6.03448Z'
                        fill='white' />
                </svg>
                <span class='text-base font-medium'>Perbarui akun dan bantu banyak orang!</span>
            </div>
            <div class='flex justify-between items-center'>
                <span>Buat donasi</span>
                {{-- <button
                    class='flex items-center justify-center text-xs font-medium rounded-full px-4 py-2 space-x-1 bg-white text-black'>
                    <span>Next step</span>
                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'
                        fill='none' stroke='#000000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                        <path d='M5 12h13M12 5l7 7-7 7' />
                    </svg>
                </button> --}}
            </div>
        </div>
        <div class='flex justify-between w-full items-start gap-5 flex-wrap'>
            <div
                class='relative space-y-3 text-sm rounded-xl w-full md:w-96 p-4 mb-4
             bg-slate-800 text-white'>
                <div class='flex items-center justify-between font-medium'>
                    <span class='uppercase text-xs text-green-500'>upgrade account</span>
                    <span class='text-xs text-slate-500'>#donasiKami</span>
                </div>
                <div class='flex flex-row items-center space-x-3'>
                    <div
                        class='flex flex-none items-center justify-center w-10 h-10 rounded-full bg-green-500 text-white'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'
                            fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round'
                            stroke-linejoin='round'>
                            <polygon points='14 2 18 6 7 17 3 17 3 13 14 2' />
                            <line x1='3' y1='22' x2='21' y2='22' />
                        </svg>
                    </div>
                    <span class='text-base font-medium'>Mereka membutuhkan kita</span>
                </div>
                <div> dengan akun yang diperbarui, kita dapat membuat donasi yang lebih baik.</div>
                <div class='flex justify-between items-center'>
                    <div>
                        <dt class='sr-only'>Users</dt>
                        <dd class='flex justify-start -space-x-1.5'>
                            @forelse ($avatars as $avatar)
                                <a href='#' class='inline-block -m-1'>
                                    <img class='w-7 h-7 rounded-full ring-2 ring-white dark:ring-slate-800'
                                        src='{{ asset('storage/' . $avatar->avatar) }}' alt='avatar' />
                                </a>
                            @empty
                                <span class='inline-block -m-1 rounded-full ring-2 ring-white dark:ring-slate-800'>
                                    <svg width='28' height='28' viewBox='0 0 31 31' fill='none'
                                        xmlns='http://www.w3.org/2000/svg' class='text-slate-200 dark:text-slate-600'>
                                        <path
                                            d='M31 15.5C31 24.0604 24.0604 31 15.5 31C6.93959 31 0 24.0604 0 15.5C0 6.93959 6.93959 0 15.5 0C24.0604 0 31 6.93959 31 15.5ZM8.20879 15.5C8.20879 19.5268 11.4732 22.7912 15.5 22.7912C19.5268 22.7912 22.7912 19.5268 22.7912 15.5C22.7912 11.4732 19.5268 8.20879 15.5 8.20879C11.4732 8.20879 8.20879 11.4732 8.20879 15.5Z'
                                            fill='currentColor' />
                                        <path
                                            d='M31 15.5C31 18.049 30.3714 20.5586 29.1698 22.8066C27.9682 25.0547 26.2307 26.9716 24.1113 28.3878C21.9919 29.8039 19.556 30.6755 17.0193 30.9254C14.4826 31.1752 11.9234 30.7956 9.56841 29.8201C7.21345 28.8447 5.1354 27.3035 3.51834 25.3331C1.90128 23.3627 0.795112 21.0239 0.297828 18.5239C-0.199455 16.0239 -0.0725081 13.4398 0.667425 11.0006C1.40736 8.56136 2.73744 6.34225 4.53984 4.53985L10.2876 10.2876C9.43046 11.1448 8.79791 12.2002 8.44602 13.3602C8.09413 14.5202 8.03376 15.7491 8.27025 16.9381C8.50675 18.127 9.03281 19.2393 9.80184 20.1764C10.5709 21.1134 11.5591 21.8464 12.6791 22.3103C13.799 22.7742 15.0161 22.9547 16.2225 22.8359C17.4289 22.7171 18.5874 22.3026 19.5953 21.6291C20.6033 20.9556 21.4295 20.0439 22.001 18.9748C22.5724 17.9058 22.8714 16.7122 22.8714 15.5H31Z'
                                            fill='#2BC86A' />
                                    </svg>
                                </span>
                            @endforelse

                        </dd>
                    </div>
                    {{-- <button
                        class='flex items-center justify-center text-xs font-medium rounded-full px-4 py-1 space-x-1 border-2 border-black bg-white hover:bg-black hover:text-white text-black dark:bg-slate-800 dark:text-white dark:border-white dark:hover:bg-white dark:hover:text-black'>
                        <span>Submit</span>
                        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'
                            fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round'
                            stroke-linejoin='round'>
                            <path d='M5 12h13M12 5l7 7-7 7' />
                        </svg>
                    </button> --}}
                </div>
            </div>
            <div class="bg-white flex-1 p-5 rounded-md">
                <form class="py-6 px-9" action="{{ route('upgrade.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="bank_account_name" :value="__('Nama Akun Bank')" />
                        <x-text-input id="bank_account_name" name="bank_account_name" type="text"
                            class="mt-1 block w-full" :value="old('bank_account_name')" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('bank_account_name')" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="bank_account_number" :value="__('Nomor Akun Bank')" />
                        <x-text-input id="bank_account_number" name="bank_account_number" type="text"
                            class="mt-1 block w-full" :value="old('bank_account_number')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('bank_account_number')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="bank_branch" :value="__('Bank Type')" />
                        <x-text-input id="bank_branch" name="bank_branch" type="text" class="mt-1 block w-full"
                            :value="old('bank_branch')" placeholder="BNI / BRI / BCA ..." required />
                        <x-input-error class="mt-2" :messages="$errors->get('bank_branch')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input id="phone" name="phone" type="number" class="mt-1 block w-full"
                            :value="old('phone')" placeholder="62***********" required />
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="upgrade_reason" :value="__('Alasan Upgrade')" />
                        <textarea class="border-orange-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm w-full"
                            name="upgrade_reason" id="" cols="30" rows="10">{{ old('upgrade_reason') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('upgrade_reason')" />
                    </div>
                    <div class="mb-6 pt-4">
                        <label
                            class="relative mx-auto cursor-pointer flex w-full flex-col items-center justify-center rounded-xl border-2 border-dashed border-orange-400 p-5 bg-white  text-center"
                            htmlFor="supporting_documents">
                            <div class="flex justify-center flex-col items-center" id="preview-label">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-orange-800"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>

                                <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">
                                    Dokument</h2>

                                <p class="mt-2 text-gray-500 tracking-wide">Unggah
                                    file Anda
                                    <b>berkas PNG, JPG, JPEG, PDF</b>
                                </p>

                                <input id="supporting_documents" type="file" class="hidden"
                                    name="supporting_documents" onchange="ImgPreview(this)"
                                    accept="image/png, image/jpeg, image/jpg, application/pdf" />

                            </div>
                            <img id="preview" class="w-full rounded-md">
                        </label>
                        <div id="nameFile" class="text-md text-orange-500 text-center"></div>

                    </div>

                    <div>
                        <x-primary-button class="w-full p-5">Kirim</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            function ImgPreview(e) {
                const [file] = e.files;
                console.log(file);

                const extension_available = ['png', 'jpg', 'jpeg', 'pdf'];
                const extension_file = file['type'].split('/')[1];
                if (extension_available.includes(extension_file)) {
                    document.getElementById('preview-label').classList.add('hidden')
                    if (extension_file == 'pdf') {
                        document.getElementById('nameFile').textContent = file['name'];
                    } else {
                        document.getElementById('preview').src = URL.createObjectURL(file);
                    }
                }
            }
        </script>
    @endpush
</x-app-layout>
