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

                <!-- content -->
                <div class="flex flex-wrap -mx-3">
                    <div class="max-w-full px-3 lg:w-full lg:flex-none">
                        <div class="flex flex-wrap -mx-3">
                            <div class="max-w-full px-3 mb-4 lg:mb-0 lg:w-full lg:flex-none">
                                <div
                                    class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                                    <form action="{{ route('admin.kids') }}" method="POST" class="text-black"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div
                                            class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="flex items-center flex-none max-w-full px-3">
                                                    <h6 class="mb-0">Add New Child Data</h6>
                                                </div>
                                                <div class="  max-w-full px-3 text-right"
                                                    style="display:flex; flex-wrap:wrap; gap:1px">
                                                    <button type="button" onclick="window.dialogAdmin.showModal()"
                                                        class="inline-block px-6  py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25">
                                                        Create Schools
                                                    </button>
                                                    &nbsp;
                                                    <button type="submit"
                                                        class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25">
                                                        <i class="fas fa-plus">
                                                        </i>&nbsp;&nbsp;Create
                                                        Data</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col p-4" style="gap:10px">
                                            <div class="flex flex-wrap -mx-3 ">
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <input
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-yellow-800 border border-solid shadow-none rounded-xl w-full border-black bg-clip-border py-4"
                                                        name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                                                        type="text" required placeholder="Full Name" />
                                                    @error('nama_lengkap')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red"
                                                            role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <input
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full  py-4 border-slate-100 bg-clip-border"
                                                        name="tl" value="{{ old('tl') }}" required
                                                        type="text" placeholder="Place Of Birth" />
                                                    @error('tl')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red"
                                                            role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>


                                            </div>
                                            <div class="flex flex-wrap -mx-3 ">
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none ">
                                                    <input
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl py-4 w-full border-slate-100 bg-clip-border"
                                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                                        type="date" required placeholder="Date Of Birth" />
                                                </div>



                                            </div>
                                            <div class="flex flex-wrap -mx-3 ">
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none ">
                                                    <input
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl py-4 w-full border-slate-100 bg-clip-border"
                                                        name="kelas" value="{{ old('kelas') }}" type="text"
                                                        required placeholder="Class" />
                                                    @error('kelas')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red"
                                                            role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <input
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full  py-4 border-slate-100 bg-clip-border"
                                                        name="nama_ortu" value="{{ old('nama_ortu') }}" type="text"
                                                        required placeholder="Parent's Name" />
                                                    @error('nama_ortu')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red"
                                                            role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>


                                            </div>
                                            <div class="flex flex-wrap -mx-3 ">
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none ">
                                                    <input
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl py-4 w-full border-slate-100 bg-clip-border"
                                                        name="telephone" value="{{ old('telephone') }}" type="number"
                                                        required placeholder="Number Handphone" />
                                                    @error('telephone')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red"
                                                            role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <input
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full  py-4 border-slate-100 bg-clip-border"
                                                        name="work_ortu" value="{{ old('work_ortu') }}" type="text"
                                                        required placeholder="Parent's Occupation" />
                                                    @error('work_ortu')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red"
                                                            role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="flex flex-wrap -mx-3">
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <input
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full  py-4 border-slate-100  bg-clip-border"
                                                        name="alamat" value="{{ old('alamat') }}" type="text"
                                                        required placeholder="Address" />
                                                    @error('alamat')
                                                        <div class="alert alert-danger" style="padding: 10px; color:red"
                                                            role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                                                    <input
                                                        class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl w-full  py-4 border-slate-100  bg-clip-border"
                                                        name="file" type="file" required />
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 mt-6  md:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                                <h6 class="mb-0">All Data Kids</h6>
                                {{-- <a href="{{ url('users/export/') }}"
                                    style="
                                background-color:green;
                                padding: 3px;
                                color:white;
                                ">Export
                                    Data</a> --}}
                            </div>
                            <div class="flex-auto p-4 pt-6">
                                @if (empty($getDataKids))
                                    <div class="text-black">no child data for now</div>
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
                                                        <span class="mb-2 leading-tight text-xs">School: <span
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

                <footer class="pt-4">
                    <div class="w-full px-6 mx-auto">
                        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                            <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                                <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear() + ",");
                                    </script>
                                    made with <i class="fa fa-heart"></i> by
                                    <a href="https://www.creative-tim.com" class="font-semibold text-slate-700"
                                        target="_blank">Creative Tim</a>
                                    for a better web.
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                                <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com"
                                            class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                            target="_blank">Creative Tim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/presentation"
                                            class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                            target="_blank">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://creative-tim.com/blog"
                                            class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                            target="_blank">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/license"
                                            class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-soft-in-out text-sm text-slate-500"
                                            target="_blank">License</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

        </main>
        <div fixed-plugin>
            <a fixed-plugin-button
                class="bottom-7.5 right-7.5 text-xl z-990 shadow-soft-lg rounded-circle fixed cursor-pointer bg-white px-4 py-2 text-slate-700">
                <i class="py-2 pointer-events-none fa fa-cog"> </i>
            </a>
            <!-- -right-90 in loc de 0-->
            <div fixed-plugin-card
                class="z-sticky shadow-soft-3xl w-90 ease-soft -right-90 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white bg-clip-border px-2.5 duration-200">
                <div class="px-6 pt-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                    <div class="float-left">
                        <h5 class="mt-4 mb-0">Soft UI Configurator</h5>
                        <p>See our dashboard options.</p>
                    </div>
                    <div class="float-right mt-6">
                        <button fixed-plugin-close-button
                            class="inline-block p-0 mb-4 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 active:opacity-85 text-slate-700">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->
                </div>
                <hr
                    class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                <div class="flex-auto p-6 pt-0 sm:pt-4">
                    <!-- Sidebar Backgrounds -->
                    <div>
                        <h6 class="mb-0">Sidebar Colors</h6>
                    </div>
                    <a href="javascript:void(0)">
                        <div class="my-2 text-left" sidenav-colors>
                            <span
                                class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-purple-700 to-pink-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                active-color data-color-from="purple-700" data-color-to="pink-500"
                                onclick="sidebarColor(this)"></span>
                            <span
                                class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-gray-900 to-slate-800 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                data-color-from="gray-900" data-color-to="slate-800"
                                onclick="sidebarColor(this)"></span>
                            <span
                                class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-blue-600 to-cyan-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                data-color-from="blue-600" data-color-to="cyan-400"
                                onclick="sidebarColor(this)"></span>
                            <span
                                class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-green-600 to-lime-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                data-color-from="green-600" data-color-to="lime-400"
                                onclick="sidebarColor(this)"></span>
                            <span
                                class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-red-500 to-yellow-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                data-color-from="red-500" data-color-to="yellow-400"
                                onclick="sidebarColor(this)"></span>
                            <span
                                class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-red-600 to-rose-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
                                data-color-from="red-600" data-color-to="rose-400"
                                onclick="sidebarColor(this)"></span>
                        </div>
                    </a>
                    <!-- Sidenav Type -->
                    <div class="mt-4">
                        <h6 class="mb-0">Sidenav Type</h6>
                        <p class="leading-normal text-sm">Choose between 2 different sidenav types.</p>
                    </div>
                    <div class="flex">
                        <button transparent-style-btn
                            class="inline-block w-full px-4 py-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all border border-transparent border-solid rounded-lg cursor-pointer xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-purple-700 xl-max:to-pink-500 xl-max:text-white xl-max:border-0 hover:scale-102 hover:shadow-soft-xs active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-purple-700 to-pink-500 bg-fuchsia-500 hover:border-fuchsia-500"
                            data-class="bg-transparent" active-style>Transparent</button>
                        <button white-style-btn
                            class="inline-block w-full px-4 py-3 mb-2 ml-2 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg cursor-pointer xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-purple-700 xl-max:to-pink-500 xl-max:text-white xl-max:border-0 hover:scale-102 hover:shadow-soft-xs active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 border-fuchsia-500 bg-none text-fuchsia-500 hover:border-fuchsia-500"
                            data-class="bg-white">White</button>
                    </div>
                    <p class="block mt-2 leading-normal text-sm xl:hidden">You can change the sidenav type just on
                        desktop
                        view.</p>
                    <!-- Navbar Fixed -->
                    <div class="mt-4">
                        <h6 class="mb-0">Navbar Fixed</h6>
                    </div>
                    <div class="min-h-6 mb-0.5 block pl-0">
                        <input
                            class="rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right"
                            type="checkbox" navbarFixed />
                    </div>
                    <hr
                        class="h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent sm:my-6" />
                    <a class="inline-block w-full px-6 py-3 mb-4 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer leading-pro text-xs ease-soft-in hover:shadow-soft-xs hover:scale-102 active:opacity-85 tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800"
                        href="https://www.creative-tim.com/product/soft-ui-dashboard-tailwind" target="_blank">Free
                        Download</a>
                    <a class="inline-block w-full px-6 py-3 mb-4 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 border-slate-700 text-slate-700 hover:bg-transparent hover:text-slate-700 hover:shadow-none active:bg-slate-700 active:text-white active:hover:bg-transparent active:hover:text-slate-700 active:hover:shadow-none"
                        href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/soft-ui-dashboard/"
                        target="_blank">View documentation</a>
                    <div class="w-full text-center">
                        <a class="github-button"
                            href="https://github.com/creativetimofficial/soft-ui-dashboard-tailwind"
                            data-icon="octicon-star" data-size="large" data-show-count="true"
                            aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                        <h6 class="mt-4">Thank you for sharing!</h6>
                        <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20Tailwind%20made%20by%20%40CreativeTim%20&hashtags=webdesign,dashboard,tailwindcss&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard-tailwind"
                            class="inline-block px-6 py-3 mb-0 mr-2 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700"
                            target="_blank"> <i class="mr-1 fab fa-twitter" aria-hidden="true"></i> Tweet </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard-tailwind"
                            class="inline-block px-6 py-3 mb-0 mr-2 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700"
                            target="_blank"> <i class="mr-1 fab fa-facebook-square" aria-hidden="true"></i> Share
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
