<x-app-layout>

    <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

        {{-- sidenav --}}
        @include('admin.build.components.sidenav')
        {{-- sidenav --}}
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            <!-- Navbar -->
            @include('admin.build.components.navbar')
            <!-- end Navbar -->
            <div class="w-full px-6 mx-auto">
                <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl"
                    style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%">
                    <span
                        class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-600 to-cyan-400 opacity-60"></span>
                </div>
                <div
                    class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
                    <div class="flex flex-wrap -mx-3">
                        <a href="{{ asset('assets/data/dataAnak/img/' . $getSiswa->file) }}" class="">
                            <div class="flex-none w-auto max-w-full px-3">
                                <div
                                    class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                                   <img src="{{ $getSiswa->file && file_exists(public_path('assets/ data/dataAnak/img/' . $getSiswa->file)) 
                                            ? asset('assets/data/dataAnak/img/' . $getSiswa->file) 
                                            : asset('asset/profile.jpg') }}"
                                    alt="profile_image" class="w-full shadow-soft-sm rounded-full" />
                                </div>
                            </div>
                        </a>

                        <div class="flex-none w-auto max-w-full px-3 my-auto">
                            <div class="h-full">
                                <h5 class="mb-1">{{ $getSiswa->nama_lengkap }}</h5>
                                <p class="mb-0 font-semibold leading-normal text-sm">{{ $getSiswa->sekolah }}</p>
                            </div>
                        </div>
                        <div
                            class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                            <div class="relative right-0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full p-6 mx-auto">
                <div class="flex flex-wrap justify-center -mx-3">
                    <div class="w-full max-w-full px-3 lg-max:mt-6">
                        <div
                            class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                                <div class="flex flex-wrap -mx-3">
                                    <div
                                        class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                        <h6 class="mb-0">Alamat Lengkap</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-auto p-4">
                                <p class="leading-normal text-sm">{{ $getSiswa->alamat_anak }}</p>
                                <hr
                                    class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
                                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                    <li
                                        class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit">
                                        <strong class="text-slate-700">Tempat Lahir:</strong> &nbsp;
                                        {{ $getSiswa->tl }}
                                    </li>
                                    <li
                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                        <strong class="text-slate-700">Tanggal Lahir :</strong> &nbsp;
                                        {{ $getSiswa->tanggal_lahir }}
                                    </li>
                                    <li
                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                        <strong class="text-slate-700">Kelas :</strong> &nbsp;
                                        {{ $getSiswa->kelas }}
                                    </li>

                                     <li
                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                        <strong class="text-slate-700">Kelas :</strong> &nbsp;
                                        {{ $getSiswa->nama_kelas }}
                                    </li>
                                    <li
                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                        <strong class="text-slate-700">Nama Orang Tua :</strong> &nbsp;
                                        {{ $getSiswa->nama_ortu }}
                                    </li>
                                    <li
                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                        <strong class="text-slate-700">Pekerjaan Orang Tua :</strong> &nbsp;
                                        {{ $getSiswa->work_ortu }}
                                    </li>

                                    <li
                                        class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                        <strong class="text-slate-700">Nomor Telepon :</strong> &nbsp;
                                        {{ $getSiswa->telephone }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </body>
</x-app-layout>
