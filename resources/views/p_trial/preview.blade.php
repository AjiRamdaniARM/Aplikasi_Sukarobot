<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('asset_p_trial/css/styles.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Define design variables */
    :root {
        --primary-blue: #045A70;
        --primary-orange: #DE7528;
        --button-yellow: #FFB200;
        --bg-gradient: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
        --card-bg: rgba(255, 255, 255, 0.95);
    }

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
    padding: 72px 0; 
    width: 42%; /* Lebar default untuk desktop */
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
        width: 85%;
        padding: 75px 0;  
        min-height: 8px; 
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
        font-size: 1.6rem;
        color: var(--primary-blue);
        margin-bottom: 10px; 
        text-align: left; 
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: var(--primary-blue);
        color: white;
        font-weight: bold;
        
    }

    td {
      width: 30%; 
  }

    th:first-child {
        width: 50%; 
    }

    tr:nth-child(even) {
        background-color: #f2f2f2; 
    }

    tr:hover {
        background-color: #e0e0e0; 
    }

    th:last-child{
      width: 50%;
    }
    .button-container {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    #editDataButton {
      margin-left: -10.2px;
    }
    .button-container button {
        background-color: #e19d00;
        color: #fff;
        padding: 12px 20px;
    }

    button {
        
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
        flex: 5; 
        margin: 0 10px; 
    }

      .button-container button:last-child {
        margin-left: -10px;
      }
      .button-container button {
        display: flex;
        justify-content: center;
      }

    button:hover {
        background-color: #045A70;
    }

    footer {
        margin-top: 20px;
        margin: auto;
        width: 87%;
        padding: 20px 0;      
        color: white;
    }

    .social-media {
        margin-top: 10px;
        text-align: center; 
    }

    .social-media h3 {
        margin: 10px 0;
        font-size: 1.2rem;
        color: black;
        font-weight: normal;
        font-size: 1rem;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 20px; 
        margin-top: 10px; 
        margin-bottom: 20px; 
    }

    .social-icons a {
        color: var(--button-yellow);
        font-size: 1.0rem; 
        transition: color 0.3s ease; 
    }

    footer p {
        color: black;
    }

    .social-link i {
    color: #e19d00;
    font-size: 22px;
}
    .description-container h2 { text-align: left; }
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
            <h2 class="highlighted-text" style="text-align: center;">Data Pendaftaran Trial Class Sukarobot Academy</h2>
            <table>
                <tr>
                    <th style="text-align: left; width: 50%;">Informasi</th>
                    <th style="text-align: left; width: 50%;">Data Anak</th>
                </tr>
                <tr>
                    <td>Nama Anak</td>
                    <td id="nama-anak"></td>
                </tr>
                <tr>
                    <td>Usia Anak</td>
                    <td id="usia-anak"></td>
                </tr>
                <tr>
                    <td>Sekolah</td>
                    <td id="sekolah"></td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td>
                    <td id="nama-orang-tua"></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td id="no-hp"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td id="alamat"></td>
                </tr>
                <tr>
                    <td>Pilihan Kelas</td>
                    <td id="kelas"></td>
                </tr>
            </table>
        </section>
        <div class="button-container">
          <button id="editDataButton">Edit Data</button>
          <script>
            document.getElementById('editDataButton').addEventListener('click', function() {
                const formData = localStorage.getItem('formData');
                if (formData) {
                    window.location.href = 'index.html?formData=' + encodeURIComponent(formData);
                } else {
                    window.location.href = 'index.html';
                }
            });
        </script>
          <button onclick="window.location.href='{{ route('confirmationTrial')}}'">Kirim</button>
      </div>
      

    </div>
  </main>
  
  <footer>
    <p class="copyright">&copy; 2024 Sukarobot Academy. Hak Cipta Dilindungi.</p>
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

    // Fungsi untuk memuat data dari localStorage ke tabel di preview.html
    function loadPreviewData() {
        const savedData = localStorage.getItem('formData');
        if (savedData) {
            const formData = JSON.parse(savedData);
            formFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field && formData[fieldId]) {
                    field.textContent = formData[fieldId]; 
                }
            });
        }
    }

    loadPreviewData();
});

  </script>
</body>
</html>