<x-app-layout>
    <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
        @include('admin.build.components.sidenav')
        @include('modalSekolah')
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            <!-- Navbar -->
            @include('admin.build.components.navbar')

            <div class="w-full px-6 py-6 mx-auto">
                {{-- alert validasi data anak input  --}}
                @if (session('success'))
                    <div class="alert alert-success text-center text-black font-bold" role="alert"
                        style="background-color: rgb(166, 255, 166); padding:3px">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-success text-center text-white font-bold" role="alert"
                        style="background-color: rgb(255, 45, 22); padding:3px">
                        {{ session('error') }}
                    </div>
                @endif
                {{-- component input data siswa  --}}
                {{-- <div class="flex flex-wrap -mx-3">
                    <div class="max-w-full px-3 lg:w-full lg:flex-none">
                        <div class="flex flex-wrap -mx-3">
                            <div class="max-w-full px-3 mb-4 lg:mb-0 lg:w-full lg:flex-none">
                                <div
                                    class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                                    <form id="dataFormKids" action="{{ route('admin.kids') }}" method="POST"
                                        class="text-black" enctype="multipart/form-data">
                                        @csrf
                                        <div
                                            class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="flex items-center flex-none max-w-full px-3">
                                                    <h6 class="mb-0">Tambah data anak baru</h6>
                                                </div>
                                                <div class="  max-w-full px-3 text-right"
                                                    style="display:flex; flex-wrap:wrap; gap:1px">
                                                    <button type="button" onclick="window.dialogAdmin.showModal()"
                                                        class="inline-block px-6  py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25">
                                                         Tambah Sekolah
                                                    </button>
                                                    &nbsp;
                                                    <a href="{{ url('/datakids/allExport') }}"
                                                        class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25">
                                                        Export
                                                        Data</a>
                                                    &nbsp;
                                                    <a href="{{ route('formulir.index') }}"
                                                        class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25">
                                                        Formulir
                                                        Pendaftaran</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col p-4" style="gap:10px">
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                                                    <input id="nama_lengkap"
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-yellow-800 border border-solid shadow-none rounded-xl w-full border-black bg-clip-border py-4"
                                                        name="nama_lengkap" value="{{ old('nama_lengkap') }}" type="text" required placeholder="Nama Lengkap" />
                                                    @error('nama_lengkap')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror    
                                                </div>
                                        
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <label for="tl" class="block mb-2 text-sm font-medium text-gray-700">Tempat Lahir</label>
                                                    <input id="tl"
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full py-4 border-slate-100 bg-clip-border"
                                                        name="tl" value="{{ old('tl') }}" required type="text" placeholder="Tempat Lahir" />
                                                    @error('tl')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                                    <input id="tanggal_lahir"
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl py-4 w-full border-slate-100 bg-clip-border"
                                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" type="date" required />
                                                </div>
                                        
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <label for="sekolah" class="block mb-2 text-sm font-medium text-gray-700">Pilih Sekolah</label>
                                                    <select id="sekolah"
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full py-4 border-slate-100 bg-clip-border"
                                                        name="sekolah">
                                                        <option value="">Pilih Sekolah</option>
                                                        @foreach ($getSelect as $get)
                                                            <option value="{{ $get->id_sekolah }}">{{ $get->sekolah }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <label for="kelas" class="block mb-2 text-sm font-medium text-gray-700">Kelas</label>
                                                    <input id="kelas"
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl py-4 w-full border-slate-100 bg-clip-border"
                                                        name="kelas" value="{{ old('kelas') }}" type="text" required placeholder="Class" />
                                                    @error('kelas')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                        
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <label for="nama_ortu" class="block mb-2 text-sm font-medium text-gray-700">Nama Orang Tua</label>
                                                    <input id="nama_ortu"
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full py-4 border-slate-100 bg-clip-border"
                                                        name="nama_ortu" value="{{ old('nama_ortu') }}" type="text" required placeholder="Nama Orang Tua" />
                                                    @error('nama_ortu')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <label for="telephone" class="block mb-2 text-sm font-medium text-gray-700">Nomor Telephone</label>
                                                    <input id="telephone"
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl py-4 w-full border-slate-100 bg-clip-border"
                                                        name="telephone" value="{{ old('telephone') }}" type="number" required placeholder="Nomor Telephone" />
                                                    @error('telephone')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                        
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <label for="work_ortu" class="block mb-2 text-sm font-medium text-gray-700">Pekerjaan Orang Tua</label>
                                                    <input id="work_ortu"
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full py-4 border-slate-100 bg-clip-border"
                                                        name="work_ortu" value="{{ old('work_ortu') }}" type="text" required placeholder="Pekerjaan Orang Tua" />
                                                    @error('work_ortu')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <label for="id_kelas" class="block mb-2 text-sm font-medium text-gray-700"> Pilih Kelas</label>
                                                    <select id="id_kelas"
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full py-4 border-slate-100 bg-clip-border"
                                                        name="id_kelas">
                                                        <option value="">Pilih Kelas</option>
                                                        @foreach ($getDataClass as $get)
                                                            <option value="{{ $get->id }}">{{ $get->kelas }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                        
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat</label>
                                                    <input id="alamat"
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full py-4 border-slate-100 bg-clip-border"
                                                        name="alamat" value="{{ old('alamat') }}" type="text" required placeholder="Alamat" />
                                                    @error('alamat')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        
                                            <div class="max-w-full mb-1 md:mb-0 md:flex-none">
                                                <label for="file" class="block mb-2 text-sm font-medium text-gray-700">Upload Pas Poto</label>
                                                <input id="file"
                                                    class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full py-4 border-slate-100 bg-clip-border"
                                                    name="file" type="file" required />
                                            </div>
                                            <button id="button-loading-submit" type="submit" style="margin-top: 2px;" class="bg-gradient-to-tl from-gray-900 to-slate-800 rounded-lg py-3 text-white poppins-regular text-semibold hover-button">Simpan Data Anak</button>
                                            <script>
                                                document.getElementById('dataFormKids').addEventListener('submit', function(event) {
                                                    let button = document.getElementById("button-loading-submit");
                                                    button.innerText = "Loading...";
                                                    button.disabled = true; 
                                                })
                                            </script>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- akhir component data anak --}}
                   <div
                                            class="p-4 pb-0 mb-0 border-b-transparent">
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="flex items-center flex-none max-w-full px-3">
                                                    <h6 class="mb-0">Pendaataan Siswa</h6>
                                                </div>
                                                <div class="  max-w-full px-3 text-right"
                                                    style="display:flex; flex-wrap:wrap; gap:1px">
                                                    {{-- <button type="button" onclick="window.dialogAdmin.showModal()"
                                                        class="inline-block px-6  py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25">
                                                         Tambah Sekolah
                                                    </button> --}}
                                                    &nbsp;
                                                    <a href="{{ url('/datakids/allExport') }}"
                                                        class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25">
                                                        Export
                                                        Data</a>
                                                    &nbsp;
                                                    <a target="_blank" href="{{ route('formulir.index') }}"
                                                        class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25">
                                                        Formulir
                                                        Pendaftaran</a>
                                                </div>
                                            </div>
                                        </div>
                <br>
                @include('admin.build.components.dataKids.cardAlldata')
                {{-- component table semua data anak --}}
               <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 mt-6 md:flex-none">
                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 flex lg:justify-between justify-center rounded-t-2xl flex-wrap items-center gap-10">
                            <h6 class="mb-0">Semua data anak</h6>
                            @include('admin.build.components.dataKids.fiturSearch')
                        </div>
                        <div class="flex-auto p-4 pt-6">
                            @if ($getDataKids->isEmpty())
                                <div class="text-black">Tidak ada data anak untuk sekarang</div>
                            @else
                                <div class="overflow-x-auto">
                                    <table class="table-auto w-full text-left border-collapse border border-gray-200">
                                        <thead class="bg-gray-100 text-gray-700 text-sm">
                                            <tr>
                                                <th class="p-4 border border-gray-200">No</th>
                                                <th class="p-4 border border-gray-200">Pas Foto</th>
                                                <th class="p-4 border border-gray-200">Nama Lengkap</th>
                                                <th class="p-4 border border-gray-200">Sekolah</th>
                                                <th class="p-4 border border-gray-200">kelas</th>
                                                <th class="p-4 border border-gray-200 text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getDataKids as $index => $getDataKid)
                                                <tr class="hover:bg-gray-50 text-sm">
                                                    <td class="p-4 border border-gray-200">{{ $loop->iteration }}</td>
                                                    <td class="p-4 border border-gray-200">
                                                         <img src="{{ $getDataKid->file && file_exists(public_path('assets/data/dataAnak/img/' . $getDataKid->file)) 
                                                                ? asset('assets/data/dataAnak/img/' . $getDataKid->file) 
                                                                : asset('asset/profile.jpg') }}"
                                                        alt="child"
                                                        class="w-12 h-12 rounded-full object-cover mx-auto">
                                                    </td>
                                                    <td class="p-4 border border-gray-200">{{ $getDataKid->nama_lengkap }}</td>
                                                    <td class="p-4 border border-gray-200">{{ $getDataKid->sekolah }}</td>
                                                    <td class="p-4 border border-gray-200">{{ $getDataKid->nama_kelas }}</td>
                                                    <td class="p-4 border border-gray-200 text-center space-x-2">
                                                        <form
                                                            action="{{ route('delete.kids', ['nama_lengkap' => $getDataKid->nama_lengkap]) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                           
                                                            <button type="submit"
                                                                class="text-red-600 hover:text-red-800 text-xs font-semibold">
                                                                <i class="far fa-trash-alt"></i> Delete
                                                            </button>
                                                        </form>
                                                        &nbsp;
                                                        <a href="{{ route('page.edit.dataSiswa',['id' => $getDataKid->id_siswa]) }}"
                                                            class="text-blue-600 hover:text-blue-800 text-xs font-semibold">
                                                            <i class="fas fa-pencil-alt"></i> Edit
                                                        </a>
                                                       
                                                        &nbsp;
                                                        <a href="{{ url('/datakids/privateData/' . $getDataKid->nama_lengkap) }}"
                                                            class="text-green-600 hover:text-green-800 text-xs font-semibold">
                                                           View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            </div>

        </main>

    </body>
</x-app-layout>
