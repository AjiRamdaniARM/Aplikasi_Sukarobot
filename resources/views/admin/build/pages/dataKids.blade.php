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
                <div class="flex flex-wrap -mx-3">
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
                </div>
                {{-- akhir component data anak --}}
                <br>
                @include('admin.build.components.dataKids.cardAlldata')

                {{-- component table semua data anak --}}
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 mt-6  md:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 flex lg:justify-between justify-center rounded-t-2xl flex-wrap items-center gap-10">
                                <h6 class="mb-0 ">Semua data anak</h6>
                                <br>
                                @include('admin.build.components.dataKids.fiturSearch')
                            </div>
                            <div class="flex-auto p-4 pt-6">
                                @if (empty($getDataKids))
                                    <div class="text-black">Tidak ada data anak untuk sekarang</div>
                                @else
                                    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                        @foreach ($getDataKids as $getDataKid)
                                            <li
                                                class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                                                <div class="flex" style="gap:20px">
                                                    <img src="{{ asset('assets/data/dataAnak/img/' . $getDataKid->file) }}"
                                                        alt="child"
                                                        style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; margin: 0 auto;">
                                                    <div class="flex flex-col">
                                                        <h6 class="mb-4 leading-normal text-sm">
                                                            {{ $getDataKid->nama_lengkap }}
                                                        </h6>
                                                        <span class="mb-2 leading-tight text-xs">Sekolah: <span
                                                                class="font-semibold text-slate-700 sm:ml-2">{{ $getDataKid->sekolah }}</span></span>
                                                    </div>
                                                </div>
                                                <div class="ml-auto text-right flex flex-wrap">
                                                    <form
                                                        action="{{ route('delete.kids', ['nama_lengkap' => $getDataKid->nama_lengkap]) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text">
                                                            <i
                                                                class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete
                                                        </button>
                                                    </form>


                                                    <a class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700"
                                                        href="#popup/{{ $getDataKid->nama_lengkap }}"><i
                                                            class="mr-2 fas fa-pencil-alt text-slate-700"
                                                            aria-hidden="true"></i>Edit</a>
                                                    @include('admin.build.components.dataKids.modalEdit')
                                                    <a href="{{ url('/datakids/privateData/' . $getDataKid->nama_lengkap) }}"
                                                        class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700"
                                                        href="javascript:;"><svg class="w-5 text-[#344767]"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        View</a>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="mt-4">
                                        {{ $getDataKids->links() }}
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                    {{-- <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
                        <div
                            class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                                <div class="flex flex-wrap -mx-3">
                                    <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                                        <h6 class="mb-0">All School Data</h6>
                                    </div>

                                </div>
                            </div>
                            <div class="flex-auto p-4 pt-6">
                                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                    @foreach ($getDataSchool as $sekolah)
                                        <li
                                            class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-inherit rounded-xl">
                                            <div class="flex items-center">
                                                <button
                                                    class="leading-pro ease-soft-in text-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-lime-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-lime-500 transition-all hover:opacity-75"><i
                                                        class="fas fa-arrow-up text-3xs"></i></button>
                                                <div class="flex flex-col">
                                                    <h6 class="mb-1 leading-normal text-sm text-slate-700">
                                                        {{ $sekolah->sekolah }}</h6>
                                                    @if ($sekolah->alamat == null)
                                                        <span class="leading-tight text-xs">Data alamat belum ada
                                                            !!</span>
                                                    @else
                                                        <span
                                                            class="leading-tight text-xs">{{ $sekolah->alamat }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="flex flex-col items-center justify-center">
                                                <button
                                                    class="relative z-10 inline-block m-0 font-semibold leading-normal text-white rounded-lg text-sm animasi-scale-hover-105 transisi-all animasi-scale-focus-105"
                                                    style="background-color: #FFAA00; padding: 5px;">
                                                    Edit</button>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="mt-4">
                                    {{ $getDataSchool->links() }}
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>

            </div>

        </main>

    </body>
</x-app-layout>
