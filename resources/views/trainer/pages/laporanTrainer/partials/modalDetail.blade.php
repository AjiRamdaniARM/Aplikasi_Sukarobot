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
                        <h1 class="poppins-semibold lg:text-2xl text-[15px]">Absensi Anda Pada :</h1>
                        <p class="poppins-regular lg:text-1xl text-[15px]">{{ $key->tanggal_jd ? \Carbon\Carbon::parse($key->tanggal_jd)->translatedFormat('d F Y') : '-' }}</p>
                    <a class="button-component bg-[#D0F8CB] px-1 poppins-regular hover:bg-[#9EF193FF] py-1" href="https://drive.google.com/drive/folders/1A0aYdsjjnuy6EVb5SQiHSjSfUoDdEfZT?usp=sharing">Dokumentasi</a>
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
                        id="button-absensi-siswa-{{ $key->id_schedules }}" 
                        class="w-full btn-fetch poppins-regular px-5 py-3 text-center bg-[#CBE3FF] hover:bg-[#7CB7F9FF] rounded-[16px] transition-all" 
                        data-schedule-id="{{ $key->id_schedules }}">
                        Lihat Absensi Anak
                    </button>
                    <div class="py-4" id="siswa-list-{{ $key->id_schedules }}"></div>
                </div>
            </div>
        </div>
    </div>
    <button onclick="document.getElementById('modal-laporan-detail-{{ $key->id_schedules }}').close();" aria-label="close" class="x">❌</button>
</dialog>

{{-- === Script JavaScript === --}}
<script src="https://cdn.jsdelivr.net/npm/dompurify@2.3.4/dist/purify.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Delegasi event pada parent
    document.body.addEventListener("click", function (event) {
        // Pastikan tombol yang diklik memiliki ID sesuai pola
        if (event.target && event.target.id.startsWith("button-absensi-siswa-")) {
            let tombolAbsensi = event.target;
            let idSchedule = tombolAbsensi.getAttribute("data-schedule-id");
            let siswaList = document.getElementById(`siswa-list-${idSchedule}`);
            siswaList.innerHTML = `
                <div class="text-center py-4 flex flex-col justify-center items-center">
                    <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-blue-500 border-opacity-50"></div>
                    <p class="text-gray-500 mt-2">Memuat data siswa...</p>
                </div>`;
            fetch(`/fetchSiswa?id=${idSchedule}`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((data) => {
                    siswaList.innerHTML = ""; 

                    if (data.length === 0) {
                        siswaList.innerHTML =
                            '<p class="text-gray-500">Tidak ada data siswa.</p>';
                    } else {
                        data.forEach((getDataStudent) => {
                            let item = document.createElement("div");
                            item.classList.add(
                                "poppins-regular",
                                "py-4",
                                "px-6",
                                "bg-white",
                                "rounded-lg",
                                "shadow-md",
                                "border",
                                "mb-4",
                                "flex",
                                "justify-between"
                            );
                            item.innerHTML = `
                                <div>
                                    <div class="text-lg font-semibold text-gray-800">${getDataStudent.nama_lengkap}</div>
                                    <div class="text-sm text-gray-600">Kelas: ${getDataStudent.kelas}</div>
                                </div>
                                <button class="bg-[#83DCFF] rounded-[16px] px-5 py-3">${getDataStudent.absensi_anak}</button>
                            `;
                            siswaList.appendChild(item);
                        });
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    siswaList.innerHTML =
                        '<p class="text-red-500">Gagal memuat data siswa. Silakan coba lagi.</p>';
                });
        }
    });
});

</script>


{{-- === internal css === --}}
<style>
    dialog {
        padding: 1rem 2rem;
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