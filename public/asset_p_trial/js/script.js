document.addEventListener('DOMContentLoaded', function() {
    const registrationForm = document.getElementById('registrationForm');
    if (registrationForm) {
        registrationForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const namaAnak = document.querySelector('#namaAnak').value;
            const usiaAnak = document.querySelector('#usiaAnak').value;
            const sekolah = document.querySelector('#sekolah').value;
            const level = document.querySelector('#level').value;
            const namaOrtu = document.querySelector('#namaOrtu').value;
            const noHp = document.querySelector('#noHp').value;
            const alamat = document.querySelector('#alamat').value;

            const formData = {
                namaAnak: namaAnak,
                usiaAnak: usiaAnak,
                sekolah: sekolah,
                level: level,
                namaOrtu: namaOrtu,
                noHp: noHp,
                alamat: alamat
            };

            localStorage.setItem('formData', JSON.stringify(formData));
            window.location.href = 'preview.html';
        });
    }

    function loadPreview() {
        const storedData = localStorage.getItem('formData');
        if (storedData) {
            const formData = JSON.parse(storedData);
            document.querySelector('#previewNamaAnak').textContent = formData.namaAnak || '';
            document.querySelector('#previewUsiaAnak').textContent = formData.usiaAnak || '';
            document.querySelector('#previewSekolah').textContent = formData.sekolah || '';
            document.querySelector('#previewLevel').textContent = formData.level || '';
            document.querySelector('#previewNamaOrtu').textContent = formData.namaOrtu || '';
            document.querySelector('#previewNoHp').textContent = formData.noHp || '';
            document.querySelector('#previewAlamat').textContent = formData.alamat || '';
        }
    }

    if (window.location.pathname.endsWith('preview.html')) {
        loadPreview();
    }
});