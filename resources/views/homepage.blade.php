@extends('master')
@section('content')
<!--jumbotron-->
<section class="bg-green-600 w-full p-6 text-center ">
    <h1 class="mb-4 text-xl font-bold tracking-tight leading-none text-white md:text-4xl lg:text-5xl dark:text-white">
        Selamat Datang di E-Survey</h1>
    <p class="mb-4 text-xl font-bold tracking-tight leading-none text-white md:text-4xl lg:text-2xl dark:text-white">
        Puslitbang Bimas Agama Dan Layanan Keagamaan, Badan</p>
    <p class="mb-4 text-xl font-bold tracking-tight leading-none text-white md:text-4xl lg:text-2xl dark:text-white">
        Litbang Dan Diklat Kementerian Agama</p>
</section>
<!--akhir jumbotron-->
<!-- Survei -->
<section id="Survei">
    <div class="container pt-4 mb-4 max-w-screen-2xl mx-auto ">
        <div class="font-medium text-center">
            <h5>Survei yang tersedia untuk publik:</h5>
            <div class="flex items-center justify-center mt-5">
                <form>
                    <label for="default-search"
                        class="mb-4 text-sm font-medium text-gray-900 sr-only dark:text-white">cari</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari Survei." required />
                        <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Survei-->
<!-- Card -->
@foreach ($surveys as $survey)
    
<div class="mt-5" style="max-width: 80%; margin-left: 10%">
    <div class="row g-0">
        <div class="col-md-12">
            <h5 class="card-title" style="font-weight: bold">{{ $survey->title }}</h5> <br/>
            <p class="card-text">
                {!! $survey->description !!}
            </p>
        </div>
    </div>
</div>
@endforeach
<!-- Akhir Card -->
<!-- more -->
<div class="flex items-center justify-center">
    <button type="button"
        class="focus:outline-none text-grey-900 bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 mt-5 dark:focus:ring-yellow-900">
        Survei lebih lanjut
    </button>
</div>
<!-- akhir more -->
@endsection