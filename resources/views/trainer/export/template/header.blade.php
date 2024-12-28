<header>
    <div class="logo header">
        <img src="{{ $logo }}" alt="Logo" style="width: 120px; height: auto;">
    </div>
    <div class="component-text-header">
        <h1>LAPORAN TRAINER</h1>
        <p>Alamat: Jl. A. Yani No.283, Kebonjati, Kec.Cikole, Kota Sukabumi, Jawa Barat 43111</p>
        <p>Telepon: +62 857-9589-9901</p>
        <p>Email: sukarobotacademy@gmail.com</p>
    </div>
</header>

<style>
    header {
        width: 100%;
        border-bottom: 2px solid #000; /* Garis bawah */
        padding-bottom: 20px; /* Jarak bawah */
        margin-bottom: 20px; /* Jarak bawah header */
    }

    .logo.header {
        display: inline-block;
        vertical-align: top;
        width: 120px; /* Lebar gambar logo */
    }

    .component-text-header {
        display: inline-block;
        vertical-align: top;
        margin-top: 17px;
        margin-left: 20px;
        font-family: Arial, sans-serif;
    }

    .component-text-header h1 {
        font-size: 24px;
        margin: 0;
        color: #333;
        font-weight: bold;
    }

    .component-text-header p {
        margin: 5px 0;
        color: #555;
        font-size: 14px;
    }

    /* Styling untuk alamat, telepon, dan email */
    .component-text-header p:first-child {
        font-weight: bold;
        color: #000;
    }
</style>
