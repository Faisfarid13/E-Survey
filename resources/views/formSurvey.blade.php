@extends('master')
@section('content')

{{-- page isi survey --}}

<body>
    <form action="{{ url('formSurvey/'.$surveys->title.'/submit') }}" method="post">
        <div class="m-8 p-2 border-solid border-2 border-black rounded">
            <h1>{{$surveys->title}}</h1>
            {!!$surveys->description!!}
            <hr class="my-6 border-black border-solid" />
            @csrf
            @foreach ($sections as $sectionIndex => $section)
            {{-- @dd($sections) --}}
            <div class="survey-section" style="{{ $sectionIndex > 0 ? 'display: none;' : '' }}">
                <h1>{{$section->section}} </h1>
                @foreach ($section->question as $question)
                
                <div class="m-4 p-2 border-solid border-2 border-black rounded-lg">
                    <label class="question" for="survey">
                        <p>{{$question->question}}</p>
                    </label>
                    {{-- @dd($questions);  --}}
                        @if ($question->question_category_id === 1)                    
                        <input type='text' name="answers[{{ $question->id }}]" placeholder="Jawaban Singkat">

                        @elseif($question->question_category_id === 2)
                        <textarea name="answers[{{ $question->id }}] "class="rounded-lg resize-none w-full" placeholder="Jawaban Panjang"> </textarea>

                        @elseif($question->question_category_id === 3)
                        <input type='email' name="answers[{{ $question->id }}]" placeholder="Email">

                        @elseif($question->question_category_id === 6)
                        <input type='date' name="answers[{{ $question->id }}]">
                        
                        {{-- @elseif($question->question_category_id === 4)
                        <input type="range" name="answers[{{ $question->id }}]" id="" min="1" max="10" step="1"> --}}

                        @elseif($question->question_category_id === 4 || $question->question_category_id === 5)
                            @foreach ($question->choice as $choice)
                            <div class="choice">
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}">
                                {{ $choice->pilihan_pertanyaan }}
                            </div>
                            @endforeach
                        @endif
                            {{-- <select name="answers[{{ $question->id }}]">
                                @foreach($question->choice as $choice) 
                                    <option value="{{ $choice->id }}"><h1>{{ $choice->pilihan_pertanyaan }}</h1></option>
                                @endforeach
                            </select> --}}
                </div>
                @endforeach
            </div>
            @endforeach
            <div class="navigation-buttons">
                <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="prevButton">Back</button>
                <button type="button" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" id="nextButton">Next</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="{{ $sectionIndex === count($sections) - 1 ? '' : 'display: none;' }}">Submit</button>
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
