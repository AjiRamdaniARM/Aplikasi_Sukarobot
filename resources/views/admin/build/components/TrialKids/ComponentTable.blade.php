<table
class="items-center justify-center w-full mb-0 align-top border-gray-200 text-slate-500">
<thead class="align-bottom">
    <tr>
        <th
            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
            Nama Lengkap Anak</th>
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
            Aksi</th>

    </tr>
</thead>
<tbody>
    {{-- === components contoh isi table ===  --}}
    <tr>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                        <input type="checkbox" id="check" name="check">
                      &nbsp; Aji Ramdani
                    </h6>
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                        12 Tahun
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                    Smk Terpadu Ibaddurrahman
                    </h6>
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                        Kevin Julio
                    </h6>
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                        089508742700
                    </h6>
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                        Jl. Kp. Sampora
                        Kec. Cibinong, Kabupaten Bogor, Jawa Barat
                    </h6>
                </div>
            </div>
        </td>
        <td
            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
            <div class="flex px-4 mx-auto">
                <div class="my-auto">
                    <h6 class="mb-0 text-sm leading-normal">
                    Web Programming
                    </h6>
                </div>
            </div>
        </td>
        {{-- ==== table button crud === --}}
        <td
        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
        <div class="flex px-4 mx-auto">
            <div class="my-auto">
               {{-- === component button crud === --}}
               <button style="
               background-color: rgb(175, 255, 175);
               padding-left: 10px;
               padding-right:10px;
               color:black;
               ">Edit</button>
               <button  style="
               background-color: rgb(255, 175, 175);
               padding-left: 10px;
               padding-right:10px;
               color:black;
               ">Delete</button>
                    {{-- === component button aprove === --}}
                    <button style="
                    background-color: rgb(175, 255, 175);
                    padding-left: 10px;
                    padding-right:10px;
                    color:black;
                    ">Lanjut</button>
                    {{-- === end component button approve --}}
               {{-- === end component button crud --}}
            </div>
        </div>
    </td>
    </tr>

</tbody>

</table>