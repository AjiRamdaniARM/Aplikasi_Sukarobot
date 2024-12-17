<dialog id="modal-laporan-detail-{{ $key->id_schedules }}">
    <div class="content-judul flex flex-col text-center w-full">
        <h2 class="lg:text-[30px] text-[20px] poppins-bold">Detail Mengajar</h2>
        <p class="-mt-6 lg:text-[15px] text-[10px] text-gray-600 poppins-regular">Detail lengkap mengajar trainer sukarobot academy</p>
    </div>
    <div class="body-content">
        <div class="content-body">
            <div class="bg-[#F4F4F7] w-full lg:px-10 px-5 py-5 rounded-[16px]">
                <div class="content-body flex gap-3">
                    <img src="{{ asset('assets/imgmodal/ICON-FOLDER.svg') }}" class="w-20" alt="icon-folder-svg">
                    <div class="text-body"> 
                        <h1 class="poppins-semibold lg:text-2xl text-1xl">Absensi Anda Pada :</h1>
                        <p class="poppins-regular">{{ $key->tanggal_jd ? \Carbon\Carbon::parse($key->tanggal_jd)->translatedFormat('d F Y') : '-' }}</p>
                    </div>
                </div>
                <div class="content-flex flex gap-3 mt-3">
                    <div class="bg-[#FFDBD8] rounded-[16px] text-center px-4 py-2 poppins-regular">
                        {{ $key->kelas_name }}
                    </div>
                    <div class="bg-[#F0DAFB] rounded-[16px] text-center px-4 py-2 poppins-regular">
                        {{ $key->level_name }}
                    </div>
                    <div class="bg-[#CBE3FF] rounded-[16px] text-center px-4 py-2 poppins-regular">
                        {{ \Carbon\Carbon::parse($key->jam_lp)->format('H:i') }}
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class="list-content">
                    <h6 class="text-start poppins-semibold">Laporan Absensi</h6>
                    <br>
                    <textarea class="p-5 w-full lg:rounded-[24px] rounded-lg bg-gray-100 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" readonly name="textArea" id="textArea">{{ $key->catatan }}</textarea>
                    <hr class="border-t border-gray-300 my-4">
                    <button 
                        id="button-absensi-siswa" 
                        class="w-full btn-fetch poppins-regular px-5 py-3 text-center bg-[#CBE3FF] hover:bg-[#7CB7F9FF] rounded-[16px] transition-all" 
                        data-schedule-id="{{ $key->id_schedules }}">
                        Lihat Absensi Anak
                    </button>
                    <div id="siswa-list"></div>
          
                </div>
            </div>
        </div>
    </div>
    <button onclick="document.getElementById('modal-laporan-detail-{{ $key->id_schedules }}').close();" aria-label="close" class="x">❌</button>
</dialog>

{{-- === Script JavaScript === --}}
<script src="https://cdn.jsdelivr.net/npm/dompurify@2.3.4/dist/purify.min.js"></script>
<script>
    let siswaData = [
        { nama: "John Doe", sekolah: "SD MUHAMMAD AL UNAIZY", status: "Hadir", id_schedule: 118 },
        { nama: "Jane Smith", sekolah: "SD SUKARO", status: "Alpha", id_schedule: 118 },
        { nama: "Alice Brown", sekolah: "SD MUHAMMAD AL UNAIZY", status: "Hadir", id_schedule: 118 },
    ];


    document.addEventListener("DOMContentLoaded", function () {
    let tombolAbsensi = document.getElementById("button-absensi-siswa");

    tombolAbsensi.addEventListener("click", function () {
        let idSchedule = tombolAbsensi.getAttribute("data-schedule-id");
        fetch(`/fetchSiswa`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                let siswaList = document.getElementById('siswa-list');
                siswaList.innerHTML = ''; 
                if (data.length === 0) {
                    siswaList.innerHTML = '<p class="text-gray-500">Tidak ada data siswa.</p>';
                } else {
                    // Tambahkan siswa ke dalam daftar
                    data.forEach(siswa => {
                        let item = document.createElement('div');
item.classList.add(
    'poppins-regular', 
    'py-4', 
    'px-6', 
    'bg-white', 
    'rounded-lg', 
    'shadow-md', 
    'border', 
    'mb-4'
);

// Tambahkan konten card
item.innerHTML = `
    <div class="text-lg font-semibold text-gray-800">${siswa.nama_lengkap}</div>
    <div class="text-sm text-gray-600">Kelas: ${siswa.kelas}</div>
`;

// Sisipkan ke dalam parent element
siswaList.appendChild(item);

                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                let siswaList = document.getElementById('siswa-list');
                siswaList.innerHTML = '<p class="text-red-500">Gagal memuat data siswa. Silakan coba lagi.</p>';
            });
    });
});


    // document.addEventListener("DOMContentLoaded", function () {
    //     let tombolAbsensi = document.querySelectorAll("[id^='button-absensi-siswa-']");
    //     tombolAbsensi.forEach(function (tombol) {
    //         tombol.addEventListener("click", function () {
    //             let idSchedules = tombol.getAttribute("data-schedule-id");
    //             let hasil = document.getElementById(`view-data-${idSchedules}`);

    //             if (hasil) {
    //                 let siswaBySchedule = siswaData.filter(siswa => siswa.id_schedule == idSchedules);
    //                 let siswaHTML = siswaBySchedule.map(siswa => `
    //                     <div class='card-siswa-custom-one flex justify-between items-center py-5'>
    //                         <div class='profile-component flex items-center gap-5'>
    //                             <div class='w-8 h-8 bg-blue-500 rounded-full'></div>
    //                             <div class='nama-siswa poppins-semibold '>
    //                                 <h6>${siswa.nama}</h6>
    //                                 <p class='text-[12px] -mt-3 poppins-regular'>${siswa.sekolah}</p>
    //                             </div>
    //                         </div>
    //                         <div class='container-b-absen px-5 py-2 rounded-[16px] bg-[#60A5FA]'>
    //                             <h6>${siswa.status}</h6>
    //                         </div>
    //                     </div>`).join("");
    //                 hasil.innerHTML = siswaHTML || `<p class="text-gray-500">Tidak ada data siswa untuk jadwal ini.</p>`;
    //             }
    //         });
    //     });
    // });
</script>


{{-- === internal css === --}}
<style>
    dialog {
        padding: 1rem 3rem;
        background: white;
        max-width: 100%;
        padding-top: 2rem;
        border: 0;
        border-radius: 24px;
        box-shadow: 0 5px 30px 0 rgb(0 0 0 / 10%);
        animation: fadeIn 1s ease both;
        &::backdrop {
            animation: fadeIn 1s ease both;
            background: rgb(255 255 255 / 40%);
            z-index: 2;
            backdrop-filter: blur(20px);
        }
        .x {
            filter: grayscale(1);
            border: none;
            background: none;
            position: absolute;
            top: 15px;
            right: 10px;
            transition: ease filter, transform 0.3s;
            cursor: pointer;
            transform-origin: center;
            &:hover {
                filter: grayscale(0);
                transform: scale(1.1);
            }
        }
        h2 {
            font-weight: 600;
            font-size: 2rem;
            padding-bottom: 1rem;
        }
        p {
            font-size: 1rem;
            line-height: 1.3rem;
            padding: 0.5rem 0;
            a {
                &:visited {
                    color: rgb(var(--vs-primary));
                }
            }
        }
    }

    button.primary {
        display: inline-block;
        font-size: 0.8rem;
        color: #fff !important;
        background: rgb(var(--vs-primary) / 100%);
        padding: 13px 25px;
        border-radius: 17px;
        transition: background-color 0.1s ease;
        box-sizing: border-box;
        transition: all 0.25s ease;
        border: 0;
        cursor: pointer;
        box-shadow: 0 10px 20px -10px rgb(var(--vs-primary) / 50%);
        &:hover {
            box-shadow: 0 20px 20px -10px rgb(var(--vs-primary) / 50%);
            transform: translateY(-5px);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

</style>