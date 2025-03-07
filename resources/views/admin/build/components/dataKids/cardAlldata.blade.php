<div class="flex flex-wrap -mx-3 ">
    {{-- component card 1 --}}
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <a href="{{ route('index.kids', ['class' => request('2')]) }}" class="hover:scale-105">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Data Anak</p>
                                <h5 class="mb-0 font-bold">
                                    {{ $getDataCountAll }}
                                    <span class="text-sm leading-normal font-weight-bolder text-lime-500">Siswa</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block justify-center items-center w-12 h-12 text-center rounded-lg  bg-gradient-to-tl from-purple-700 top-3.5 to-pink-500">
                                <i class="ni leading-none ni-diamond text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    {{-- component card 2 --}}
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <a href="" class="hover:scale-105">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal"> Data Anak Eskul</p>
                                <h5 class="mb-0 font-bold">
                                    {{ $getDataCountClub }}
                                    <span class="text-sm leading-normal font-weight-bolder text-lime-500">Anak</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                <i class="ni leading-none ni-diamond text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    {{-- component card 3 --}}
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans text-sm font-semibold leading-normal">Data Anak Private</p>
                            <h5 class="mb-0 font-bold">
                                {{ $getDataCountPrivate }}
                                <span class="text-sm leading-normal text-lime-500 font-weight-bolder">Anak</span>
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div
                            class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                            <i class="ni leading-none ni-diamond text-lg relative top-3.5 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
