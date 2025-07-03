@extends('layout.main')
@section('children')
    @include('modalSekolah')
    @include('components.scriptCompoments')
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">
                    <div class="flex flex-col md:flex-row items-center space-x-5">
                       <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
                        <dotlottie-player src="https://lottie.host/96edd37e-68ef-457c-ab49-305a098a85e5/71K4VvngnZ.lottie" background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay></dotlottie-player>
                    </div>
                    @if (session('success'))
                        <div class="flex w-96 shadow-lg rounded-lg">
                            <div class="bg-green-600 py-4 px-6 rounded-l-lg flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white fill-current" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path></svg>
                            </div>
                            <div class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
                            <div>{{ session('success') }}</div>
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-700" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path></svg>
                            </button>
                            </div>
                        </div>
                    @endif
                    @include('components.loadingElement')
                    <form action="{{ route('add.school')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">  
                                <div class="flex flex-col">
                                    <label class="leading-loose">Nama Sekolah <span class="text-red-600">*</span></label>
                                    <input type="text"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                         name="sekolah"
                                        value="{{ old('nama_lengkap') }}" required>
                                    @error('nama_lengkap')
                                        <div class="bg-red-100 mt-2 border border-red-400 text-red-700 px-4 py-3 text-[15px] rounded relative"
                                            role="alert">
                                            <strong class="font-bold">Kesalahan !! </strong>
                                            <span class="block sm:inline">{{ $message }}</span>

                                        </div>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="pt-4 flex items-center space-x-4">

                                <button
                                    class="button relative z-0 bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none hover:scale-105 transition-all focus:scale-105"
                                    type="submit" id="submit">Tambah Sekolah
                                    <div class="arrow-wrapper">
                                        <div class="arrow"></div>

                                    </div>
                                </button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
