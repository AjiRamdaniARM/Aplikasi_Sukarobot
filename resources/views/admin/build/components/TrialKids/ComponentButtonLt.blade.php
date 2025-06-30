<div class="container button-flex">
    <button type="button" class="b_lannjut" onclick="document.getElementById('modal_kelas_all').showModal();">Lanjut</button>
    &nbsp;&nbsp;
    <button onclick="window.modal_export.showModal();" class="b_export">Export Data</button>
    &nbsp;&nbsp;
    <a target="_blank" href='{{ route('registerTrial')}}' class="b_formulir">Formulir Trial</a>
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

