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
        <button onclick="window.location.href='{{ route('export.pdf.trial')}}'"  class="voucher-input text-white "
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

{{-- === modal kelas === --}}
    @if($getDataSiswaTrial && $getDataSiswaTrial->count())
    @foreach ($getDataSiswaTrial as $siswa)
    <dialog id="modal_kelas{{ $siswa->id_trials }}">
        <h2 class="poppins-bold">Pilih Kelas untuk {{ $siswa->nama_siswa }}</h2>
        {{-- === component button export data per tanggal === --}}
        <div class="voucher-code-container-admin">
            <h6 class="voucher-code-title-admin">Pilih kelas siswa terlebih dahulu</h6>
            <form  action="{{ route('menu.siswaTrial.lanjut', ['id_trials' => $siswa->id_trials]) }}" method="POST" >
                @csrf
                <select class="voucher-input px-4 border" name="kelas_siswa" id="kelas_siswa" required>
                    <option value="">Pilih Kelas</option>
                    @foreach ($getDataKelas as $kelas )
                        <option value="{{ $kelas->id}}">{{ $kelas->kelas}}</option>
                    @endforeach
                </select>
                <button type="submit" class="voucher-input text-white"  style="background-color: #be7f00">
                    Lanjut
                </button>
            </form>
        </div>
        <button onclick="window.modal_kelas{{ $siswa->id_trials }}.close();" aria-label="close"
            class="x">❌</button>
        </dialog>
    @endforeach
    @endif

    {{-- === modal kelas all === --}}
    <dialog id="modal_kelas_all">
    <div class="voucher-code-container-admin">
        <h6 class="voucher-code-title-admin">Pilih kelas siswa terlebih dahulu</h6>
        <form id="formKelasSiswa" action="{{ route('menu.siswaTrial.lanjutAll') }}" method="POST">
            @csrf
            <select class="voucher-input px-4 border" name="kelas_siswa" id="kelas_siswa" required>
                <option value="">Pilih Kelas</option>
                @foreach ($getDataKelas as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                @endforeach
            </select>

            {{-- Input hidden siswa_id[] hasil dari checkbox yang dipilih --}}
            <div id="siswa_id_inputs"></div>

            <button type="button" onclick="submitForm()" class="voucher-input text-white" style="background-color: #be7f00">
                Lanjut
            </button>
        </form>
    </div>
    <button onclick="window.modal_kelas.close();" aria-label="close" class="x">❌</button>
</dialog>


   <script>
function submitForm() {
    const form = document.getElementById('formKelasSiswa');
    const checkedBoxes = document.querySelectorAll('input[name="siswa_id[]"]:checked');
    const siswaIds = Array.from(checkedBoxes).map(cb => cb.value);

    // Kosongkan input hidden sebelumnya
    const hiddenInputsContainer = document.getElementById('siswa_id_inputs');
    hiddenInputsContainer.innerHTML = '';

    // Tambahkan input hidden untuk setiap siswa_id[]
    siswaIds.forEach(id => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'siswa_id[]';
        input.value = id;
        hiddenInputsContainer.appendChild(input);
    });

    // Submit form
    form.submit();
}
</script>

    <script>
        function bukaModal(el) {
        let id = el.getAttribute('data-id');
        document.getElementById('modal-content').innerText = "Isi modal untuk ID " + id;
        document.getElementById('modal_kelas').showModal();
        }
    </script>