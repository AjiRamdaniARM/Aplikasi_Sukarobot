<x-app-layout>

    <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
        @include('admin.build.components.popUpTrainer')
        {{-- sidenav --}}
        @include('admin.build.components.sidenav')
        {{-- sidenav --}}
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            <!-- Navbar -->
            @include('admin.build.components.navbar')
            <!-- end Navbar -->
            <div class="w-full px-6 py-6 mx-auto">
                <!-- table 1 -->

                <div class="flex flex-wrap -mx-3">
                    <div class="flex-none w-full max-w-full px-3">
                        <div
                            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                            <div
                                class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex-items">
                                <h6>Data Trainer</h6>
                                &nbsp; &nbsp; &nbsp;
                                 <button onclick="window.location.href='#popup'" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition">
                                    + New Trainer
                                </button>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <button id="exportBtn" onclick="exportExcel()" style="background-color: rgb(4, 238, 4); color: black;" class="text-white px-4 py-2 rounded-md transition">
                                    <span id="exportText">Export Excel</span>
                                    <span id="loadingSpinner" style="display: none;">Loading...</span>
                                </button>

                                <script>
                                    function exportExcel() {
                                        // Mengubah tampilan button menjadi loading
                                        var exportText = document.getElementById('exportText');
                                        var loadingSpinner = document.getElementById('loadingSpinner');

                                        exportText.style.display = 'none'; // Sembunyikan teks "Export Excel"
                                        loadingSpinner.style.display = 'inline'; // Tampilkan teks "Loading..."

                                        // Redirect ke URL download
                                        window.location.href = '{{ route('trainer.export') }}';

                                        // Reset tampilan button setelah beberapa waktu
                                        setTimeout(function() {
                                            exportText.style.display = 'inline';
                                            loadingSpinner.style.display = 'none';
                                        }, 3000); // Reset setelah 3 detik, atau sesuaikan dengan durasi download
                                    }
                                </script>

                            </div>
                            <div class="flex-auto px-0 pt-0 pb-2">
                                <div class="p-0 overflow-x-auto">
                                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                        <thead class="align-bottom">

                                            <tr>
                                                <th
                                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    Trainer</th>
                                                <th
                                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    Status</th>
                                                <th
                                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    confidential data</th>
                                                <th
                                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    Aksi</th>
                                                <th
                                                    class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getTrainerData as $trainerGet)
                                                <tr>
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                        <div class="flex px-2 py-1">
                                                            {{-- <div>
                                                                <img src="{{ asset('assets/trainer_data/profile/' . $trainerGet->profile) }}"
                                                                    class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl"
                                                                    alt="user1" />
                                                            </div> --}}
                                                            <div class="flex flex-col justify-center">
                                                                <h6 class="mb-0 text-sm leading-normal">
                                                                    {{ $trainerGet->nama }}</h6>
                                                                <p class="mb-0 text-xs leading-tight text-slate-400">
                                                                    {{ $trainerGet->lulusan }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                        <p class="mb-0 text-xs font-semibold leading-tight">Aktif</p>
                                                    </td>
                                                    <td
                                                        class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                        {{-- <button onclick="window.dialog.showModal();"> --}}
                                                        {{-- <button
                                                            href="{{ url('/dataTrainer/private/' . $trainerGet->nama) }}"> --}}
                                                        @include('admin.build.components.trainer.modalPassword')
                                                        <button
                                                            onclick="window.modalPassword{{ $trainerGet->id }}.showModal();">
                                                            <span
                                                            style="background-color: red"
                                                                class="animasi-button px-2.5 text-xs py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white ">Detail Data</span>
                                                        </button>

                                                    </td>
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                        <a href="#popupedit{{ $trainerGet->nama }}"
                                                            class="text-xs font-semibold leading-tight text-slate-400 animasi-edited-hover">Edit Data</a>
                                                        @include('admin.build.components.trainer.popUpTrainerEdit')
                                                        &nbsp;
                                                        <a href="#popupdelete{{ $trainerGet->nama }}"
                                                            class="text-xs font-semibold leading-tight text-slate-400 animasi-delete-hover">
                                                            Hapus </a>
                                                        @include('admin.build.components.trainer.popUpTrainerDelete')

                                                    </td>
                                                </tr>
                                            @endforeach
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
