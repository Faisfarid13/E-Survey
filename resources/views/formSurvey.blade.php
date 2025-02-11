@extends(auth()->check() ? 'navbar-pegawai2' : 'master')
@section('content')

{{-- page isi survey --}}

<body>
    <form action="{{ url('formSurvey/'.$surveys->id.'/submit') }}" method="post" enctype="multipart/form-data">
        <div class="m-8 p-2 border rounded">
            <h1 class="text-2xl text-center font-bold">{{$surveys->title}}</h1>
            <hr class="my-6 border-solid" />

            {{-- menampilkan section --}}
            <div class="hidden md:flex w-full justify-center">
                @foreach ($sections as $sectionIndex => $section)
                <div class="flex mt-4 mx-4 xl:border-2 xl:border-black xl:rounded-full xl:shadow-xl">
                    <span class="section-number py-2 px-4 mr-2 text-white font-bold border-solid border-2 rounded-full" data-section="{{ $sectionIndex }}">{{ $sectionIndex + 1 }}</span>
                    <p class="hidden xl:flex font-bold py-2 px-4 mr-4">{{$section->section}}</p>
                </div>
               
                
                @endforeach
            </div>

            @csrf
            @foreach ($sections as $sectionIndex => $section)
                
            <div class="survey-section" style="{{ $sectionIndex > 0 ? 'display: none;' : '' }}">
                <h1 class="text-xl mt-4 font-bold w-full">{{$section->section}} </h1>
                <p>{!!$section->deskripsi!!} </p>
                @foreach ($section->question as $question)
                <div class="m-4 p-4 border-solid border border-gray-600 rounded-lg shadow-lg">
                    <label class="question flex" for="survey">
                        <p>{{$question->question}}</p>
                        @if(str_replace(',', ', ', $question->validation))
                        <p class="ml-2 text-red-600">*</p>
                        @endif
                    </label>
                    <small class="form-text text-muted">
                        @if(str_replace(',', ', ', $question->validation))
                        <p class="mb-2 text-red-600">wajib diisi</p>
                        @endif
                    </small>
                    @if ($errors->has('question_' . $question->id))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <span class="font-medium">{{ $errors->first('question_' . $question->id) }}
                        </span>
                    </div>
                    @endif
                    <div class="answer column">
                        {{-- kategori pertanyaan jawaban singkat --}}
                        @if ($question->question_category_id === 1)
                        <input type='text' name="question_{{$question->id}}" value="{{old('question_'.$question->id)}}" placeholder="Jawaban Singkat" class="w-max mt-1 block px-3 py-2 bg-white border-slate-300 rounded-md text-sm shadow-md placeholder-slate-400 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">

                        {{-- kategori pertanyaan jawaban panjang --}}
                        @elseif($question->question_category_id === 2)
                        <textarea name="question_{{$question->id}}" class="w-full mt-1 block px-3 py-2 bg-white border-slate-300 rounded-md text-sm shadow-md placeholder-slate-400 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500" placeholder="Jawaban Panjang">{{old('question_'.$question->id)}}</textarea>

                        {{-- kategori pertanyaan email --}}
                        @elseif($question->question_category_id === 3)
                        <input type='email' name="question_{{$question->id}}" value="{{old('question_'.$question->id)}}" placeholder="Email" class="peer w-max border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-pink-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">

                        {{-- kategori pertanyaan skala --}}
                        @elseif($question->question_category_id === 4)
                        <div class="md:flex block">
                            <input type="radio" type="radio" name="question_{{$question->id}}" value="" class="hidden" checked>
                            @foreach ($question->choice as $choice)
                            <div class="flex items-center mr-4">
                                <input id="inline-radio" type="radio" name="question_{{$question->id}}" value="{{ $choice->id }} " {{old('question_'.$question->id) == $choice->id ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label class="ml-2">{{ $choice->pilihan_pertanyaan }}</label>
                            </div>
                            @endforeach
                        </div>

                        {{-- kategori pertanyaan pilihan ganda --}}
                        @elseif($question->question_category_id === 5)
                        <input type="radio" type="radio" name="question_{{$question->id}}" value="" class="hidden" checked>
                        @foreach ($question->choice as $choice)
                        <div class="choice">
                            <input type="radio" name="question_{{$question->id}}" value="{{ $choice->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 focus:ring-blue-500 ring-red-600" {{ old('question_' . $question->id) == $choice->id ? 'checked' : '' }}>
                            <label for="">{{ $choice->pilihan_pertanyaan }}</label>
                        </div>
                        @endforeach


                        {{-- kategori pertanyaan dropdown --}}
                        @elseif($question->question_category_id === 6)
                        <select name="question_{{$question->id}}" class="bg-gray-50 border border-slate-300 text-sm text-slate-500 rounded-lg focus:ring-red-500 focus:border-red-500 block w-full shadow-md p-2.5">
                            <option value="" selected hidden>Select an Option</option>
                            @foreach($question->choice as $choice)
                            <option value="{{ $choice->id }}" {{old('question_'.$question->id) == $choice->id ? 'selected' : '' }}>
                                <h1>{{ $choice->pilihan_pertanyaan }}</h1>
                            </option>
                            @endforeach
                        </select>

                        {{-- kategori pertanyaan checkbox --}}
                        @elseif($question->question_category_id === 7)
                        @foreach ($question->choice as $choice)
                        <input type="radio" type="radio" name="question_{{$question->id}}" value="" hidden checked>
                        <div class="choice">
                            <input type="checkbox" name="question_{{$question->id}}[]" value="{{ $choice->id }} {{old('question_'.$question->id) == $choice->id ? 'checked' : '' }}">
                            <label for="{{$choice->id}}">{{ $choice->pilihan_pertanyaan }}</label>
                        </div>
                        @endforeach

                        {{-- kategori pertanyaan tanggal --}}
                        @elseif($question->question_category_id === 8)
                        <input type="date" name="question_{{$question->id}}" value="{{old('question_'.$question->id)}}">

                        {{-- kategori pertanyaan waktu --}}
                        @elseif($question->question_category_id === 9)
                        <input type="time" name="question_{{$question->id}}" value="{{old('question_'.$question->id)}}">

                        {{-- kategori file upload --}}
                        @elseif($question->question_category_id === 10)
                        <input type="file" name="question_{{$question->id}}" accept="image/*, .pdf" value="{{old('question_'.$question->id)}}" size="max:1000">

                        {{-- kategori lokasi --}}
                        @elseif($question->question_category_id === 11)
                            <select name="province" id="provinceSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 form-control">
                                <option value="" selected hidden>Pilih Provinsi</option>
                                @foreach($provinsi as $provinceCode => $provinceName)
                                <option value="{{ $provinceCode }}" >
                                    <h1>{{ $provinceName}}</h1>
                                </option>
                                @endforeach
                            </select>
                        
                            <select name="city" id="citySelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 form-control mt-4">
                                <option value="" selected hidden>Pilih Kabupaten/Kota</option>
                                <option value="" disabled>Pilih Provinsi Dahulu</option>
                            </select>
                            
                            <select name="district" id="districtSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 form-control mt-4">
                                <option value="" selected hidden>Pilih Kecamatan</option>
                                <option value="" disabled>Pilih Kabupaten/Kota Dahulu</option>
                            </select>
                            
                            <select name="question_{{$question->id}}" id="villageSelect"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 form-control mt-4">
                                <option value="" selected hidden>Pilih Kelurahan</option>
                                <option value="" disabled>Pilih Kecamatan Dahulu</option>
                            </select>
                            
                        @endif
                    </div>
                </div>
                @endforeach
                {{-- button start --}}
                <div class="flex justify-end">
                    @if($sectionIndex === count($sections)-1)
                    <button type="button" class="mx-4 bg-rose-500 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded prevButton">Back</button>
                    <button id="submit-button" class="mx-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    @elseif ($sectionIndex === 0)
                    <button type="button" class="mx-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded nextButton">Next</button>
                    @else
                    <button type="button" class="mx-4 bg-rose-500 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded prevButton">Back</button>
                    <button type="button" class="mx-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded nextButton">Next</button>
                    @endif
                </div>
                {{-- button end --}}
            </div>
            @endforeach
        </div>
    </form>
    <div id="overlay" class="fixed top-0 left-0 w-full h-full bg-gray-900 opacity-60 transition-opacity duration-300 ease-in-out pointer-events-none z-40 hidden"></div>
    <div id="confirmation-modal" class="text-center md:w-max w-80 bg-white fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-4 rounded-lg border-solid border-2 border-grey shadow-md z-50 hidden">
        <div class="p-4 rounded-lg">
            <div class="flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 1024 1024" class="my-4 md:h-16 md:w-16">\
                    <path fill="#fb923c" d="M512 64a448 448 0 1 1 0 896a448 448 0 0 1 0-896zm0 832a384 384 0 0 0 0-768a384 384 0 0 0 0 768zm48-176a48 48 0 1 1-96 0a48 48 0 0 1 96 0zm-48-464a32 32 0 0 1 32 32v288a32 32 0 0 1-64 0V288a32 32 0 0 1 32-32z" />
                </svg>
            </div>
            <p class="text-center md:text-xl mb-4 font-bold">Anda Yakin Ingin Mengirim Jawaban ini?</p>
            <button id="confirm-submit" class="mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-2">Ya</button>
            <button id="cancel-submit" class="mt-2 bg-rose-500 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded mx-2">Batal</button>
        </div>
    </div>
    {{-- akhir isi survey --}}

    {{-- script handle location --}}
    
    <script type="module">
        $(document).ready(function(){
            $('#provinceSelect').on('change', function(){
                var kode_provinsi = $(this).val();
                if(kode_provinsi){
                    $('#citySelect').empty().append('<option value="" selected hidden>Pilih Kabupaten/Kota</option>');
                    $.ajax({
                        url: '/cities/'+kode_provinsi,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function(data){
                            if(data){
                                $.each(data, function(key, cities){
                                    $('select[name="city"]').append(
                                        '<option value="' + cities.code + '">' + cities.name + '</option>'
                                    );
                                });
                            }
                        }
                    });
                    $('#districtSelect').empty().append('<option value="" selected hidden>Pilih Kecamatan</option>').append('<option value="" disabled>Pilih Kabupaten/Kota Dahulu</option>');
                    $('#villageSelect').empty().append('<option value="" selected hidden>Pilih Kelurahan</option>').append('<option value="" disabled>Pilih Kecamatan Dahulu</option>');
                }
            });
            $('#citySelect').on('change', function(){
                var kode_kota = $(this).val();
                if(kode_kota){
                    $('#districtSelect').empty().append('<option value="" selected hidden>Pilih Kecamatan</option>');
                    $.ajax({
                        url: '/districts/'+kode_kota,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function(data){
                            if(data){
                                $.each(data, function(key, districts){
                                    $('select[name="district"]').append(
                                        '<option value="' + districts.code + '">' + districts.name + '</option>'
                                    );
                                });
                            }
                        }
                    });
                    $('#villageSelect').empty().append('<option value="" selected hidden>Pilih Kelurahan</option>').append('<option value="" disabled>Pilih Kecamatan Dahulu</option>');
                }
            });
            $('#districtSelect').on('change', function(){
                var kode_kecamatan = $(this).val();
                if(kode_kecamatan){
                    $('#villageSelect').show().prop('disabled', false).empty().append('<option value="" selected hidden>Pilih Kelurahan</option>');
                    $.ajax({
                        url: '/villages/'+kode_kecamatan,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function(data){
                            if(data){
                                $.each(data, function(key, villages){
                                    $('#villageSelect').append(
                                        '<option value="' + villages.code + '">' + villages.name + '</option>'
                                    );
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>

    {{-- script handle button --}}
    <script>
        let currentSection = 0;
        const sections = document.querySelectorAll('.survey-section');
        const nextButton = document.querySelectorAll('.nextButton');
        const prevButton = document.querySelectorAll('.prevButton');
        const submitButton = document.querySelector('.submitButton');
        const confirmationModal = document.getElementById('confirmation-modal');
        const overlay = document.getElementById('overlay');

        function showSection(sectionIndex) {
            sections.forEach((section, index) => {
                section.style.display = index === sectionIndex ? 'block' : 'none';
            });

            // Mengubah warna teks berdasarkan nomor section
            const sectionNumbers = document.querySelectorAll('.section-number');
            sectionNumbers.forEach((number, index) => {
                if (index <= sectionIndex) {
                    number.style.backgroundColor = 'green';
                    number.style.color = 'white';
                } else {
                    number.style.backgroundColor = 'red';
                    number.style.color = 'white';
                }
            });
        }

        function nextSection() {
            if (currentSection < sections.length - 1) {
                currentSection++;
                showSection(currentSection);
            }
        }

        function prevSection() {
            if (currentSection > 0) {
                currentSection--;
                showSection(currentSection);
            }
        }

        document.getElementById('submit-button').addEventListener('click', function(event) {
            event.preventDefault(); // Menghentikan pengiriman formulir secara asinkronus

            // Menampilkan overlay dan modal konfirmasi saat tombol "Submit" diklik
            confirmationModal.style.display = 'block';
            overlay.style.display = 'block';
        });

        document.getElementById('confirm-submit').addEventListener('click', function() {
            // Handle form submission here if the user confirms
            confirmationModal.style.display = 'none'; // Menyembunyikan modal konfirmasi
            overlay.style.display = 'none'; // Menyembunyikan overlay
            document.querySelector('form').submit(); // Mengirim formulir setelah konfirmasi
        });

        document.getElementById('cancel-submit').addEventListener('click', function() {
            // Menutup modal jika pengguna membatalkan
            confirmationModal.style.display = 'none'; // Menyembunyikan modal konfirmasi
            overlay.style.display = 'none'; // Menyembunyikan overlay
        });

        // Initial setup
        showSection(currentSection);

        // Add event listeners
        nextButton.forEach(button => {
            button.addEventListener('click', () => {
                nextSection();
            });
        });

        prevButton.forEach(button => {
            button.addEventListener('click', () => {
                prevSection();
            });
        });
    </script>
</body>
@endsection