<table
class="items-center justify-center w-full mb-0 align-top border-gray-200 text-slate-500">
<thead class="align-bottom">
    <tr>
        <th
            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
            <input type="checkbox" id="selectAll" onclick="toggleAllStudents(this)"> Nama Lengkap Anak</th>
        <th
            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
            Usia Anak</th>
        <th
            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
            Sekolah</th>
        <th
            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
            Nama Orang tua </th>
        <th
            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
            No Handphone </th>
        <th
            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
            Alamat </th>
        <th
            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
            Pilihan Kelas </th>
        <th
            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
            Tanggal Masuk Trial </th>
            <th
            class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
            Aksi</th>

    </tr>
</thead>
<tbody>
    {{-- === components contoh isi table ===  --}}
    @foreach ($getDataSiswaTrial as $siswaTrial )
    <tr style="background-color: {{ $siswaTrial->status === 'aktif' ? 'rgb(204, 255, 204)' : 'white' }};">
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                        @if ($siswaTrial->status === 'trial')
                            <input type="checkbox" 
                                   class="student-checkbox" 
                                   name="siswa_id[]" 
                                   value="{{ $siswaTrial->id_trials }}"
                                   onchange="updateSelectedStudents(this)">
                        @endif
                        &nbsp; {{$siswaTrial->nama_siswa}}
                    </h6>
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                        {{ $siswaTrial->usia_anak }} Tahun
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                    {{ $siswaTrial->nama_sekolah }}
                    </h6>
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                        {{ $siswaTrial->nama_ortu}}
                    </h6>
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                        {{ $siswaTrial->no_hp}}
                    </h6>
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                       {{ $siswaTrial->alamat}}
                    </h6>
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                        {{ $siswaTrial->program}}
                    </h6>
                </div>
            </div>
        </td>
        <td
        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                        @php
                            $tanggal = \Carbon\Carbon::parse($siswaTrial->jadwal);
                            $jam24 = (int) $tanggal->format('H');
                            $ampm = $jam24 < 12 ? 'pagi' : ($jam24 < 18 ? 'siang' : 'malam');
                        @endphp
                        {{ $tanggal->translatedFormat('d F Y') }}, {{ $tanggal->format('H:i:s') }} {{ $ampm }}
                    </h6>                    
                </div>
            </div>
        </td>
        {{-- ==== table button crud === --}}
        @if ($siswaTrial->status === 'trial')
            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                <div class="flex px-4 mx-auto">
                    <div class="my-auto">
                    {{-- === component button crud === --}}
                    <button onclick="window.location.href='{{ url('dataTrial/Edit', $siswaTrial->id_trials)}}'" style="
                    background-color: rgb(175, 255, 175);
                    padding-left: 10px;
                    padding-right:10px;
                    color:black;
                    ">Edit</button>
                    <button href="#"
                    onclick="if (confirm('Yakin ingin menghapus data ini?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $siswaTrial->id_trials }}').submit();
                    }"
                    style="background-color: rgb(255, 175, 175); padding-left: 10px; padding-right:10px; color:black; text-decoration: none; cursor: pointer;">
                    Delete
                        </button>
                        
                        <form id="delete-form-{{ $siswaTrial->id_trials }}" action="{{ route('menu.siswaTrial.delete', ['id' => $siswaTrial->id_trials]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                            {{-- === component button aprove === --}}
                            <form action="{{ route('menu.siswaTrial.lanjut', ['id_trials' => $siswaTrial->id_trials]) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" style="
                                background-color: rgb(175, 255, 175);
                                padding-left: 10px;
                                padding-right:10px;
                                color:black;
                                ">Lanjut</button>
                            </form>
                            {{-- === end component button approve --}}
                    {{-- === end component button crud --}}
                    </div>
                </div>
            </td>
        @else
            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                <div class="flex px-4 mx-auto">
                    <div class="my-auto">
                        <h6 class="mb-0 text-sm leading-normal">
                            <button>Data Sudah Terkirim</button>
                        </h6>
                    </div>
                </div>
            </td>
        @endif
    </tr>
    @endforeach
   

</tbody>

</table>