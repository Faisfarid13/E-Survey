@extends('master')
@section('content')
  {{-- jumbotron --}}
  <div class="bg-[#EBFFF6] w-full bg-cover" style="background-image: url({{'asset/Frame.png'}})">
    <img src="{{asset('asset/gelombangfix.png')}}" alt="" class="w-full z-40 border-0">
  </div>

  <!-- Survei -->
  <div class="bg-[#9ADED5] z-20">
      <section id="Survei">
        <div class="container pt-4 mb-4 max-w-screen-2xl mx-auto ">
          <div class="font-medium text-center">
            <h5 class="mb-5 text-[1.25rem] pt-4 font-semibold" style="font-family: Poppins">Survei yang tersedia untuk publik :</h5>
            <div class="flex items-center justify-center">
              <form class="w-2/5">
                <label for="default-search" class="mb-4 text-sm font-medium text-black sr-only">cari</label>
                <div class="relative">
                  {{-- MENU SEARCH
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-black dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                  </div> --}}
                  {{-- <input
                    type="search"
                    id="default-search"
                    class="block w-full h-10 p-4 pl-10 text-sm text-black shadow-lg rounded-lg bg-[#F2EEEE] focus:ring-blue-500 focus:border-blue-500 dark:bg-[#F2EEEE] dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari Survei."
                    required
                  /> --}}
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- Akhir Survei-->
      <!-- Card -->
      @foreach ($surveys->take(4) as $item)
      <div class="w-4/5 mx-auto p-4 rounded-xl hover:shadow-lg bg-white mb-2 drop-shadow-lg">
        <a href="/formSurvey/{{$item->title}}">
        <p style="font-family: Poppins; font-weight:600;" class="text-[0.875rem] md:text-[1rem]">{{$item->title}}</p>
        <p style="font-family: Poppins; font-weight:400" class="py-1 px-4 text-[0.6875rem] md:text-[0.875rem] ">{!! Str::limit($item->description, 50, '...') !!}</p>
        <table>
            <tbody class="mt-1">
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
  </a>
      <!-- Akhir Card -->
      <div class="flex items-center justify-center mt-2">
        <button type="button" onclick="list()" class="btn btn-light drop-shadow-lg focus:outline-none hover:shadow-md text-grey-800 bg-[#F5C577] hover:bg-[#F5C577] 
        focus:ring-2 focus:ring-yellow-300 font-bold rounded-lg p-2 md:text-md text-sm px-5 py-2.5 mr-2 mb-6 mt-5 md:w-64 md:h-12 dark:focus:ring-yellow-900">Survei lebih lanjut</button>
      </div>
    </div>
</div>
</div>
    <script>
      function navigateToPage() {
          // Ganti URL di bawah ini dengan URL halaman yang ingin Anda tuju
          var newPageUrl = '/isiSurvey';
          // Mengarahkan browser ke halaman baru
          window.location.href = newPageUrl;
      }
      </script>
    <script>
      function list() {
          // Ganti URL di bawah ini dengan URL halaman yang ingin Anda tuju
          var newPageUrl = '/listguest';
          // Mengarahkan browser ke halaman baru
          window.location.href = newPageUrl;
      }
      </script>

 @endsection
