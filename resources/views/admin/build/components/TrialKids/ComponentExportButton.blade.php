<dialog id="modal_export">
    <h2 class="poppins-bold">Export Data Siswa Trial</h2>
    <div class="voucher-container-admin">
        <h6 class="voucher-title-admin">
           Silahkan pilih Fitur export yang akan dipakai<span></span></h6>
    </div>

    {{-- === component button export Semua data === --}}
    <div class="voucher-code-container-admin">
        <h6 class="voucher-code-title-admin">Export Semua data siswa trial</h6>
        <button class="voucher-input text-white "
            style="background-color: #904913">Laporan Excel</button>
    </div>

    {{-- === component button export data siswa lanjut === --}}
    {{-- <div class="voucher-code-container-admin">
        <h6 class="voucher-code-title-admin">Export data siswa trial Lanjut</h6>
        <button class="voucher-input text-white "
            style="background-color: #008f18">Laporan Excel</button>
    </div> --}}

    {{-- === component button export data siswa lanjut === --}}
    {{-- <div class="voucher-code-container-admin">
        <h6 class="voucher-code-title-admin">Export data siswa trial tidak Lanjut</h6>
        <button class="voucher-input text-white "
            style="background-color: #980000">Laporan Excel</button>
    </div> --}}


    {{-- === component button export data per tanggal === --}}
    <div class="voucher-code-container-admin">
        <h6 class="voucher-code-title-admin">Export data siswa trial per tanggal</h6>
        <button class="voucher-input text-white "
            style="background-color: #989500">Laporan Excel</button>
    </div>
    

    <button onclick="window.modal_export.close();" aria-label="close"
        class="x">❌</button>
</dialog>
