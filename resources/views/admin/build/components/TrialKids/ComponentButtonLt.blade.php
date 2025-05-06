<div class="container button-flex">
    <button type="button" class="b_lannjut" onclick="submitForm()">Lanjut</button>
    &nbsp;&nbsp;
    <button onclick="window.modal_export.showModal();" class="b_export">Export Data</button>
    &nbsp;&nbsp;
    <button onclick="window.location.href='{{ route('registerTrial')}}'" class="b_formulir">Formulir Trial</button>
</div>

<style>
    .b_lannjut{
        background-color: rgb(90, 247, 90);
        padding-left: 30px;
        font-weight: 600;
        padding-right: 30px;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 10px;
        color: black;
    }
    .b_tlanjut {
        background-color: rgb(247, 90, 90);
        padding-left: 30px;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-right: 30px;
        border-radius: 10px;
        color: black;
    }
    .b_export {
        background-color: rgb(255, 166, 77);
        padding-left: 30px;
        font-weight: 600;
        padding-right: 30px;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 10px;
        color: black;
    }
    .b_formulir {
        background-color: rgb(255, 77, 77);
        padding-left: 30px;
        font-weight: 600;
        padding-right: 30px;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 10px;
        color: black;
    }
</style>

<script>
function submitForm() {
    const form = document.querySelector('form');
    const checkedBoxes = document.querySelectorAll('input[name="siswa_id[]"]:checked');
    const siswaIds = Array.from(checkedBoxes).map(cb => cb.value);
    
    fetch('{{ route("menu.siswaTrial.lanjutAll") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            siswa_id: siswaIds
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response:', data);
        if (data.status === 'success') {
            alert(data.message);
            location.reload();
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat memproses data');
    });
}
</script>