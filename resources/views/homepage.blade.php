@extends('master')
@section('content')
<div class="container mx-auto items-center justify-center">
 <div class="bg-[#266C3E] pt-10 text-white rounded-b-3xl bg-cover bg-center" style="background-image: url({{ asset('/asset/elemen.png') }})">
  <div class="w-4/5 mx-auto">
    <h1 class="mb-4 md:text-[5rem] text-[2rem] font-bold tracking-tight leading-none text-[#F5C577]">Selamat Datang </h1>
    <h2 class="mb-14 md:text-[1.75rem] text-[1rem] font-bold tracking-tight leading-normal text-white">
        Di platform E-Survey <br>
        Puslitbang Bimas Agama Dan Layanan Keagamaan, Badan <br>
        Litbang Dan Diklat Kementerian Agama
    </h2>
  </div>
   
    <div>
      <img src="{{ asset('/asset/ilustrasi1.png') }}" alt="Logo" class="w-3/5 h-full mx-auto md:justify-items-center" >

    </div>
</div>
</div>
<!-- Survei -->
<section id="Survei">
      <div class="container pt-4 mb-4 max-w-screen-2xl mx-auto ">
        <div class="font-medium text-center">
          <h5 class="mb-5 text-[1.25rem] font-bold" style="font-family: Poppins">Survei yang tersedia untuk publik:</h5>
          <div class="flex items-center justify-center">
            <form class="w-2/5">
              <label for="default-search" class="mb-4 text-sm font-medium text-black sr-only">cari</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg class="w-4 h-4 text-black dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                  </svg>
                </div>
                <input
                  type="search"
                  id="default-search"
                  class="block w-full h-5 p-4 pl-10 text-sm text-black drop-shadow-md rounded-lg bg-[#F2EEEE] focus:ring-blue-500 focus:border-blue-500 dark:bg-[#F2EEEE] dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Cari Survei."
                  required
                />
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Survei-->
    <!-- Card -->
    @foreach ($surveys->take(4) as $item)
    <div class="border w-4/5 mx-auto p-3 rounded-lg hover:shadow-lg bg-[#F5C577] mb-5" onclick="{{url('formSurvey',$item->title)}}">
      <p style="font-family: Poppins; font-weight:600;" class="text-[0.875rem] md:text-[1rem]">{{$item->title}}</p>
      <p style="font-family: Poppins; font-weight:400" class="py-1 text-[0.6875rem] md:text-[0.875rem]">{!! $item->description !!}</p>
      <table>
          <tbody class="mt-1">
              <tr>
                  <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">Kategori </td>
                  <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">: {{$item->criteria}}</td>
              </tr>
              <tr>
                  <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">Tanggal Publikasi </td>
                  <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">: {{$item->tanggal_mulai}}</td>
              </tr>
              <tr>
                  <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">Tanggal Survey Ditutup </td>
                  <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">: {{$item->tanggal_selesai}} </td>
              </tr>
          </tbody>
      </table>
  </div>
  @endforeach

    <!-- Akhir Card -->
    <!-- more -->
    <div class="flex items-center justify-center my-10">
      <button type="button" class="focus:outline-none hover:shadow-md text-grey-900 bg-[#F5C577] hover:bg-[#F5C577] focus:ring-4 focus:ring-yellow-300 font-bold rounded-lg p-2 text-md px-5 py-2.5 mr-2 mb-2 mt-5 dark:focus:ring-yellow-900">
        Survei lebih lanjut
      </button>
    </div>
 @endsection