@extends('master')
@section('content')

{{-- page isi survey --}}

<body>
    <form action="{{ url('formSurvey/'.$surveys->title.'/submit') }}" method="post">
        <div class="m-8 p-2 border-solid border-2 border-grey rounded">
            <h1 class="text-2xl font-bold">{{$surveys->title}}</h1>
            {!!$surveys->description!!}
            <hr class="my-6 border-grey border-solid" />
            @csrf
                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                    <span class="font-medium">Submit Gagal, mohon periksa kembali jawaban anda</span> 
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </div>
                @endif
            @foreach ($sections as $sectionIndex => $section)
            {{-- @dd($sectionIndex) --}}
            <div class="survey-section" style="{{ $sectionIndex > 0 ? 'display: none;' : '' }}">
                <h1 class="text-xl font-bold w-full">{{$section->section}} </h1>
                @foreach ($section->question as $question)
                
                <div class="m-4 p-4 border-solid border border-grey rounded-lg shadow-lg">
                    <label class="question flex" for="survey">
                        <p>{{$question->question}}</p>
                        @if($question->validation === 'required')
                        <p class="ml-2 text-red-600">*</p>
                        @endif    
                    </label>
                    <small class="form-text text-muted">
                        Aturan: {{ str_replace(',', ', ', $question->validation) }}
                    </small>
                    {{-- @dd($questions);  --}}
                    <div class="answer column">
                        @if ($question->question_category_id === 1)                    
                        <input type='text' name="answers[{{ $question->id }}]" placeholder="Jawaban Singkat" class="peer w-max border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-pink-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">

                        @elseif($question->question_category_id === 2)
                        <textarea name="answers[{{ $question->id }}] " class="peer w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-pink-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder="Jawaban Panjang"> </textarea>

                        @elseif($question->question_category_id === 3)
                        <input type='email' name="answers[{{ $question->id }}]" placeholder="Email" class="peer w-max border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-pink-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">

                        @elseif($question->question_category_id === 6)
                        <input type='date' name="answers[{{ $question->id }}]" class="peer w-max border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-pink-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">
                        
                        {{-- @elseif($question->question_category_id === 4)
                        <input type="range" name="answers[{{ $question->id }}]" id="" min="1" max="10" step="1"> --}}

                        @elseif($question->question_category_id === 5)
                            @foreach ($question->choice as $choice)
                            <div class="choice">
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}">
                                {{ $choice->pilihan_pertanyaan }}
                            </div>
                            @endforeach
                        @elseif($question->question_category_id === 4)
                        <div class="flex">
                            @foreach ($question->choice as $choice)
                            <div class="flex items-center mr-4">
                                <input id="inline-radio" type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                               <label for="">{{ $choice->pilihan_pertanyaan }}</label>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                        
                            
                            {{-- <select name="answers[{{ $question->id }}]">
                                @foreach($question->choice as $choice) 
                                    <option value="{{ $choice->id }}"><h1>{{ $choice->pilihan_pertanyaan }}</h1></option>
                                @endforeach
                            </select> --}}
                </div>
                @endforeach
            </div>
            @endforeach
            <div class="navigation-buttons flex justify-end">
                <button type="button" class="mx-4 bg-rose-500 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded" id="prevButton">Back</button>
                <button type="button" class="mx-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="nextButton">Next</button>
                <button type="submit" class="mx-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" style="{{ $sectionIndex === count($sections) - 1 ? '' : 'display: none;' }}">Submit</button>
            </div>
            {{-- <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> --}}
        </div>
    </form>
    {{-- akhir isi survey --}}
    <script>
        let currentSection = 0;
        const sections = document.querySelectorAll('.survey-section');

        function showSection(sectionIndex) {
            sections.forEach((section, index) => {
                section.style.display = index === sectionIndex ? 'block' : 'none';
            });
        }

        function nextSection() {
            debugger;
            if (currentSection < sections.length - 1) {
                currentSection++;
                showSection(currentSection);
                console.log('Next Section:', currentSection);
            }
        }

        function prevSection() {
            if (currentSection > 0) {
                currentSection--;
                showSection(currentSection);
                console.log('Previous Section:', currentSection);
            }
        }

        // Panggil fungsi untuk menampilkan section saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function () {
            showSection(currentSection);

        // Tambahkan event listener untuk tombol Next dan Back
        document.querySelector('#nextButton').addEventListener('click', function () {
            nextSection();
        });

        document.querySelector('#prevButton').addEventListener('click', function () {
            prevSection();
        });
    });
    </script>
</body>
@endsection
