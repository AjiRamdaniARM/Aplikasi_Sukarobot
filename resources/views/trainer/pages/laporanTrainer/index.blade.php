@extends('trainer.layouts.main')
@section('children')
<section class="jadwal">
    <div class="c_body">
        <!-- Header -->
        <div class="container py-4 px-7">
            <h1 class="text-[#0E2C75] text-start text-2xl font-semibold poppins">
                Tanggal Jadwal
            </h1>
        </div>

        <!-- Date Filter -->
        <div class="content-date ">
            @include('trainer.pages.laporanTrainer.partials.dateFilter')
        </div>

        <!-- Cards Section -->
        <div class="flex items-center justify-center gap-5 py-4 ">
            <div class="container">
                <div class="content-body">
                    <div id="card-container" 
                         class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 overflow-auto">
                        <!-- Card content dynamically populated here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Table -->
        <div class="container">
            <!-- Search Component -->
            <div class="py-4">
                @include('trainer.pages.laporanTrainer.partials.searchComponent')
            </div>

             <!-- Data Table -->
            <div id="laporanTableContainer" class="overflow-x-auto">
                @include('trainer.pages.laporanTrainer.partials.dataTable', ['query' => $query])
            </div> 
        </div>
    </div>
</section>

@endsection