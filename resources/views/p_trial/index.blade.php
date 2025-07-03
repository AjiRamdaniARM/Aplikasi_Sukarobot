<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('asset_p_trial/css/styles.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('asset_p_trial/css/style_2.css') }}">
</head>
<body>

  <header class="header">
    <div class="header-content">
      <h1></h1>
    </div>
  </header>

  <main>
    <div class="container">
      <section class="description-container">
        <h2 class="highlighted-text">Ayo Daftar Trial Class Sukarobot Academy!</h2>
        <p class="single-line-text">
          Berikan kesempatan bagi anak Anda untuk mengeksplorasi dunia teknologi! Pada program ini peserta dapat memilih untuk mengikuti program: Robotic, Coding for Kids, Graphic Design, Digital Marketing, dan Web Programming. Daftar sekarang untuk mendapatkan kuota trial class!
        </p>
      </section>
    </div>
  </main>

  <form action="{{route('store.trial')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="nama-anak">Nama Anak <span style="color: red;">*</span></label>
      <input type="text" id="nama_siswa" name="nama_siswa"  value="{{ old('nama_siswa') }}" required>
        @error('nama_siswa')
          <div style="background: rgb(255, 85, 85); color: white; padding: 5px;" class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
      <label for="usia-anak">Usia Anak <span style="color: red;">*</span></label>
      <input type="number" id="usia_anak" name="usia_anak" required>
        @error('usia_anak')
          <div style="background: rgb(255, 85, 85); color: white; padding: 5px;" class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
      <label for="sekolah">Pilih Sekolah <span style="color: red;">*</span></label>
      <select id="sekolah" name="sekolah" required>
        <option value="">Pilih Sekolah</option>
        @foreach ($getDataSekolah as $sekolah )
          <option value="{{ $sekolah->id_sekolah }}">{{ $sekolah->sekolah }}</option>
        @endforeach
      </select>
        @error('sekolah')
          <div style="background: rgb(255, 85, 85); color: white; padding: 5px;" class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
      <small style="display: block; margin-top: 5px; color: #666;">
        Jika sekolah anda tidak tercantum, silakan klik tombol <strong>"Tambah Sekolah"</strong>.
      </small>
      <button type="button" id="tambah-sekolah-button" style="margin-top: 10px;" onclick="window.location.href='{{ route('page.sekolah')}}'">Tambah Sekolah</button>
    </div>
     <div class="form-group">
            <label for="nama_ortu">Nama Orang Tua <span style="color: red;">*</span></label>
            <input type="text" id="nama_ortu" name="nama_ortu" value="{{ old('nama_ortu') }}" placeholder="Contoh: Budi Santoso" required>
            @error('nama_ortu')
                <div style="background: rgb(255, 85, 85); color: white; padding: 5px;" class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
     <div class="form-group">
            <label for="no_hp">No HP <span style="color: red;">*</span></label>
            <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="Contoh: 081234567890" required>
            @error('no_hp')
                <div style="background: rgb(255, 85, 85); color: white; padding: 5px;" class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

    <div class="form-group">
            <label for="alamat">Alamat <span style="color: red;">*</span></label>
            <textarea id="alamat" name="alamat" required placeholder="Contoh: Jl. Legok No.6, RT.4/RW.5, Sukaraja...">{{ old('alamat') }}</textarea>
            @error('alamat')
                <div style="background: rgb(255, 85, 85); color: white; padding: 5px;" class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
 <div class="form-group">
            <label for="kelas">Program <span style="color: red;">*</span></label>
            <select id="kelas" name="id_program" required>
                <option value="" disabled selected>Silahkan Pilih Program</option>
                @foreach ($getDataProgram as $program )
                    <option value="{{ $program->id }}" {{ old('kelas') == $program->program ? 'selected' : '' }}>
                        {{ $program->program }}
                    </option>
                @endforeach
            </select>
            @error('kelas')
                <div style="background: rgb(255, 85, 85); color: white; padding: 5px;" style="background: rgb(255, 85, 85); color: white; padding: 5px;" class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

    <div class="button-container">
      <button type="button" id="clear-form-button">Kosongkan Formulir</button>
      <button type="submit">Selanjutnya</button>
    </div>
  </form>

  <footer>
    <p class="copyright">&copy; 2025 Sukarobot Academy. Hak Cipta Dilindungi.</p>
    <div class="social-media">
      <h3 style="font-size: 16px;">Ikuti Kami di Media Sosial:</h3>
      <div class="social-icons">
        <a href="https://www.instagram.com/sukarobot.academy" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.sukarobot.com" target="_blank"><i class="fas fa-globe"></i></a>
        <a href="https://wa.me/6285795899901" target="_blank"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>
  </footer>

  

  <!-- Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const formFields = ['nama-anak', 'usia-anak', 'sekolah', 'nama-orang-tua', 'no-hp', 'alamat', 'kelas'];

      function saveData() {
        let formData = {};
        formFields.forEach(fieldId => {
          const field = document.getElementById(fieldId);
          if (field) {
            formData[fieldId] = field.value;
          }
        });
        localStorage.setItem('formData', JSON.stringify(formData));
      }

      function loadData() {
        const savedData = localStorage.getItem('formData');
        if (savedData) {
          const formData = JSON.parse(savedData);
          formFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field && formData[fieldId]) {
              field.value = formData[fieldId];
            }
          });
        }
      }

      formFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
          field.addEventListener('input', saveData);
        }
      });

      loadData();

      document.getElementById('clear-form-button').addEventListener('click', function () {
        localStorage.removeItem('formData');
        formFields.forEach(fieldId => {
          const field = document.getElementById(fieldId);
          if (field) {
            field.value = '';
          }
        });
      });
    });

    function showAddSchoolInput() {
      document.getElementById('modalTambahSekolah').style.display = 'flex';
    }

    function closeModal() {
      document.getElementById('modalTambahSekolah').style.display = 'none';
    }

    window.onclick = function(event) {
      const modal = document.getElementById('modalTambahSekolah');
      if (event.target === modal) {
        closeModal();
      }
    }
    function sendData(event) {
      event.preventDefault();
      alert('Data berhasil disimpan sementara. Lanjut ke halaman berikutnya.');
      // window.location.href = 'preview.html'; // Aktifkan jika ingin redirect
    }
  </script>

</body>
</html>
