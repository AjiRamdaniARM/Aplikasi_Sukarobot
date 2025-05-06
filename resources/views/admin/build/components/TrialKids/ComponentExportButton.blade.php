{{-- == modal export === --}}
<dialog id="modal_export">
    <h2 class="poppins-bold">Export Data Siswa Trial</h2>
    <div class="voucher-container-admin">
        <h6 class="voucher-title-admin">
           Silahkan pilih Fitur export yang akan dipakai<span></span></h6>
    </div>

    {{-- === component button export Semua data === --}}
    <div class="voucher-code-container-admin">
        <h6 class="voucher-code-title-admin">Export Semua data siswa trial</h6>
        <button onclick="window.location.href='{{ route('export.pdf.trial')}}'" class="voucher-input text-white "
            style="background-color: #904913">Laporan PDF</button>
    </div>

    {{-- === component button export data per tanggal === --}}
    <div class="voucher-code-container-admin">
        <h6 class="voucher-code-title-admin">Export data siswa trial per tanggal</h6>
        <form action="{{ route('export.pdf.trial')}}" method="GET">
            @csrf
            @method('GET')
            <input type="month" name="filter" class="voucher-input px-4 border" required>
            <button type="submit" class="voucher-input text-white" style="background-color: #989500">
                Laporan PDF
            </button>
        </form>
        
    </div>
    <button onclick="window.modal_export.close();" aria-label="close"
        class="x">❌</button>
</dialog>


