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
