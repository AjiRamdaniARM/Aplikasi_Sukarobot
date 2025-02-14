<x-app-layout>
  
    <body style="background-color: #F8F9FA" class="m-0 font-sans text-base antialiased font-normal leading-default text-slate-500">
        {{-- === sidenav === --}}
        @include('admin.build.components.sidenav')
        {{-- === akhir components sidenav === --}}
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            {{-- === navbar === --}}
            @include('admin.build.components.navbar')
            {{-- === end navbar === --}}
            <div class="container overflow-hidden">
                <img class="bg-drive-menu" src="{{ asset('assets/img/banner-drive.png') }}" alt="BannerDrive" />
                <div class="flex-auto py-10" style="margin-top:30px">
                    <div class="container flex justify-between items-center">
                        <h2 class="leading-normal poppins-bold text-lg">Dokumentasi Google Drive</h2>
                        <button onclick="window.modalDrive.showModal();" class="poppins-regular animasi-color-default">Tambah Folder</button>
                    </div>
                    <ul style=" display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                        gap: 10px;
                        padding: 0;
                        margin: 0;
                        list-style: none;">
                       @forelse ($getDataDrive as $drive )
                       @include('admin.build.components.googleDrive.edited_modal')
                        <li
                        class="relative flex py-6 px-4 mb-2 border-0 rounded-t-inherit rounded-xl " style="background-color: rgb(255, 255, 255)">
                            <div class="flex" style="gap:20px">
                                <div class="flex lg:justify-center items-start" style="gap: 20px">
                                    <img class="w-10" style="margin-top: 10px" src="{{ asset('assets/Icon/icon-googleDrive.png')}}" alt="Icon-GoogleDrive">
                                    <div class="container-text-body">
                                        <a href="{{ $drive->link_folder}}" class="scale-105 transition-all">
                                            <h6 class="leading-normal text-md">
                                            {{ $drive->name_folder}} 
                                            </h6> 
                                        </a>
                                        <p class="text-gray-500 -mt-10 text-[10px] leading-normal">Folder Google Drive &nbsp; 
                                                <span>
                                                    <a href="javascript:void(0);" onclick="document.getElementById('delete-form-{{ $drive->id }}').submit();" class="scale-105 text-red-500">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3 6.38597C3 5.90152 3.34538 5.50879 3.77143 5.50879L6.43567 5.50832C6.96502 5.49306 7.43202 5.11033 7.61214 4.54412C7.61688 4.52923 7.62232 4.51087 7.64185 4.44424L7.75665 4.05256C7.8269 3.81241 7.8881 3.60318 7.97375 3.41617C8.31209 2.67736 8.93808 2.16432 9.66147 2.03297C9.84457 1.99972 10.0385 1.99986 10.2611 2.00002H13.7391C13.9617 1.99986 14.1556 1.99972 14.3387 2.03297C15.0621 2.16432 15.6881 2.67736 16.0264 3.41617C16.1121 3.60318 16.1733 3.81241 16.2435 4.05256L16.3583 4.44424C16.3778 4.51087 16.3833 4.52923 16.388 4.54412C16.5682 5.11033 17.1278 5.49353 17.6571 5.50879H20.2286C20.6546 5.50879 21 5.90152 21 6.38597C21 6.87043 20.6546 7.26316 20.2286 7.26316H3.77143C3.34538 7.26316 3 6.87043 3 6.38597Z" fill="#1C274C"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5956 22.0001H12.4044C15.1871 22.0001 16.5785 22.0001 17.4831 21.1142C18.3878 20.2283 18.4803 18.7751 18.6654 15.8686L18.9321 11.6807C19.0326 10.1037 19.0828 9.31524 18.6289 8.81558C18.1751 8.31592 17.4087 8.31592 15.876 8.31592H8.12404C6.59127 8.31592 5.82488 8.31592 5.37105 8.81558C4.91722 9.31524 4.96744 10.1037 5.06788 11.6807L5.33459 15.8686C5.5197 18.7751 5.61225 20.2283 6.51689 21.1142C7.42153 22.0001 8.81289 22.0001 11.5956 22.0001ZM10.2463 12.1886C10.2051 11.7548 9.83753 11.4382 9.42537 11.4816C9.01321 11.525 8.71251 11.9119 8.75372 12.3457L9.25372 17.6089C9.29494 18.0427 9.66247 18.3593 10.0746 18.3159C10.4868 18.2725 10.7875 17.8856 10.7463 17.4518L10.2463 12.1886ZM14.5746 11.4816C14.9868 11.525 15.2875 11.9119 15.2463 12.3457L14.7463 17.6089C14.7051 18.0427 14.3375 18.3593 13.9254 18.3159C13.5132 18.2725 13.2125 17.8856 13.2537 17.4518L13.7537 12.1886C13.7949 11.7548 14.1625 11.4382 14.5746 11.4816Z" fill="#1C274C"/>
                                                        </svg>
                                                    </a>
                                                    <button onclick="window.modalDriveEdited.showModal();" class="scale-105">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2 12C2 16.714 2 19.0711 3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355C22 19.0711 22 16.714 22 12V10.5M13.5 2H12C7.28595 2 4.92893 2 3.46447 3.46447C2.49073 4.43821 2.16444 5.80655 2.0551 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                                            <path d="M16.652 3.45506L17.3009 2.80624C18.3759 1.73125 20.1188 1.73125 21.1938 2.80624C22.2687 3.88124 22.2687 5.62415 21.1938 6.69914L20.5449 7.34795M16.652 3.45506C16.652 3.45506 16.7331 4.83379 17.9497 6.05032C19.1662 7.26685 20.5449 7.34795 20.5449 7.34795M16.652 3.45506L10.6872 9.41993C10.2832 9.82394 10.0812 10.0259 9.90743 10.2487C9.70249 10.5114 9.52679 10.7957 9.38344 11.0965C9.26191 11.3515 9.17157 11.6225 8.99089 12.1646L8.41242 13.9M20.5449 7.34795L17.5625 10.3304M14.5801 13.3128C14.1761 13.7168 13.9741 13.9188 13.7513 14.0926C13.4886 14.2975 13.2043 14.4732 12.9035 14.6166C12.6485 14.7381 12.3775 14.8284 11.8354 15.0091L10.1 15.5876M10.1 15.5876L8.97709 15.9619C8.71035 16.0508 8.41626 15.9814 8.21744 15.7826C8.01862 15.5837 7.9492 15.2897 8.03811 15.0229L8.41242 13.9M10.1 15.5876L8.41242 13.9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                                        </svg>
                                                    </button>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <form id="delete-form-{{ $drive->id }}" action="{{ route('menu.googleDrive.delete', ['id' => $drive->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        @empty
                        <div class="container w-full text-center" style="margin-top: 50px">
                            <h6>Belum ada data folder drive</h6>
                        </div>
                       @endforelse
                    </ul>
                </div>
            </div>
        </main>
    </body>
</x-app-layout>