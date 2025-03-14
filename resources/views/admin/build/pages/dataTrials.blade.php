<x-app-layout>
    <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
        @include('admin.build.components.sidenav')
        @include('modalSekolah')
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            <!-- Navbar -->
            @include('admin.build.components.navbar')
            <br>
            {{-- === component card === --}}
            @include('admin.build.components.TrialKids.ComponentModal')
            <br>
            <div class="container flex-responsive">
                {{-- === compnent fitur pencarian table ==== --}}
                @include('admin.build.components.TrialKids.ComponentSearch')
                {{-- === component fitur button aksi === --}}
                @include('admin.build.components.TrialKids.ComponentButtonLt')
                {{-- === component fitur button aksi === --}}
                @include('admin.build.components.TrialKids.ComponentExportButton')
            </div>
            <br>
            {{-- == table data trials === --}}
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    @include('admin.build.components.TrialKids.ComponentTable')
                </div>
            </div>
        </main>
    </body>

</x-app-layout>
