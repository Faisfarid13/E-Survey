<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tambahkan link ke CDN Tailwind CSS -->
    @vite(['resources/css/app.css'])
    <title>Detail Survei</title>
    <link rel="icon" type="logokemenag.png" href="/asset/logokemenag.png"/>
    <!--Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- jQuery -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
@foreach ($surveys as $survey)
    @if ($survey)
        <div id="detailSurvey" surveyId="{{ $survey->id }}" class="w-full mx-auto h-flex">
            <div class="bg-[#C7E2D9] text-black p-8 rounded-lg shadow-lg flex items-center">
                <img src="{{ asset('/asset/detailsurvey.svg') }}" alt="Logo" class="w-12 h-12 mr-4">
                <h1 class="text-black md:text-3xl text-2xl font-bold" style="font-family: 'Poppins';">Pengisian Survei</h1>
            </div>

            <h1 class="md:mt-4 mt-6 text-lg md:text-3xl font-semibold text-center pt-4 px-8 mb-4" style="font-family: 'Poppins';">{{ $survey->title }}</h1>
            <h2 class="md:mt-8 md:text-base text-xs text-justify mb-4 px-8 mt-8" style="font-family: 'Poppins';">{!!$survey->description !!}</h2>
            <div  class="md:mt-8 md:text-base text-xs text-justify mb-4 px-8" style="font-family: 'Poppins';">
                <h2 class="md:text-xl text-xs font-semibold mb-2">Kategori</h2>
                <p class="">{{ $survey->criteria }}</p>
                <h2 class="md:text-xl text-xs font-semibold mt-2 mb-2">Tanggal Publikasi</h2>
                <p class="">{{ $survey->tanggal_mulai }}</p>
                <h2 class="md:text-xl text-xs font-semibold mt-2 mb-2">Tanggal survey ditutup</h2>
                <p class="">{{ $survey->tanggal_selesai }}</p>
            </div>
        </div>
    @else
        <p>No survey data found.</p>
    @endif
@endforeach
<div id="guide" class="flex absolute justify-center items-center min-h-screen">
    <!-- Background overlay -->
  <div class="hidden fixed top-0 left-0 w-full h-full md:w-full md:h-full flex items-center justify-center z-10 overlay" id="modal-overlay">
      <div class="modal bg-white w-3/4 md:w-1/2 rounded-lg">
          <!-- Modal Content -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
          <div class="modal-header bg-green-100 rounded-lg shadow-lg pb-6 pt-12 px-8 flex items-center">
              <i class="fas fa-info-circle text-2xl mr-2"></i> <!-- Tambahkan ikon Font Awesome di sini -->
              <h2 class="text-md md:text-xl font-semibold">Panduan Mengisi Survey</h2>
          </div>
      @foreach ($surveys as $data)
      <div class="modal-body p-8">
        <ul type="1" class="text-sm md:text-lg" style="font-family:'Poppins'">
            <li>1. Survei berikut adalah {{ $data->title }}, pastikan Anda mengisi survei dengan benar</li>
            <li>2. Isi jawaban survei harus sesuai dengan pertanyaan yang diberikan</li>
            <li>3. Setelah selesai mengisi seluruh survei pastikan untuk melakukan submit dengan cara menekan tombol submit di halaman bawah survei</li>
            <li>4. Pastikan untuk mengisi semua pertanyaan yang wajib diisi sebelum menyelesaikan survei</li>
            <li>5. Untuk lanjut ke halaman survei lainnya Anda dapat menekan tombol “selanjutnya” sampai ke halaman terakhir</li>
            <li>6. Setelah memahami seluruh instruksi Anda dapat menekan tombol “selanjutnya” di bawah ini, dan Anda dapat langsung mengerjakan survei yang tersedia</li>
        </ul>
      </div>
      @endforeach
      <div class="modal-footer px-8 pb-4 flex justify-between">
          <button id="btnKembali" class="px-4 py-2 shadow-lg bg-white text-gray-700 rounded hover:bg-gray-400">Kembali</button>
          <button id="btnSelanjutnya" class="px-4 py-2 shadow-lg bg-[#F7D296] text-black rounded hover:[#F5C577]">Selanjutnya</button>
      </div>
  </div>
  </div>
</div>

<!-- Buttons -->
<div class="pt-32 md:pt-2 text-center">
    <button id="btnNext" type="button" class="btn btn-light drop-shadow-lg focus:outline-none hover:shadow-md text-grey-800 bg-[#F7D296] hover:bg-[#F5C577] font-bold rounded-full p-2 text-md px-5 py-1.5 mb-2 w-56 h-10 dark:focus:ring-yellow-900">Selanjutnya</button><br>
    <button id="btnPrev" type="button" class="btn btn-light drop-shadow-lg focus:outline-none hover:shadow-md text-grey-800 bg-white hover:bg-gray-200 font-bold rounded-full p-2 text-md px-5 py-1.5 mb-2 w-56 h-10 dark:focus:ring-yellow-900">Batal</button>
</div>

    <style>
        /* Custom styles for the modal */
        .overlay {
            background: rgba(0, 0, 0, 0.6);
        }
    </style>

<script type="module">
    $(document).ready(function(){
        $('#btnNext').click(function(){
            console.log('click');
            $('#modal-overlay').removeClass('hidden');
            $('#modal-overlay').show();
        });

        $('#btnSelanjutnya').click(function(){
            const surveyId = $('#detailSurvey').attr("surveyId");
            window.location.href = '/formSurvey/'+surveyId;
        })

        $('#btnKembali').click(function(){
            $('#modal-overlay').addClass('hidden');
        })

        $('#btnPrev').click(function(){
            window.history.back();
        });
    });
</script>

</body>
</html>
