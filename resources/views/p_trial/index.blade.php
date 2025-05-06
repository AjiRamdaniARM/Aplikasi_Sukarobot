<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('asset_p_trial/css/styles.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    :root {
        --primary-blue: #045A70;
        --primary-orange: #DE7528;
        --button-yellow: #FFB200;
        --transition: all 0.3s ease;
        --bg-gradient: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
        --card-bg: rgba(255, 255, 255, 0.95);
    }

    footer p { color: black; }
    body {
        font-family: sans-serif;
        font-size: 16px;
        display: flex;
        flex-direction: column;
        align-items: stretch;
        justify-content: flex-start; 
        min-height: 100vh;
        margin: 0; 
        text-align: center;    
        background: var(--bg-gradient);    
    }

    .header {    
    background-image: url('asset_p_trial/img/header trial class.png');
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    color: white;
    text-align: center;
    padding: 80px 0; 
    width: 45%; 
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 10px;
    height: auto; 
    position: relative;
}

.header-content {
    max-width: 1200px; 
    padding: 0 20px;
    width: 100%;
    text-align: left;
    z-index: 1;
}

/* Tampilan Tablet */
@media screen and (max-width: 1024px) and (min-width: 601px) {
    .header {
        width: 89%;
        padding: 80px 0;  
        min-height: 10px; 
    }
}

/* Tampilan HP */
@media screen and (max-width: 600px) {
    .header {
        width: 88%; 
        padding: 30px 0; 
        min-height: 18px; 
    }
}


    .header-content {
        max-width: 1200px; 
        padding: 0 20px;
        width: 100%;
        text-align: left;
        z-index: 1;
    }

    .container {
        max-width: 800px; 
        margin: 0 auto;
        padding: 0 20px;
        margin-top: 10px;
    }

    .description-container {
        background-color: var(--card-bg);
        padding: 20px; 
        border-radius: 10px;
        margin-bottom: 20px; 
        text-align: left;
    }
   
   .description-container h2 {
      font-size: 1.9rem;
      color: var(--primary-blue);
      margin-bottom: 0;
      margin-top: 0px;
      text-align: center;
    }
    
    .description-container p {
      margin-top: 0.25rem;
      margin: 5px 0;
      margin-top: 20px;
    }

    .description-container h2 span {
        margin: 5px 0; 
    }

    /* Aturan untuk layar tablet */
@media (max-width: 1024px) and (min-width: 680px) {
    .container {
        max-width: 90%; 
        padding: 0 20px;
    }

    .description-container {
        max-width: 90%; 
        padding: 30px; 
    }

    .header-content {
        max-width: 90%;
        padding: 0 20px;
    }
}


    .program-list { 
        list-style-type: none; 
        padding: 0; 
        
    }

    .program-list li {
        font-size: 1.2rem;
        
        margin: 5px 0; 
        display: flex;
        align-items: center; 
    }

    .program-list li i {
        margin-right: 10px; 
        color: var(--primary-orange); 
    }

    .cta {
        font-weight: bold;
        font-size: 1.2rem;
        color: var(--primary-blue);
        margin-top: 20px; 
    }

    /* Aturan dasar */
    form {
    max-width: 600px;
    width: 100%;
    padding: 40px;
    border-radius: 10px;
    background: var(--card-bg); 
    text-align: left;
    margin: 0 auto 20px;
}

/* Aturan untuk layar tablet */
@media (max-width: 1024px) and (min-width: 680px) {
    form {
        max-width: 80%; /* Menghindari ukuran terlalu lebar di tablet */
        padding: 35px; 
        margin: 0 auto; 
    }
}

/* Aturan untuk layar HP */
@media (max-width: 760px) {
    form {
        max-width: 60%;
        padding: 20px;
        margin: 1 auto;
    }

    .form-group label {
        font-size: 0.9rem;
    }

    input[type="text"],
    input[type="number"],
    input[type="tel"],
    textarea,
    select {
        font-size: 0.9rem;
        padding: 10px;
    }

    button {
        font-size: 1rem;
        padding: 10px;
        width: 100%;
        margin: 5px 0;
    }

    .button-container {
        flex-direction: column;
        gap: 2px;
    }
}

/* Aturan untuk layar sangat kecil */
@media (max-width: 480px) {
    form {
        max-width: 80%;
        padding: 20px;
    }

    .form-group label {
        font-size: 0.85rem;
    }
}

    input[type="text"],
    input[type="number"],
    input[type="tel"],
    textarea,
    select {
        font-size: 0.9rem;
        padding: 10px;
    }

    button {
        font-size: 1rem;
        padding: 10px;
        width: 100%;
        margin: 5px 0;
    }

    .button-container {
        flex-direction: column;
        gap: 2px;
    }
}

/* Aturan untuk layar sangat kecil */
@media (max-width: 480px) {
    form {
        max-width: 91%;
        padding: 30px;
    }

    .form-group label {
        font-size: 0.85rem;
    }

    input[type="text"],
    input[type="number"],
    input[type="tel"],
    textarea,
    select {
        font-size: 0.85rem;
        padding: 8px;
    }

    button {
        font-size: 0.9rem;
        padding: 8px;
    }
}
    input[type="text"],
    input[type="text"]::placeholder,
    input[type="number"]::placeholder,
    input[type="tel"]::placeholder,
    textarea::placeholder,
    select {
      font-size: 1rem;
 }

    .description-container h2 span {
        text-align: center;
        display: block;
    }
    input[type="text"],
    input[type="number"],
    input[type="tel"],
    textarea,
    select {
        width: 100%; 
        padding: 12px; 
        border: 1px solid var(--primary-orange);
        transition: var(--transition);
        border-radius: 5px 5px 0px 0px;
        box-sizing: border-box;
        background: transparent;
        margin-top: 5px;
       
    }

    select#kelas {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none; 
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M1 1L5 5L9 1' stroke='black' stroke-width='1.5' stroke-linecap='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 10px; 
        padding-right: 30px;
        cursor: pointer;
    }

    select#kelas:focus {
      outline: none; 
      border-color: #045A70; 
      box-shadow: 0 0 5px rgba(66, 133, 244, 0.5); 
    }

    button {
    background-color: #e19d00;
    color: #fff;
    font-size: 1rem;
    font-weight: bold;
    border: none;
    margin-top: 20px;
    padding: 12px 20px;
    width: 100%;
    transition: background-color 0.3s ease;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

    button {
        background-color: #e19d00;
        color: #fff;
        font-size: 1rem;
        font-weight: bold;
        border: none;
        margin-top: 20px;
        transition: background-color 0.3s ease;        
    }
    
    .button-container {
    display: flex;
    justify-content: space-between; /* Pastikan tombol tidak terlalu jauh */
    gap: 1px; /* Atur jarak antar tombol */
    margin-top: 5px;
    margin-left: 1px;
    width: 100%;
}

.button-container button {
    flex: 1; /* Memastikan tombol memiliki ukuran yang proporsional */
    padding: 10px;
    text-align: center;
}


    .social-media {
        margin-top: 10px;
        text-align: center; 
    }

    .social-media h3 {
        font-size: 1rem;
        margin: 10px 0;
        font-size: 1.2rem;
        color: black;
        font-weight: normal;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 10px; 
        margin-top: 10px; 
        margin-bottom: 20px; 
    }

    .social-icons a {
        color: var(--button-yellow);
        font-size: 2rem; 
        transition: color 0.3s ease; 
    }

    footer p {
        color: black;
    }

    .social-icons a:hover {
        color: #c16524; 
    }

    footer {
    margin-top: 20px;
    padding: 20px 0;
    text-align: center;
    padding: 15px;
    width: 100%;
    max-width: 100%;
    box-sizing: border-box;
}

.copyright {
    font-size: 18px;
    word-wrap: break-word;
    max-width: 95%;
    margin: 0 auto;
    text-align: center;
}

.social-media {
    max-width: 90%;
    margin: 0 auto;
}

.social-media h3 {
    font-size: 18px;
    margin-bottom: 15px;
}

.social-icons {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
}

.social-link i {
    color: #e19d00;
    font-size: 22px;
}

/* Responsif untuk layar HP */
@media (max-width: 768px) {
    .copyright,
    .social-media h3 {
        font-size: 1rem;
        text-align: center;
    }

    .social-icons {
        gap: 5px;
    }

    .social-link i {
        font-size: 18px;
    }
}

@media (max-width: 480px) {
    footer {
        padding: 10px;
        max-width: 95%;
        margin-left: 2%; /* Menggeser ke kanan */
    }

    .copyright,
    .social-media {
        max-width: 100%;
        text-align: left; /* Opsional, agar teks ikut ke kanan */
        padding-left: 25px;
        text-align: center; /* Sedikit dorong ke kanan */
    }
}

.button-container {
    display: flex;
    gap: 2px; /* Atur jarak sesuai keinginan */
}

/* Aturan untuk layar HP */
@media (max-width: 600px) {
    .form-group textarea {
        width: 100%; /* Memastikan textarea mengisi lebar yang tersedia */
        min-height: 100px; /* Menambah tinggi textarea untuk kenyamanan */
        padding: 12px; /* Menyesuaikan padding */
    }
}

  </style>
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
                <h2 class="highlighted-text">Ayo Daftar Trial Class Sukarobot Academy!
                <span>
                </span>
                </h2>
                <p class="single-line-text">
                    Berikan kesempatan bagi anak Anda untuk mengeksplorasi dunia teknologi! Pada program ini peserta dapat memilih untuk mengikuti program: Robotic, Coding for Kids, Graphic Design, Digital Marketing, dan Web Programming. Daftar sekarang untuk mendapatkan kuota trial class!
                </p>
            </section>
        </div>
    </main>
    <form action="{{ route('store.trial') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_siswa">Nama Anak<span style="color: red;">*</span></label>
            <input type="text" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" placeholder="Contoh: Aripin Sihabudin" required>
            @error('nama_siswa')
                <div style="background: rgb(255, 85, 85); color: white; padding: 5px;" class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="usia_anak">Usia Anak<span style="color: red;">*</span></label>
            <input type="number" id="usia_anak" name="usia_anak" value="{{ old('usia_anak') }}" placeholder="Contoh: 10 Tahun" required>
            @error('usia_anak')
                <div style="background: rgb(255, 85, 85); color: white; padding: 5px;" class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="sekolah">Sekolah <span style="color: red;">*</span></label>
            <select id="sekolah" name="sekolah" required>
                <option value="" disabled selected>Pilih Sekolah</option>
                @foreach ($getDataSekolah as $sekolah )
                    <option value="{{ $sekolah->id_sekolah }}" {{ old('sekolah') == $sekolah->id_sekolah ? 'selected' : '' }}>
                        {{ $sekolah->sekolah }}
                    </option>
                @endforeach
            </select>
            @error('sekolah')
                <div style="background: rgb(255, 85, 85); color: white; padding: 5px;" class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
            <button onclick="window.dialog_modal_sekolah.showModal();" style="background-color: #045A70">Tambah Sekolah</button>
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

    </div>
  </main>

  <footer>
    <p class="copyright">&copy; 2025 Sukarobot Academy. Hak Cipta Dilindungi.</p>
    <div class="social-media">
      <h3>Ikuti Kami di Media Sosial:</h3>
      <div class="social-icons">
        <a href="https://www.instagram.com/sukarobot.academy" target="_blank" class="social-link">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.sukarobot.com" target="_blank" class="social-link">
          <i class="fas fa-globe"></i>
        </a>
        <a href="https://wa.me/6285795899901" target="_blank" class="social-link">
          <i class="fab fa-whatsapp"></i>
        </a>
      </div>
    </div>
  </footer>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const formFields = ['nama-anak', 'usia-anak', 'sekolah', 'nama-orang-tua', 'no-hp', 'alamat', 'kelas'];

        // Fungsi untuk menyimpan data ke localStorage
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

        // Event listener untuk menyimpan data saat ada perubahan di form
        formFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.addEventListener('input', saveData);
            }
        });

        // Muat data saat halaman dimuat
        loadData();
        const clearButton = document.getElementById('clear-form-button');
        if (clearButton) {
            clearButton.addEventListener('click', function () {
                localStorage.removeItem('formData'); // Hapus data dari localStorage
                formFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field) {
                        field.value = ''; // Kosongkan input field
                    }
                });
            });
        }
    });
  </script>
</html>