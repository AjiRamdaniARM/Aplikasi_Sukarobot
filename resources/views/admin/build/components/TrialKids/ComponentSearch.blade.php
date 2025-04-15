<!-- ==== component search ==== -->
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
        max-height: 250px;
        overflow-y: auto;
        display: none;
        position: absolute;
        width: 100%;
        z-index: 1000;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .search-results li {
        padding: 10px;
        cursor: pointer;
        border-bottom: 1px solid #eee;
    }

    .search-results li:hover {
        background: #f0f0f0;
    }

    .search-results li:last-child {
        border-bottom: none;
    }

    .search-item {
        display: flex;
        flex-direction: column;
    }

    .search-item-name {
        font-weight: bold;
        color: #333;
    }

    .search-item-details {
        font-size: 0.85em;
        color: #666;
    }
</style>

<div class="search-container flex justify-center items-center">
    <button type="button" id="resetResponse" class="icon-component-refresh w-6" onclick="window.location.href='{{ url()->current() }}'">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
        </svg>
    </button>
    &nbsp;&nbsp;
    <div class="search-box">
        <form method="GET" action="{{ route('menu.siswaTrial') }}">
            <input type="text" id="searchInput" name="keyword" 
                   placeholder="Cari nama siswa..." value="{{ request('keyword') }}" />
            <button type="submit" class="search-icon" style="border: none; background: none; padding: 0;">
                <img width="15" src="{{ asset('asset/search-svgrepo-com.svg') }}" alt="icon_search">
            </button>
        </form>
    </div>
</div>
