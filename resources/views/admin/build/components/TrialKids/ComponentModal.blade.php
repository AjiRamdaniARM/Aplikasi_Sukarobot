<div class="flex flex-wrap -mx-5 " style="gap: 10px">
    {{-- component card 1 --}}
    <div class="w-full max-w-full scale-custom px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div id="resetResponse" class="hover:scale-105">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal"> Data Siswa Trial</p>
                                <h5 class="mb-0 font-bold">
                                    12
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
        </div>
    </div>

    {{-- === card component 2 === --}}
    <div class="w-full max-w-full scale-custom px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div id="resetResponse" class="hover:scale-105">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">  Siswa Trial Lanjut</p>
                                <h5 class="mb-0 font-bold">
                                    12
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
        </div>
    </div>

    {{-- === card component 3 === --}}
    <div class="w-full max-w-full scale-custom px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div id="resetResponse" class="hover:scale-105">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">  Siswa Trial Tidak Lanjut</p>
                                <h5 class="mb-0 font-bold">
                                    12
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
        </div>
    </div>

</div>
<script>
    document.getElementById('resetResponse').addEventListener('click', function() {
        document.getElementById('searchInput').value = '';
        document.getElementById('formSearch').submit();
    })    
</script> 
 <style>
    .scale-custom:hover {
        transform: scale(1.05);
        transition: all;
    }
 </style>