@extends('trainer.auth.main')

@section('content-auth')
<div class="p-8 flex flex-wrap gap-8 justify-center py-10 lg:py-0 mx-auto items-center min-h-screen md:text-center lg:text-left text-center" style="overflow: auto; height: 100vh;">
    <div class="flex flex-col justify-start items-center" style="height: auto;"> 
        <!-- === Logo === -->
        <img class="responsive-logo w-48 md:block lg:block flex justify-center items-center mx-auto mb-4" src="{{ asset('new_asset/logo-subot.png') }}" alt="">
        
        <!-- === Gambar === -->
        <div class="a_left p-6">
            <img class="responsive-image block lg:hidden rounded-lg mb-6 shift-up" src="{{ asset('new_asset/image.png') }}" alt=""> 
            <!-- === Intro === -->
            <h1 class="pt-2 font-extrabold text-2xl md:text-3xl lg:text-4xl">
                <span class="text-[#045A71]">Hallo Subot Lovers</span>
            </h1>
            <h2 class="text-base mt-2 flex-justify justify-betweent-1 text-gray-500" style="font-size:14px; font-family: 'Poppins', sans-serif;">Silahkan Pilih Akses Masuk Anda</h2>
            <div class="container-button-component grid grid-rows-3 gap-6 mt-5">
            <!-- === Button Siswa === -->
            <div class="component-button flex gap-4 items-center">
                <img class="border-[1px] border-[#096882] flex items-center justify-center w-24 h-24 bg-white rounded-[12px] drop-shadow-lg md:block lg:block hidden flex justify-center" src="{{ asset('new_asset/siswa.png') }}" alt="">
                <button 
                id="loadingButton"
                class="relative flex text-start border-[1px] border-[#096882] drop-shadow-lg font-bold px-5 py-2 bg-white hover:scale-105 rounded-[12px] text-[20px] text-[#DD7325] flex justify-between gap-8 items-center w-full"
                onclick="showLoadingSiswa()"> 
                    <div id="buttonText" class="text-start">
                        <div>Siswa</div>
                        <div class="font-normal text-[#5E5E5E]" style="font-size:12px; font-family: 'Poppins', sans-serif;">Akses Masuk Untuk Siswa</div>
                    </div>
                    <div class="relative">
                        <svg id="buttonIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#5395A7" class="size-8">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z" clip-rule="evenodd" />
                        </svg>
                        <div id="spinner" class="absolute inset-0 hidden w-6 h-6 border-4 border-[#045A71] border-t-transparent rounded-full animate-spin"></div>
                    </div>
                </button>
            </div>
            <!-- === End Button Siswa === -->

            <!-- === Button Trainer === -->
            <div class="component-button flex gap-4 items-center">
                <img class="border-[1px] border-[#096882] flex items-center justify-center w-24 h-24 bg-white rounded-[12px] drop-shadow-lg md:block lg:block hidden flex justify-center" src="{{ asset('new_asset/trainer.png') }}" alt="">
                <button 
                id="loadingButton_trainer"
                class="relative flex text-start border-[1px] border-[#096882] drop-shadow-lg font-bold px-5 py-2 bg-white hover:scale-105 rounded-[12px] text-[20px] text-[#DD7325] flex justify-between gap-8 items-center w-full"
                onclick="showLoadingTrainer()"> 
                    <div id="buttonTextTrainer" class="text-start">
                        <div>Trainer</div>
                        <div class="font-normal text-[#5E5E5E]" style="font-size:12px; font-family: 'Poppins', sans-serif;">Akses Masuk Untuk Trainer</div>
                    </div>
                    <div class="relative">
                        <svg id="buttonIconTrainer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#5395A7" class="size-8">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z" clip-rule="evenodd" />
                        </svg>
                        <div id="spinnerTrainer" class="absolute inset-0 hidden w-6 h-6 border-4 border-[#045A71] border-t-transparent rounded-full animate-spin"></div>
                    </div>
                </button>
            </div>
            <!-- === End Button Trainer === -->

            <!-- === Button Admin === -->
            <div class="component-button flex gap-4 items-center">
                <img class="border-[1px] border-[#096882] flex items-center justify-center w-24 h-24 bg-white rounded-[12px] drop-shadow-lg md:block lg:block hidden flex justify-center" src="{{ asset('new_asset/admin.png') }}" alt="">
                <button 
                id="loadingButtonAdmin"
                class="relative flex text-start border-[1px] border-[#096882] drop-shadow-lg font-bold px-5 py-2 bg-white hover:scale-105 rounded-[12px] text-[20px] text-[#DD7325] flex justify-between gap-8 items-center w-full"
                onclick="showLoadingAdmin()"> 
                    <div id="buttonTextAdmin" class="text-start">
                        <div>Admin</div>
                        <div class="font-normal text-[#5E5E5E]" style="font-size:12px; font-family: 'Poppins', sans-serif;">Akses Masuk Untuk Admin</div>
                    </div>
                    <div class="relative">
                        <svg id="buttonIconAdmin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#5395A7" class="size-8">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z" clip-rule="evenodd" />
                        </svg>
                        <div id="spinnerAdmin" class="absolute inset-0 hidden w-6 h-6 border-4 border-[#045A71] border-t-transparent rounded-full animate-spin"></div>
                    </div>
                </button>
            </div>
            <!-- === End Button Admin === -->
        </div>
        </div>
    </div>
    <div class="a_left p-5">
        <img class="responsive-image hidden lg:block rounded-lg mb-6" src="{{ asset('new_asset/image.png') }}" alt="">
    </div>
</div>
<!-- Script -->
<script>
    function showLoadingSiswa() {
        const buttonIcon = document.getElementById('buttonIcon');
        const spinner = document.getElementById('spinner');

        buttonIcon.classList.add('opacity-0');
        spinner.classList.remove('hidden');

        setTimeout(() => {
            window.location.href = ''; 
        }, 1000); 
    }
    function showLoadingTrainer() {
        const buttonIconTrainer = document.getElementById('buttonIconTrainer');
        const spinnerTrainer = document.getElementById('spinnerTrainer');

        buttonIconTrainer.classList.add('opacity-0');
        spinnerTrainer.classList.remove('hidden');

        setTimeout(() => {
            window.location.href = "{{ route('login.trainer') }}"; 
        }, 1000); 
    }
    function showLoadingAdmin() {
        const buttonIconAdmin = document.getElementById('buttonIconAdmin');
        const spinnerAdmin = document.getElementById('spinnerAdmin');

        buttonIconAdmin.classList.add('opacity-0');
        spinnerAdmin.classList.remove('hidden');

        setTimeout(() => {
            window.location.href = "{{ route('loginAdmin') }}"; 
        }, 1000); 
    }

    // Reset spinner and button state on page load
    window.onload = function() {
        resetButtonState();
    };

    function resetButtonState() {
        const spinnerTrainer = document.getElementById('spinnerTrainer');
        const buttonIconTrainer = document.getElementById('buttonIconTrainer');

        const spinnerAdmin = document.getElementById('spinnerAdmin');
        const buttonIconAdmin = document.getElementById('buttonIconAdmin');

        const spinnerSiswa = document.getElementById('spinner');
        const buttonIconSiswa = document.getElementById('buttonIcon');

        // Reset Trainer button
        spinnerTrainer.classList.add('hidden');
        buttonIconTrainer.classList.remove('opacity-0');

        // Reset Admin button
        spinnerAdmin.classList.add('hidden');
        buttonIconAdmin.classList.remove('opacity-0');

        // Reset Siswa button
        spinnerSiswa.classList.add('hidden');
        buttonIconSiswa.classList.remove('opacity-0');
    }
</script>
<style>
    body {
        overflow: auto; 
    }

    
    @media (orientation: landscape) {
        body {
            overflow: hidden; 
        }
    }

    .responsive-image {
        width: 100%; 
        max-width: 500px; 
        height: auto; 
    }

    .responsive-logo {
        width: 100%; 
        max-width: 200px; 
        height: auto; 
    }

    @media (max-width: 768px) {
        .responsive-image {
            width: 100%; 
            margin: 0 auto;
        }

        .responsive-logo {
            width: 30%; 
            margin: 0 auto; 
        }
    }

    @media (orientation: portrait) {
        .responsive-image {
            width: 100%; 
            margin: 10 auto; 
            margin-bottom: 10px; 
        }

        .responsive-logo {
            width: 30%; 
            margin: 0 auto;
        }
    }

    .p-8 {
        margin-top: -50px; 
    }
</style>
@endsection