@extends(auth()->check() ? 'navbar-pegawai2' : 'master')
@section('title', 'E-Survey - Badan Litbang dan Diklat Kementerian Agama')
@section('content')
  <!-- Jumbotron -->
  <div class="bg-[#EBFFF6] w-full bg-cover" style="background-image: url({{'asset/Frame.png'}})">
    <img src="asset/gelombangfix.png" alt="" class="w-full z-40 border-0">
  </div>

  <!-- Survei -->
    <!-- Survei -->
    <div class="bg-[#9ADED5] z-20">
      <section id="Survei">
        <div class="container pt-4 mb-4 max-w-screen-2xl mx-auto ">
          <div class="font-medium text-center">
            <h5 class="mb-5 text-[1.25rem] pt-4 font-semibold" style="font-family: Poppins">Survei yang tersedia untuk publik :</h5>
            <div class="flex items-center justify-center">
            </div>
          </div>
        </div>
      </section>
      <!-- Akhir Survei-->
      <!-- Card -->
      @foreach ($surveys->take(4) as $item)
      <div class="w-4/5 mx-auto p-4 rounded-xl hover:shadow-lg bg-white mb-2 drop-shadow-lg">
        <a href="/detailsurvey/{{$item->id}}">
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
        </a>
      </div>
      @endforeach
  {{-- button more survey --}}
  <div class="flex items-center justify-center mt-2">
    <button onclick="window.location.href='/listguest'" type="button" class="btn btn-light drop-shadow-lg focus:outline-none hover:shadow-md text-grey-800 bg-[#F7D296] hover:bg-[#F5C577] 
    focus:ring-2 focus:ring-yellow-300 font-bold rounded-lg p-2 md:text-md text-sm px-5 py-2.5 mr-2 mb-6 mt-5 md:w-64 md:h-12 dark:focus:ring-yellow-900">Survei lebih lanjut</button>
  </div>
</div>
</div>
  <!-- Akhir Survei-->
      <!-- list event/kegiatan -->
      <!-- <p class="w-[85%] mx-auto mb-4 py-2 text-center text-[1.25rem] font-semibold"  style="font-family:'Poppins'">Daftar Kegiatan</p>
      <div class="w-[85%] mx-auto">
        <div class="grid grid-rows">
          <div class="grid grid-cols-2 w-full mx-auto bg-white rounded-3xl">
            <div class="text-center bg-[#F7D296] font-bold p-2 rounded-3xl cursor-pointer text-black" id="tabUmum">Umum</div>
            <div class="text-center text-[#76817C] bg-white font-bold p-2 rounded-3xl cursor-pointer" id="tabPegawai">Pegawai</div>
          </div>
        <div id="eventContent" class="w-full h-full"> -->

<script type="module">
  $(document).ready(function(){
    fetch("/daftarkegiatanumum")
        .then(response => response.text())
        .then(data => {
          $('#eventContent').html(data);
        });

    $('#tabPegawai').click(function(){
      $(this).removeClass('text-[#76817C] bg-white').addClass('text-black bg-[#F7D296]');
      $('#tabUmum').removeClass('text-black bg-[#76817C]').addClass('text-[#76817C] bg-white');
      fetch("/daftarkegiatanpegawai")
        .then(response => response.text())
        .then(data => {
          $('#eventContent').html(data);
        });
    });

    $('#tabUmum').click(function(){
      $(this).removeClass('text-[#76817C] bg-white').addClass('text-black bg-[#76817C]');
      $('#tabPegawai').removeClass('text-black bg-[#76817C]').addClass('text-[#76817C] bg-white');
      fetch("/daftarkegiatanumum")
        .then(response => response.text())
        .then(data => {
          $('#eventContent').html(data);
        });
    });
  });
</script>
 @endsection
