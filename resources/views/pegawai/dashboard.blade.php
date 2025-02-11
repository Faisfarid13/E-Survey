@extends('navbar-pegawai2')
@section('title', 'Dashboard')
@section('content')
<?php  date_default_timezone_set("Asia/jakarta") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="grid grid-cols-1 md:grid-cols-3 pt-4 gap-8 px-8 py-8">
            <!-- Left Column: Welcome and Survey List -->
            <div class="col-span-2 space-y-8">
                <div class="bg-[#C7E2D9] text-black p-8 rounded-lg shadow-lg">
                    @auth
                    <h2 class="text-2xl font-semibold">Selamat Datang, {{ auth()->user()->name }}!</h2>
                    @endauth
                    <span>Selamat Datang Kembali di Aplikasi E-Survey Kami!</span>
                </div>

                <h2 class="text-2xl font-semibold">Survei yang harus dikerjakan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Survey Cards -->
                        @php
                            $maxSurveysPerCriteria = 4;
                        @endphp

                        @foreach ($surveys as $survey)
                            @if ($survey->criteria === 'pegawai' && $maxSurveysPerCriteria > 0 && $survey->tanggal_mulai <= \Carbon\Carbon::now() && $survey->status == 'AKTIF')
                            <div onclick="window.location.href='/detailsurvey/{{ $survey->id }}'" class="cursor-pointer bg-white p-4 border-2 border-black rounded-lg shadow-lg hover:shadow-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-left">
                                <h2 class="text-lg font-semibold">{{ $survey->title }}</h2>
                                <p class="text-sm text-gray-600">{!! Str::words($survey->description, 20) !!}</p><br>
                                <p class="text-sm text-gray-600">Tanggal Publikasi: {{ $survey->tanggal_mulai }}</p>
                                <p class="text-sm text-gray-600">Tanggal Survey Ditutup: {{ $survey->tanggal_selesai }}</p>
                            </div>
                            @php $maxSurveysPerCriteria--; @endphp
                            @endif
                        @endforeach

                        @foreach ($surveys as $survey)
                            @if ($survey->criteria === 'unit' && $maxSurveysPerCriteria > 0 && $survey->tanggal_mulai <= \Carbon\Carbon::now() && $survey->status == 'AKTIF')
                            <div onclick="window.location.href='/detailsurvey/{{ $survey->id }}'" class="cursor-pointer bg-white border-2 border-black p-4 rounded-lg shadow-lg hover:shadow-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-left">
                                    <h2 class="text-lg font-semibold">{{ $survey->title }}</h2>
                                    <p class="text-sm text-gray-600">{!! Str::words($survey->description, 20) !!}</p><br>
                                    <p class="text-sm text-gray-600">Tanggal Publikasi: {{ $survey->tanggal_mulai }}</p>
                                    <p class="text-sm text-gray-600">Tanggal Survey Ditutup: {{ $survey->tanggal_selesai }}</p>
                                </div>
                                @php $maxSurveysPerCriteria--; @endphp
                            @endif
                        @endforeach

                        @foreach ($surveys as $survey)
                            @if ($survey->criteria === 'umum' && $maxSurveysPerCriteria > 0 && $survey->tanggal_mulai <= \Carbon\Carbon::now() && $survey->status == 'AKTIF')
                            <div onclick="window.location.href='/detailsurvey/{{ $survey->id }}'" class="cursor-pointer bg-white border-2 border-black p-4 rounded-lg shadow-lg hover:shadow-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-left">
                                    <h2 class="text-lg font-semibold">{{ $survey->title }}</h2>
                                    <p class="text-sm text-gray-600">{!! Str::words($survey->description, 20) !!}</p><br>
                                    <p class="text-sm text-gray-600">Tanggal Publikasi: {{ $survey->tanggal_mulai }}</p>
                                    <p class="text-sm text-gray-600">Tanggal Survey Ditutup: {{ $survey->tanggal_selesai }}</p>
                                </div>
                                @php $maxSurveysPerCriteria--; @endphp
                            @endif
                            @endforeach

                    </div>
                <!-- <h2 class="text-2xl font-semibold">Survei yang harus dikerjakan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @php
                        $maxSurveysPerCriteria = 4;
                    @endphp

                    @foreach ($surveys as $survey)
                        @if ($survey->criteria === 'pegawai' && $maxSurveysPerCriteria > 0 && $survey->tanggal_mulai <= \Carbon\Carbon::now() && $survey->status == 'AKTIF')
                        <div onclick="window.location.href='/detailsurvey/{{ $survey->id }}'" class="cursor-pointer bg-white border-2 border-black p-4 rounded-lg shadow-lg hover:shadow-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-left">
                                <h2 class="text-lg font-semibold">{{ $survey->title }}</h2>
                                <p class="text-sm text-gray-600">{!! Str::words($survey->description, 20) !!}</p><br>
                                <p class="text-sm text-gray-600">Tanggal Publikasi: {{ $survey->tanggal_mulai }}</p>
                                <p class="text-sm text-gray-600">Tanggal Survey Ditutup: {{ $survey->tanggal_selesai }}</p>
                            </div>
                            @php $maxSurveysPerCriteria--; @endphp
                        @endif
                    @endforeach

                    @foreach ($surveys as $survey)
                        @if ($survey->criteria === 'unit' && $maxSurveysPerCriteria > 0 && $survey->tanggal_mulai <= \Carbon\Carbon::now() && $survey->status == 'AKTIF')
                        <div onclick="window.location.href='/detailsurvey/{{ $survey->id }}'" class="cursor-pointer bg-white border-2 border-black p-4 rounded-lg shadow-lg hover:shadow-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-left">
                                <h2 class="text-lg font-semibold">{{ $survey->title }}</h2>
                                <p class="text-sm text-gray-600">{!! Str::words($survey->description, 20) !!}</p><br>
                                <p class="text-sm text-gray-600">Tanggal Publikasi: {{ $survey->tanggal_mulai }}</p>
                                <p class="text-sm text-gray-600">Tanggal Survey Ditutup: {{ $survey->tanggal_selesai }}</p>
                            </div>
                            @php $maxSurveysPerCriteria--; @endphp
                        @endif
                    @endforeach

                    @foreach ($surveys as $survey)
                        @if ($survey->criteria === 'umum' && $maxSurveysPerCriteria > 0 && $survey->tanggal_mulai <= \Carbon\Carbon::now() && $survey->status == 'AKTIF')
                        <div onclick="window.location.href='/detailsurvey/{{ $survey->id }}'" class="cursor-pointer bg-white border-2 border-black p-4 rounded-lg shadow-lg hover:shadow-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-left">
                                <h2 class="text-lg font-semibold">{{ $survey->title }}</h2>
                                <p class="text-sm text-gray-600">{!! Str::words($survey->description, 20) !!}</p><br>
                                <p class="text-sm text-gray-600">Tanggal Publikasi: {{ $survey->tanggal_mulai }}</p>
                                <p class="text-sm text-gray-600">Tanggal Survey Ditutup: {{ $survey->tanggal_selesai }}</p>
                            </div>
                            @php $maxSurveysPerCriteria--; @endphp
                        @endif
                        @endforeach
                </div> -->

                <h2 class="text-2xl font-semibold">Form Kegiatan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @if(count($events) > 0)
                    @php
                        $maxSurveysPerCriteria = 2;
                    @endphp
                    @foreach ($events as $event)
                        @if($event->criteria == 'internal')
                        <button onclick="window.location.href='/form/{{ $event->slug }}'" class="bg-white border-2 border-black p-4 rounded-lg shadow-lg hover:shadow-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-left">
                            <h2 class="text-lg font-semibold">{{ $event->name }}</h2>
                            <p class="text-sm text-gray-600">{!! Str::words($event->desc, 20) !!}</p><br>
                            <p class="text-sm text-gray-600">Tanggal Publikasi: {{ $event->date_start }}</p>
                            <p class="text-sm text-gray-600">Tanggal Survey Ditutup: {{ $event->date_end }}</p>
                        </button>
                            @php $maxSurveysPerCriteria--; @endphp
                        @endif
                    @endforeach
                    @else
                        <p>Tidak ada events saat ini.</p>
                    @endif
                </div>

                <h2 class="text-2xl font-semibold">Summary</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mt-4">
                    <!-- Summary Cards Go Here -->
                    <div class="text-center p-4 rounded-lg shadow-lg border-2 border-black">
                        <h3 class="text-sm font-semibold">Survei selesai</h3><br>
                        <p class="text-[#000000] text-2xl font-bold">0</p>
                    </div>
                    <div class="text-center p-4 rounded-lg shadow-lg border-2 border-black">
                        <h3 class="text-sm font-semibold">Survei yang belum dikerjakan</h3><br>
                        <p class="text-[#000000] text-2xl font-bold">0</p>
                    </div>
                </div>                
            </div>
            <!-- Right Column: Calendar Card -->
            <div class="col-span-1">
                    <div class="calendar-card bg-white border border-black p-4 rounded-lg">
                        <h2 class="text-xl font-bold px-2">Kalender</h2>
                        <h2 class="font-semibold pl-2 border-b pb-4 border-black">{{ date("j F, Y") }}</h2>
                        @foreach ($surveys->take(3) as $survey)
                        @if ($survey->criteria = $survey->status == 'AKTIF' && $survey->tanggal_mulai <= \Carbon\Carbon::now())
                            <div class="calendar-item mt-4">
                                <div class="calendar-subcard bg-[#F7D296] p-4 rounded-lg shadow-lg">
                                    <h2 class="text-lg pb-4 font-semibold">{{ $survey->title }}</h2>
                                    <p class="text-sm font-semibold text-black">Tanggal Mulai : {{ $survey->tanggal_mulai }}</p>
                                    <p class="text-sm font-semibold text-black pb-2">Tanggal Ditutup : {{ $survey->tanggal_selesai }}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection
