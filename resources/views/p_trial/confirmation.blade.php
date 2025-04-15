<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('asset_p_trial/css/styles.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <style>
    .varela-round-regular {
      font-family: "Varela Round", sans-serif;
      font-weight: 400;
      font-style: normal;
    }

    .header {    
      background-image: url('asset_p_trial/img/header trial class.png');
      background-size: cover; 
      background-position: center; 
      background-repeat: no-repeat; 
      color: white;
      text-align: center;
      padding: 80px 0; 
      width: 44%; /* Lebar default untuk desktop */
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
        width: 91.4%;
        padding: 80px 0; 
        min-height: 10px;
      }
    }

    /* Tampilan HP */
    @media screen and (max-width: 600px) {
      .header {
        width: 92%; 
        padding: 38px 0;
        min-height: 10px;
      }
    }

    :root {
      --primary-blue: #045A70;
      --primary-orange: #e19d00;
      --button-yellow: #FFB200;
      --transition: .3s ease;
      --card-bg: rgba(255, 255, 255, 0.95);
      --bg-gradient: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
    }

    body {
      font-family: sans-serif;
      font-size: 16px;
      display: flex;
      flex-direction: column;
      align-items: center; 
      justify-content: flex-start; 
      min-height: 100vh;
      margin: 0; 
      text-align: center;      
      overflow-x: hidden;
      background: var(--bg-gradient);    
    }

    .header-content {
      padding: 0 5%;
      text-align: center; 
    }

    .container {
      max-width: 1200px; 
      margin: auto;
      padding: 10px 5%;
      margin-top: 1px; 
    }

    .confirmation-message {
      width: 78%; /* Sesuaikan dengan lebar header */
      padding: 60px 0; /* Sesuaikan padding dengan header */
      border-radius: 12px;
      margin-bottom: 12px; 
      text-align: center; 
      display: flex;
      flex-direction: column;
      align-items: center; 
      justify-content: center; 
      background-color: var(--card-bg);
      max-width: 1200px;
      margin: 0 auto; /* Pusatkan kontainer */
    }

    @media screen and (max-width: 1024px) {
      .confirmation-message {
        width: 100%; /* Sesuaikan dengan lebar header untuk tablet */
        padding: 60px 0; /* Sesuaikan padding dengan header */
      }
    }

    @media screen and (max-width: 600px) {
      .confirmation-message {
        width: 90%; /* Sesuaikan dengan lebar header untuk mobile */
        padding: 50px 5%;
        font-size: 14px;
        background: rgba(255, 255, 255, 0.9); /* Warna latar belakang dengan transparansi */
        border-radius: 10px; /* Membuat sudut lebih halus */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan ringan */
      }

      .thank-you-message {
        padding: 5px;
        border-radius: 5px;
        color: white; /* Warna teks */
      }

      .confirmation-message h2 {
        font-size: 1.5rem;
        text-align: center;
        padding: 5px;
        margin-top: -20px; /* Mengurangi jarak atas */
      }

      dotlottie-player {
        width: 280px !important; /* Sesuaikan ukuran animasi */
        height: 280px !important;
      }
    }

    .thank-you-message {
      font-family: "Montserrat", sans-serif; 
      font-size: 23px; 
      color: #045A70;
      text-align: center;
    }

    footer {
      margin-top: 10px;
      padding: 20px 0;
      color: black; /* Set text color to black */
      text-align: left;
      width: 100%; /* Ensure footer spans full width */
      background-color: transparent;
      padding-top: 20px;
      padding-left: 20px;
      padding-right: 20px;
      margin-left: auto;
      margin-right: auto;
    }

    footer {
        margin-top: 20px;
        margin: auto;
        width: 87%;
        padding: 20px 0;      
        color: white;
        text-align: center;
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
  </style>
</head>
<body>

  <header class="header">
    <div class="header-content"></div>
  </header>

  <main>
    <div class="container">
      <section class="confirmation-message">
        <h2 class="thank-you-message">Terima Kasih kepada Bapak/Ibu Yang Telah Mendaftarkan Anaknya di Trial Class</h2>
        <h2 style="color: orange; margin-top: -6px;"><b>SUKAROBOT ACADEMY!</b></h2>
        <dotlottie-player src="https://lottie.host/5eb2a5e8-f7e6-4717-bced-069735ddf74f/EI0cBmEX1e.lottie" 
          background="transparent" speed="1" 
          style="width: 400px; height: 400px" 
          loop autoplay>
        </dotlottie-player>
      </section>
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

  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
  <script src="{{ asset('asset_p_trial/js/script.js')}}"></script>

</body>
</html>