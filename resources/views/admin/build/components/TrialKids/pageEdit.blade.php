<x-app-layout>
    <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
        @include('admin.build.components.sidenav')
        @include('modalSekolah')
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            <!-- ==== Navbar ==== -->
            @include('admin.build.components.navbar')
            
            <!-- ==== Content ==== -->
            <div class="w-full px-6 py-6 mx-auto">
                <!-- ==== Title ==== -->
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-800">Edit Data Trial</h2>
                        <button onclick="window.history.back()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-all duration-150 ease-in-out">
                            Kembali
                        </button>
                    </div>
                </div>

                <!-- Alert Messages -->
                <div id="alert-success" class="hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span id="success-message" class="block sm:inline"></span>
                </div>
                <div id="alert-error" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span id="error-message" class="block sm:inline"></span>
                </div>

                <!-- ==== Form Card ==== -->
                <div class="flex flex-wrap -mx-3 mt-6">
                    <div class="w-full max-w-full px-3">
                        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="p-6">
                                <form id="updateForm" onsubmit="submitForm(event)" method="POST">
                                    @csrf
                                    @method('POST')
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Nama Siswa -->
                                        <div class="mb-4">
                                            <label for="nama_siswa" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap Anak</label>
                                            <input type="text" name="nama_siswa" id="nama_siswa" value="{{ $siswaTrial->nama_siswa }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-150 ease-in-out"
                                                required>
                                            <span class="error-message text-red-500 text-sm"></span>
                                        </div>

                                        <!-- Usia -->
                                        <div class="mb-4">
                                            <label for="usia_anak" class="block text-sm font-medium text-gray-700 mb-2">Usia Anak</label>
                                            <input type="number" name="usia_anak" id="usia_anak" value="{{ $siswaTrial->usia_anak }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-150 ease-in-out"
                                                required>
                                            <span class="error-message text-red-500 text-sm"></span>
                                        </div>

                                        <!-- Nama Ortu -->
                                        <div class="mb-4">
                                            <label for="nama_ortu" class="block text-sm font-medium text-gray-700 mb-2">Nama Orang Tua</label>
                                            <input type="text" name="nama_ortu" id="nama_ortu" value="{{ $siswaTrial->nama_ortu }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-150 ease-in-out"
                                                required>
                                            <span class="error-message text-red-500 text-sm"></span>
                                        </div>

                                        <!-- No HP -->
                                        <div class="mb-4">
                                            <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-2">No Handphone</label>
                                            <input type="text" name="no_hp" id="no_hp" value="{{ $siswaTrial->no_hp }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-150 ease-in-out"
                                                required>
                                            <span class="error-message text-red-500 text-sm"></span>
                                        </div>

                                        <!-- Sekolah -->
                                        <div class="mb-4">
                                            <label for="id_sekolah" class="block text-sm font-medium text-gray-700 mb-2">Sekolah</label>
                                            <select name="id_sekolah" id="id_sekolah"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-150 ease-in-out"
                                                required>
                                                @foreach($sekolahList as $sekolah)
                                                    <option value="{{ $sekolah->id_sekolah }}" {{ $siswaTrial->id_sekolah == $sekolah->id_sekolah ? 'selected' : '' }}>
                                                        {{ $sekolah->sekolah }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error-message text-red-500 text-sm"></span>
                                        </div>

                                        <!-- Program -->
                                        <div class="mb-4">
                                            <label for="id_program" class="block text-sm font-medium text-gray-700 mb-2">Program</label>
                                            <select name="id_program" id="id_program"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-150 ease-in-out"
                                                required>
                                                @foreach($programList as $program)
                                                    <option value="{{ $program->id }}" {{ $siswaTrial->id_program == $program->id ? 'selected' : '' }}>
                                                        {{ $program->program }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error-message text-red-500 text-sm"></span>
                                        </div>
                                    </div>

                                    <!-- Alamat -->
                                    <div class="mb-6">
                                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                                        <textarea name="alamat" id="alamat" rows="3"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-150 ease-in-out"
                                            required>{{ $siswaTrial->alamat }}</textarea>
                                        <span class="error-message text-red-500 text-sm"></span>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="flex justify-end space-x-4">
                                        <button type="submit" id="submitBtn"
                                            class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all duration-150 ease-in-out shadow-md hover:shadow-lg">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            function submitForm(event) {
                event.preventDefault();
                
                // Reset error messages
                document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
                document.getElementById('alert-success').classList.add('hidden');
                document.getElementById('alert-error').classList.add('hidden');

                // Disable submit button
                const submitBtn = document.getElementById('submitBtn');
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Menyimpan...';

                // Get form data
                const formData = new FormData(event.target);
                const data = Object.fromEntries(formData.entries());

                // Add CSRF token to data
                data._token = document.querySelector('meta[name="csrf-token"]').content;

                // Send AJAX request
                fetch(`/menu/siswaTrial/update/{{ $siswaTrial->id }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(result => {
                    if (result.status === 'success') {
                        // Show success message
                        document.getElementById('success-message').textContent = result.message;
                        document.getElementById('alert-success').classList.remove('hidden');
                        
                        // Redirect after 2 seconds
                        setTimeout(() => {
                            window.location.href = '{{route('menu.siswaTrial')}}';
                        }, 2000);
                    } else {
                        // Show error message
                        document.getElementById('error-message').textContent = result.message;
                        document.getElementById('alert-error').classList.remove('hidden');
                        
                        // Show validation errors if any
                        if (result.errors) {
                            Object.keys(result.errors).forEach(field => {
                                const errorElement = document.querySelector(`[name="${field}"]`).nextElementSibling;
                                if (errorElement) {
                                    errorElement.textContent = result.errors[field][0];
                                }
                            });
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('error-message').textContent = 'Terjadi kesalahan saat memperbarui data';
                    document.getElementById('alert-error').classList.remove('hidden');
                })
                .finally(() => {
                    // Re-enable submit button
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Simpan Perubahan';
                });
            }
        </script>
    </body>
</x-app-layout>
