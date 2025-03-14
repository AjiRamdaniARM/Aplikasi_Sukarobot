<style>
.search-container {
    width: 300px;
    position: relative;
}

.search-box {
    position: relative;
}

.search-box input {
    width: 100%;
    padding: 10px 35px 10px 10px;
    border: 1px solid #ccc;
    border-radius: 24px;
    font-size: 16px;
    outline: none;
}

.search-icon {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 18px;
    color: gray;
    cursor: pointer;
}

.search-results {
    list-style: none;
    padding: 0;
    margin-top: 5px;
    background: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    max-height: 150px;
    overflow-y: auto;
    display: none;
    position: absolute;
    width: 100%;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.search-results li {
    padding: 10px;
    cursor: pointer;
}

.search-results li:hover {
    background: #f0f0f0;
}
</style>
<div class="search-container flex justify-center items-center ">
    <button type="button" id="resetResponse" class="icon-component-refresh w-6">
        <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
        </svg> 
    </button> 
    <script>
        document.getElementById('resetResponse').addEventListener('click', function() {
            document.getElementById('searchInput').value = '';
            document.getElementById('formSearch').submit();
        })    
    </script> 
    &nbsp;&nbsp;
    <form action="{{ route('index.kids') }}" id="formSearch" method="GET">
        <div class="search-box">
            <input type="text" id="searchInput" name="keyword" 
                   placeholder="Cari sesuatu..." value="{{ request('keyword') }}" />
            <button type="submit" class="search-icon">
                <img width="15" src="{{ asset('asset/search-svgrepo-com.svg') }}" alt="icon_search">
            </button>
        </div>
    </form>     
</div>
<script>document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const searchResults = document.getElementById("searchResults");

    const data = ["Apple", "Banana", "Cherry", "Durian", "Elderberry", "Fig", "Grapes", "Honeydew"];

    searchInput.addEventListener("input", function () {
        const query = this.value.toLowerCase();
        searchResults.innerHTML = "";
        if (query === "") {
            searchResults.style.display = "none";
            return;
        }

        const filteredData = data.filter(item => item.toLowerCase().includes(query));

        if (filteredData.length === 0) {
            searchResults.innerHTML = `<li>Tidak ditemukan</li>`;
        } else {
            filteredData.forEach(item => {
                const li = document.createElement("li");
                li.innerText = item;
                li.addEventListener("click", () => {
                    searchInput.value = item;
                    searchResults.style.display = "none";
                });
                searchResults.appendChild(li);
            });
        }
        searchResults.style.display = "block";
    });

    document.addEventListener("click", function (event) {
        if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.style.display = "none";
        }
    });
});
</script>
