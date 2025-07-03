<script>
    function filterForm() {
        return {
            startDate: '',   // Model untuk start date
            endDate: '',     // Model untuk end date
            isLoading: false, // Untuk menentukan status loading tombol

            // Fungsi untuk menangani pengiriman form
            handleSubmit() {
                this.isLoading = true; // Set status loading menjadi true
                const form = document.getElementById('filter-form');

                // Kirim form (menggunakan form action sesuai dengan route yang ada)
                form.submit(); // Mengirimkan form ke server

                // Di sini kita bisa menambahkan logika untuk menunggu respon atau animasi loading

                // Setelah submit, proses bisa langsung ditangani oleh backend
                // Tidak perlu simulasi timeout, karena pengiriman form akan mengarah ke route yang benar
            }
        }
    }
</script>

<script>
    document.getElementById('custom-laporan-btn').addEventListener('click', function(event) {
        // Mencegah default action sementara
        event.preventDefault();

        // Ganti teks tombol menjadi "Loading..." dan tambahkan ikon animasi
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>&nbsp;&nbsp;Loading...';

        // Opsional: Menonaktifkan tombol selama proses loading
        this.style.pointerEvents = 'none';

        // Redirect ke route setelah sedikit delay untuk demo (opsional)
        setTimeout(() => {
            window.location.href = this.href;
        }, 500);
    });
</script>
<script>
    const items = document.querySelectorAll('.item');

    window.addEventListener('scroll', () => {
        items.forEach(item => {
            const rect = item.getBoundingClientRect();
            const isInCenter = rect.top >= window.innerHeight / 4 && rect.bottom <= window.innerHeight *
                (3 / 4);

            if (isInCenter) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    });
</script>

<script>
    function showHide() {

        const showHideBtn = document.getElementById('showHide');
        const overflowElement = document.querySelector('.overflow');

        // === Toggle class 'full-height' on the overflow element === //
        overflowElement.classList.toggle('full-height');

        if (overflowElement.classList.contains('full-height')) {
            showHideBtn.textContent = 'Hide'; // === change button text to hide === //
            console.log("ARIDEV : Perintah HIDE");
        } else {
            showHideBtn.textContent = 'Show All'; // === change button text to ShowAll === //
            console.log("ARIDEV : Perintah SHOW ALL");
        }
    }
</script>
