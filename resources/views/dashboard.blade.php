@extends('navbar-pegawai2')
@section('content')
<?php  date_default_timezone_set("Asia/jakarta") ?>
<div class="grid grid-cols-1 md:grid-cols-3 pt-4 gap-8 px-8 py-8">
            <!-- Left Column: Welcome and Survey List -->
            <div class="col-span-2 space-y-8">
                <div class="bg-[#266C3E] text-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold">Selamat Datang, username!</h2>
                    <span>Selamat Datang Kembali di Aplikasi E-Survey Kami!</span>
                </div>
                <h2 class="text-2xl font-semibold">Survey yang harus dikerjakan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Survey Cards Go Here (4 di bawah) -->  
                    @foreach ($datas->take(4) as $data)
                    <button onclick="isisurvey()" class="bg-gray-300 p-4 rounded-lg shadow-lg hover:shadow-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-left">
                        <h2 class="text-lg font-semibold">{{ $data->title }}</h2>
                        <p class="text-sm text-gray-600">{!! $data->description !!}</p><br>
                        <p class="text-sm text-gray-600">Tanggal Publikasi: {{ $data->tanggal_mulai }}</p>
                        <p class="text-sm text-gray-600">Tanggal Survey Ditutup: {{ $data->tanggal_selesai }}</p>
                    </button>
                    @endforeach
                </div>

                <h2 class="text-2xl font-semibold">Summary</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mt-4">
                    <!-- Summary Cards Go Here -->
                    <div class="text-center p-4 rounded-lg shadow-lg border-2 border-black">
                        <h3 class="text-sm font-semibold">Survey selesai</h3><br>
                        <p class="text-[#266C3E] text-2xl font-bold">25</p>
                    </div>
                    <div class="text-center p-4 rounded-lg shadow-lg border-2 border-black">
                        <h3 class="text-sm font-semibold">Survey yang belum dikerjakan</h3><br>
                        <p class="text-[#266C3E] text-2xl font-bold">10</p>
                    </div>
                </div>                
            </div>
            <!-- Right Column: Calendar Card -->
            <div class="col-span-1">
                    <div class="calendar-card bg-white border border-black p-4 rounded-lg">
                        <h2 class="text-xl font-bold px-2">Kalender</h2>
                        <h2 class="font-semibold pl-2 border-b pb-4 border-black">{{ date("F j, Y, g:i A") }}</h2>
                        @foreach ($datas->take(3) as $data)
                            <div class="calendar-item mt-4">
                                <div class="calendar-subcard bg-[#FFF06A8F] p-4 rounded-lg shadow-lg">
                                    <h2 class="text-lg pb-4 font-semibold">{{ $data->title }}</h2>
                                    <p class="text-sm font-semibold text-black">Tanggal Mulai : {{ $data->tanggal_mulai }}</p>
                                    <p class="text-sm font-semibold text-black pb-2">Tanggal Ditutup : {{ $data->tanggal_selesai }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>  
        <script>
            function isisurvey() {
                // Ganti URL di bawah ini dengan URL halaman yang ingin Anda tuju
                var newPageUrl = '/isiSurvey';
            
                // Mengarahkan browser ke halaman baru
                window.location.href = newPageUrl;
            }
            </script>    
@endsection