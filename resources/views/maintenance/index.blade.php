<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAINTENANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/css/pagedone.css " rel="stylesheet"/>
</head>
<body>
    <section class="py-24 relative">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
            <div class="w-full flex-col justify-center items-center lg:gap-14 gap-10 inline-flex">
                <a href="">
                 <img width="100" src="{{ asset('asset/logo.jpg')}}" alt="">
                </a>
                <div class="w-full flex-col justify-center items-center gap-5 flex">
                    <div class="w-full flex-col justify-center items-center gap-6 flex">
                        <div class="w-full flex-col justify-start items-center gap-2.5 flex">
                            <h2 class="text-center text-gray-800 text-3xl font-bold font-manrope leading-normal">Mohon bersabarlah! Saat ini kami sedang dalam masa pemeliharaan.</h2>
                            <p class="text-center text-gray-500 text-base font-normal leading-relaxed">Ini akan membutuhkan waktu untuk memperbaiki kesalahan tersebut. Kami akan kembali online sebentar lagi.</p>
                        </div>
                        <div class="flex items-start justify-center w-full gap-1 count-down-main">
                            <div class="timer">
                              <div class="">
                                <h3 class="countdown-element days text-center text-black text-3xl font-normal font-manrope leading-normal"></h3>
                              </div>
                            </div>
                            <h3 class="text-center text-black text-3xl font-normal font-manrope leading-normal">:</h3>
                            <div class="timer">
                              <div class="">
                                <h3 class="countdown-element hours text-center text-black text-3xl font-normal font-manrope leading-normal"></h3>
                              </div>
                            </div>
                            <h3 class="text-center text-black text-3xl font-normal font-manrope leading-normal">:</h3>
                            <div class="timer">
                              <div class="">
                                <h3 class="countdown-element minutes text-center text-black text-3xl font-normal font-manrope leading-normal"></h3>
                              </div>
                            </div>
                            <h3 class="text-center text-black text-3xl font-normal font-manrope leading-normal">:</h3>
                            <div class="timer">
                              <div class="">
                                <h3 class="countdown-element seconds text-center text-black text-3xl font-normal font-manrope leading-normal"></h3>
                              </div>
                            </div>
                          </div>
                    </div>
                    <img src="https://pagedone.io/asset/uploads/1718004199.png" alt="under maintenance image" class="object-cover">
                </div>
            </div>
        </div>
    </section>
<!--Custom Script-->
<script>
    // count-down timer
    let dest = new Date("mar 31, 2024 23:59:59").getTime();
    let x = setInterval(function () {
      let now = new Date().getTime();
      let diff = dest - now;
      // Check if the countdown has reached zero or negative
      if (diff <= 0) {
        // Set the destination date to the same day next month
        let nextMonthDate = new Date();
        nextMonthDate.setMonth(nextMonthDate.getMonth() + 1);

        // If the current month is December, set the destination date to the same day next year
        if (nextMonthDate.getMonth() === 0) {
          nextMonthDate.setFullYear(nextMonthDate.getFullYear() + 1);
        }

        dest = nextMonthDate.getTime();
        return; // Exit the function
      }

      let days = Math.floor(diff / (1000 * 60 * 60 * 24));
      let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((diff % (1000 * 60)) / 1000);

      if (days < 10) {
        days = `0${days}`;
      }

      if (hours < 10) {
        hours = `0${hours}`;
      }
      if (minutes < 10) {
        minutes = `0${minutes}`;
      }
      if (seconds < 10) {
        seconds = `0${seconds}`;
      }

      // Get elements by class name
      let countdownElements = document.getElementsByClassName("countdown-element");

      // Loop through the elements and update their content
      for (let i = 0; i < countdownElements.length; i++) {
        let className = countdownElements[i].classList[1]; // Get the second class name
        switch (className) {
          case "days":
            countdownElements[i].innerHTML = days;
            break;
          case "hours":
            countdownElements[i].innerHTML = hours;
            break;
          case "minutes":
            countdownElements[i].innerHTML = minutes;
            break;
          case "seconds":
            countdownElements[i].innerHTML = seconds;
            break;
          default:
            break;
        }
      }
    }, 10);
</script>
<script src="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/js/pagedone.js"></script>                                  
</body>
</html>