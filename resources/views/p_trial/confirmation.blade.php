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
  <link rel="stylesheet" href="{{asset('asset_p_trial/css/style_2.css')}}">
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