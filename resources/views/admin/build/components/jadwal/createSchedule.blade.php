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
                <img src="{{ asset('assets/img/bannerSchdeulw.png') }}" class="w-full rounded-lg" alt="">
                <div class="form" style="padding-top:20px">
                    <form id="post" class="w-full max-w-lg" action="{{ route('schedule.post') }}" method="POST">
                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-6">
                            {{-- === input days ===  --}}
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Hari
                                </label>
                                <select name="hari" id="days" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jum'at">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                                {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
                            </div>

                            {{-- === input trainer ===  --}}
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Trainers
                                </label>
                                <select name="id_trainer" id="trainer" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">Pilih Trainer</option>
                                    @foreach ($getDataTrainer as $trainer)
                                        <option value="{{ $trainer->id }}">{{ $trainer->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="flex flex-wrap -mx-3 mb-6">

                            {{-- === input class ===  --}}
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Kelas Pembelajaran
                                </label>
                                <select name="id_kelas" id="class" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($getDataClass as $class)
                                        <option value="{{ $class->id }}">{{ $class->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>


                            {{-- === input sekolah ===  --}}
                            <div class="w-full md:w-1/2 px-3" style="display: none;">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Sekolah
                                </label>
                                <select name="id_sekolah" id="school"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">Pilih Sekolah</option>
                                    @foreach ($getDataSchool as $school)
                                        <option value="{{ $school->id_sekolah }}">{{ $school->sekolah }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>


                        <div class="flex flex-wrap -mx-3 mb-6">
                            {{-- === input program academy ===  --}}
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Program Pembelajaran
                                </label>
                                <select name="id_program" id="program" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">Pilih Program</option>
                                    @foreach ($getDataProgram as $program)
                                        <option value="{{ $program->id }}">{{ $program->program }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- === input level academy ===  --}}
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Level Pembelajaran
                                </label>
                                <select name="id_level" id="level" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">Pilih Level</option>
                                    @foreach ($getDataLevel as $level)
                                        <option value="{{ $level->id }}">{{ $level->levels }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


                        <div class="flex flex-wrap -mx-3 mb-6">
                            {{-- === input tools ===  --}}
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Alat
                                </label>
                                <select name="id_alat" id="alat" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">Pilih Alat</option>
                                    <option value="">Tidak Ada Alat</option>
                                    @foreach ($getDataTools as $tools)
                                        <option value="{{ $tools->id }}">{{ $tools->alat }}</option>
                                    @endforeach
                                </select>
                            </div>



                            {{-- === input pjclub ===  --}}
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Pj Eskul
                                </label>
                                <select name="pj_eskul" id="trainer" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">Pilih Pj Eskul</option>
                                    @foreach ($getDataTrainer as $trainer)
                                        <option value="{{ $trainer->nama }}">{{ $trainer->nama }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>


                        <div class="flex flex-wrap -mx-3 mb-6">

                            {{-- === input first teaching ===  --}}
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Awal Jam Mengajar
                                </label>
                                <input type="time" name="jm_awal" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>



                            {{-- === input final attendance deadline ===  --}}
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Deadline Absensi Trainer
                                </label>
                                <input type="number" placeholder="cth: 2 ( jam )" name="dj_akhir" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>

                        </div>


                        <div class="flex flex-wrap -mx-3 mb-6">


                            {{-- === input  teaching schedule date ===  --}}
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Tanggal Mengajar Trainer
                                </label>
                                <input type="date" name="tanggal_jd" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>

       
                                {{-- === input  api google maps ===  --}}
                                <div class="w-full md:w-1/2 px-3"  >
                                    <label class="block uppercase
                                    tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name"
                                    style="color: rgb(192, 109, 2)">
                                    api google maps ( optional)
                                    </label>
                                    <input type="text" name="api_maps"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        placeholder="link google maps">
                                </div>
    
               

                            {{-- === input early attendance deadline ===  --}}
                            {{-- <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                    for="grid-last-name" style="color: red">
                                    early attendance deadline ( fitur disabled)
                                </label>
                                <input type="timestamp"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    disabled>
                            </div> --}}
                            {{-- === fitur disabled === --}}



                        </div>


                        <div class="flex flex-wrap -mx-3 mb-6">
                            {{-- === input final hour of teaching ===  --}}
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Akhir Jam Mengajar
                                </label>
                                <input type="time" name="jm_akhir" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>

                            {{-- === input status schedule ===  --}}
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Status Jadwal
                                </label>
                                <select name="ket" id="status" required
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>

                        </div>

                        {{-- === input table siswa ===  --}}
                        <table class="w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Nama Siswa</th>
                                    <th class="px-4 py-2">Pilih</th>
                                </tr>
                            </thead>
                            <tbody id="siswa-table-body">
                                {{-- === isi table data siswa === --}}
                            </tbody>
                        </table>

                </div>

                <br>
                <button id="buttonSubmitLoading" type="submit"
                    class="bg-gradient-to-tl text-center from-blue-600 to-cyan-400 font-bold text-white w-full hover:scale-102 rounded "
                    style="height: 50px;">Buat Jadwal</button>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                        let form = document.querySelector("form"); // Gantilah jika form memiliki ID spesifik
                        let button = document.getElementById("buttonSubmitLoading");

                        form.addEventListener("submit", function () {
                            let originalText = button.innerHTML;

                            // Ubah teks tombol menjadi "Loading..." dan tambahkan efek loading
                            button.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Loading...';
                            button.disabled = true;

                            // Tunggu submit selesai
                            setTimeout(() => {
                                button.innerHTML = originalText;
                                button.disabled = false;
                            }, 5000); // Opsional, jika ingin mengembalikan teks setelah beberapa waktu (bisa dihapus)
                        });
                    });

                    </script>
                </form>
            </div>
            </div>
        </main>

    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const schoolSelect = document.getElementById('school');
            const siswaTableBody = document.getElementById('siswa-table-body');
            const allSiswa = @json($getDataSiswa);

            schoolSelect.addEventListener('change', function() {
                const selectedSchoolId = this.value;
                siswaTableBody.innerHTML = '';

                const filteredSiswa = allSiswa.filter(siswa => siswa.id_sekolah == selectedSchoolId);

                filteredSiswa.forEach(siswa => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                <td class="border px-4 py-2">${siswa.nama_lengkap}</td>
                <td class="border px-4 py-2 text-center">
                    <input type="checkbox" name="id_siswa[]" value="${siswa.id}" class="form-checkbox h-5 w-5 text-blue-600" >
                </td>
            `;
                    siswaTableBody.appendChild(row);
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const classSelect = document.getElementById('class');
            const schoolSelect = document.getElementById('school');
            const siswaTableBody = document.getElementById('siswa-table-body');
            const allSiswa = @json($getDataSiswa);

            classSelect.addEventListener('change', function() {
                const selectedClass = classSelect.options[classSelect.selectedIndex].text;

                if (selectedClass.toLowerCase() === 'club') {
                    schoolSelect.parentElement.style.display = 'block';
                    schoolSelect.required = true;
                } else {
                    schoolSelect.parentElement.style.display = 'none';
                    schoolSelect.required = false;
                }

                const selectedSchoolId = this.value;
                siswaTableBody.innerHTML = '';

                const filteredSiswa = allSiswa.filter(siswa => siswa.id_kelas == selectedSchoolId);

                filteredSiswa.forEach(siswa => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                <td class="border px-4 py-2">${siswa.nama_lengkap}</td>
                <td class="border px-4 py-2 text-center">
                    <input type="checkbox" name="id_siswa[]" value="${siswa.id}" class="form-checkbox h-5 w-5 text-blue-600" >
                </td>
            `;
                    siswaTableBody.appendChild(row);
                });
            });

            // Trigger change event to set initial state on page load
            classSelect.dispatchEvent(new Event('change'));
        });

        document.getElementById('post').addEventListener('submit', function(event) {
            var checkboxes = document.querySelectorAll('input[name="id_siswa[]"]');
            var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);

            if (!checkedOne) {
                alert('Harap pilih setidaknya satu siswa.');
                event.preventDefault();
            }
        });
    </script>
</x-app-layout>
