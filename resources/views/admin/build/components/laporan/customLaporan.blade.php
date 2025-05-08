<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
        @include('admin.build.components.laporan.modalFiturFilter')
        @include('admin.build.components.laporan.modalTemplateExcel')
        @include('admin.build.components.laporan.exportModalFiturPDF')
        @include('admin.build.components.laporan.exportModalFitur')
        @include('admin.build.components.popUpTrainer')
        {{-- sidenav --}}
        @include('admin.build.components.sidenav')
        {{-- sidenav --}}
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            <!-- Navbar -->
            @include('admin.build.components.navbar')
            <!-- end Navbar -->
            <div class="w-full px-6 py-6 mx-auto">

                <div class="flex flex-wrap my-6 -mx-3">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:w-1/2 md:flex-none lg:w-2/3 lg:flex-none">
                        <img src="{{ asset('assets/img/bannerCustom.gif') }}" class="w-full rounded-lg" alt="">
                    </div>
                    <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none lg:w-1/3 lg:flex-none">
                        <div class="relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-black/12.5 bg-white bg-clip-border shadow-soft-xl">
                            
                            <!-- Header -->
                            <div class="flex items-center justify-between rounded-t-2xl border-b border-solid border-black/12.5 bg-white p-6 pb-0">
                                <h6 class="text-base font-semibold text-slate-700">Total Laporan Trainer</h6>
                                <form action="{{ route('laporan.custom')}}" method="GET">
                                    <input 
                                        type="month" 
                                        name="month" 
                                        value="{{ request('bulan') }}"
                                        class="text-sm border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-1 focus:ring-blue-500"
                                        onchange="this.form.submit()"
                                    >
                                </form>
                            </div>
                    
                            <!-- Body -->
                            <div class="flex-auto p-4">
                                <div class="relative before:absolute before:top-0 before:left-4 before:h-full before:border-r-2 before:border-r-slate-100 before:content-[''] before:lg:-ml-px">
                                    @foreach ($query as $querys)
                                        <div class="relative mb-4 after:clear-both after:table after:content-['']">
                                            <span class="absolute left-4 z-10 inline-flex w-6.5 h-6.5 -translate-x-1/2 items-center justify-center rounded-full bg-white text-base font-semibold text-center">
                                                <i class="ni ni-bell-55 text-transparent bg-gradient-to-tl from-red-600 to-red-400 bg-clip-text"></i>
                                            </span>
                                            <div class="relative -top-1.5 ml-11.252 pt-1.4 w-auto lg:max-w-120">
                                                <h6 class="mb-0 text-sm font-semibold leading-normal text-slate-700">
                                                    {{ $querys->nama_trainer }}
                                                </h6>
                                                <p class="mt-1 mb-0 text-xs font-semibold leading-tight text-slate-400">
                                                    Total Laporan {{ $querys->total_laporan }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="flex-none w-full max-w-full px-3">
                        <div
                            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div class="flex flex-wrap items-center justify-start" style="gap:15px">
                                    <h6>Laporan Pelatih Khusus</h6>
                                    &nbsp;&nbsp;&nbsp;
                                    <button onclick="window.modalFilter.showModal();"
                                        class="bg-gradient-to-tl from-gray-900 to-slate-800 font-bold text-white px-4 py-2 rounded hover:scale-102"
                                        style="transition:all;">    
                                        Tanggal
                                    </button>
                                    <button onclick="window.modalExport.showModal();"
                                        class="bg-gradient-to-tl from-red-600 to-slate-800 font-bold text-white px-4 py-2 rounded hover:scale-102"
                                        style="transition:all;">
                                        Laporan Excel
                                    </button>

                                    <button onclick="window.modalTemplateExcel.showModal();"
                                        class="bg-gradient-to-tl from-green-600 to-slate-800 font-bold text-white px-4 py-2 rounded hover:scale-102"
                                        style="transition:all;">
                                        Template Excel
                                    </button>

                                    <button onclick="window.modalExportPDF.showModal();"
                                    class="bg-gradient-to-tl from-red-600 to-slate-800 font-bold text-white px-4 py-2 rounded hover:scale-102"
                                    style="transition:all;">
                                    Ekspor Pdf
                                    </button>

                                </div>
                            </div>
                            <div class="flex-auto px-0 pt-0 pb-2">
                                <div class="p-0 overflow-x-auto">
                                    <table
                                        class="items-center justify-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                        <thead class="align-bottom">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    Trainer</th>
                                                <th
                                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    Kelas</th>
                                                <th
                                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    Tanggal Jadwal</th>
                                                <th
                                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    Absensi Trainer </th>
                                                    <th
                                                    class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    Aksi lainnya </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($schedules as $schedule)
                                                <tr>
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                        <div class="flex px-4 mx-auto">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm leading-normal">
                                                                    {{ $schedule->nama_trainer }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                        <div class="flex px-4 mx-auto">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm leading-normal">
                                                                    {{ $schedule->kelas }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                        <div class="flex px-4 mx-auto">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm leading-normal">
                                                                    {{ \Carbon\Carbon::parse($schedule->tanggal_jd)->translatedFormat('d F Y') }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                        <div class="flex px-4 mx-auto">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm leading-normal">
                                                                    {{ \Carbon\Carbon::parse($schedule->tanggal_lp)->translatedFormat('d F Y') }}
                                                                    -
                                                                    {{ \Carbon\Carbon::parse($schedule->jam_lp)->format('H:i') }}

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                        <div class="flex px-4 mx-auto">
                                                            <div class="my-auto">
                                                                <a href="{{ url('/laporanTrainer/' . $schedule->id_schedules) }}"
                                                                    class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700"
                                                                    href="javascript:;">
                                                                    Detail
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- === output jika tidak ada data === --}}
                                            @empty($schedule)
                                                <tr>
                                                    <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                        <div class="flex px-4 mx-auto">
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm leading-normal">
                                                                    Belum ada data absensi laporan</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endempty
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              
            </div>
        </main>

    </body>

</x-app-layout>
