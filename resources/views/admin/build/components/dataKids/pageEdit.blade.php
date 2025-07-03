<x-app-layout>
    <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
        @include('admin.build.components.sidenav')
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            @include('admin.build.components.navbar')

            <div class="w-full px-6 py-6 mx-auto">
                {{-- Notifikasi --}}
                @if (session('success'))
                    <div class="alert alert-success text-center text-black font-bold" style="background-color: rgb(166, 255, 166); padding:3px">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-success text-center text-white font-bold" style="background-color: rgb(255, 45, 22); padding:3px">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 mt-6 md:flex-none">
                        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                                <h6 class="mb-0">Edit Data Anak</h6>
                            </div>
                            <div class="flex-auto p-6">
                                <form id="editDataForm" action="{{ route('edit.kids', ['id' => $getDataKid->id_siswa]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-2 " style="gap:10px">
                                            {{-- Nama Lengkap --}}
                                            <div>
                                                <label class="block mb-1 text-sm font-semibold text-gray-700">Nama Lengkap</label>
                                                <input name="nama_lengkap" type="text" value="{{ $getDataKid->nama_lengkap }}" required
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            </div>

                                            {{-- Tempat Lahir --}}
                                            <div>
                                                <label class="block mb-1 text-sm font-semibold text-gray-700">Tempat Lahir</label>
                                                <input name="tl" type="text" value="{{ $getDataKid->tl }}"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            </div>

                                            {{-- Tanggal Lahir --}}
                                            <div>
                                                <label class="block mb-1 text-sm font-semibold text-gray-700">Tanggal Lahir</label>
                                                <input name="tanggal_lahir" type="date" value="{{ $getDataKid->tanggal_lahir }}"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            </div>

                                            {{-- Sekolah --}}
                                            <div>
                                                <label class="block mb-1 text-sm font-semibold text-gray-700">Sekolah</label>
                                                <select name="id_sekolah" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                                    <option disabled {{ $getDataKid->id_sekolah ? '' : 'selected' }} value="">Pilih Sekolah</option>
                                                    @foreach ($getDataSchool as $sekolah)
                                                        <option value="{{ $sekolah->id_sekolah }}" 
                                                            {{ $getDataKid->id_sekolah == $sekolah->id_sekolah ? 'selected' : '' }}>
                                                            {{ $sekolah->sekolah }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            {{-- Kelas Sekolah --}}
                                            <div>
                                                <label class="block mb-1 text-sm font-semibold text-gray-700">Kelas Sekolah</label>
                                                <input name="kelas" type="text" value="{{ $getDataKid->kelas }}"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            </div>

                                            {{-- Nama Orang Tua --}}
                                            <div>
                                                <label class="block mb-1 text-sm font-semibold text-gray-700">Nama Orang Tua</label>
                                                <input name="nama_ortu" type="text" value="{{ $getDataKid->nama_ortu }}"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            </div>

                                            {{-- Pekerjaan Orang Tua --}}
                                            <div>
                                                <label class="block mb-1 text-sm font-semibold text-gray-700">Pekerjaan Orang Tua</label>
                                                <input name="work_ortu" type="text" value="{{ $getDataKid->work_ortu }}"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            </div>

                                            {{-- Nomor Telepon --}}
                                            <div>
                                                <label class="block mb-1 text-sm font-semibold text-gray-700">Nomor Telepon</label>
                                                <input name="telephone" type="text" value="{{ $getDataKid->telephone }}"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            </div>

                                            {{-- Alamat --}}
                                            <div>
                                                <label class="block mb-1 text-sm font-semibold text-gray-700">Alamat</label>
                                                <input name="alamat" type="text" value="{{ $getDataKid->alamat_anak }}"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            </div>

                                            {{-- Pilih Kelas Belajar --}}
                                            <div>
                                                <label class="block mb-1 text-sm font-semibold text-gray-700">Pilih Kelas Belajar</label>
                                                <select name="id_kelas" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                                    <option disabled value="" {{ is_null($getDataKid->id_kelas) ? 'selected' : '' }}>
                                                    Pilih Kelas
                                                    </option>
                                                    @foreach ($getDataClass as $class)
                                                        <option value="{{ $class->id }}"
                                                            {{ $getDataKid->id_kelas == $class->id ? 'selected' : '' }}>
                                                            {{ $class->kelas }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    {{-- Upload File --}}
                                        <div class="mt-6">
                                            <label class="block mb-2 text-sm font-semibold text-gray-700">Pas Foto</label>
                                            <input type="file" name="file" id="fileInput" accept="image/*"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md">
                                            <div class="mt-4">
                                                <img id="previewImage" src="{{ $getDataKid->file ? asset('assets/data/dataAnak/img/' . $getDataKid->file) : asset('asset/profile.jpg') }}"
                                                    class="w-full object-cover rounded-md">
                                            </div>
                                        </div>

                                        <script>
                                            document.getElementById('fileInput').addEventListener('change', function (event) {
                                                const file = event.target.files[0];
                                                if (file) {
                                                    const reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        document.getElementById('previewImage').src = e.target.result;
                                                    }
                                                    reader.readAsDataURL(file);
                                                }
                                            });
                                        </script>

                                    {{-- Tombol --}}
                                                <div class="mt-6 flex items-center" style="gap:10px">
                                                    <button id="submitBtn" type="submit"
                                                        style="background-color: rgb(0, 106, 255)"
                                                        class="text-white px-6 py-2 rounded-md font-semibold transition flex items-center justify-center gap-2">
                                                        
                                                        <!-- Spinner -->
                                                        <svg id="spinner" class="hidden w-5 h-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                            <path class="opacity-75" fill="currentColor"
                                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z">
                                                            </path>
                                                        </svg>

                                                        <span id="submitText">Simpan Perubahan</span>
                                                    </button>
                                                    <!-- Tombol Kembali -->
                                                    <a href="{{ route('index.kids') }}"
                                                        style="background-color: rgb(193, 191, 191)"
                                                        class=" px-6 py-2 rounded-md font-semibold text-gray-800 transition">
                                                        Kembali
                                                    </a>
                                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <script>
    document.getElementById('editDataForm').addEventListener('submit', function () {
        const btn = document.getElementById('submitBtn');
        const text = document.getElementById('submitText');
        const spinner = document.getElementById('spinner');

        btn.disabled = true;
        text.innerText = 'Menyimpan...';
        spinner.classList.remove('hidden');
    });
</script>

</x-app-layout>
