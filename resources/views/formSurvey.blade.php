@extends('master')
@section('content')

{{-- page isi survey --}}

<body>
    <form action="{{ url('formSurvey/'.$surveys->title.'/submit') }}" method="post">
        <div class="m-8 p-2 border-solid border-2 border-grey rounded">
            <h1 class="text-2xl font-bold">{{$surveys->title}}</h1>
            <div>
                {!!$surveys->description!!}
            </div>
            <hr class="my-6 border-grey border-solid" />

            <div class="section-list flex justify-center">
                @foreach ($sections as $sectionIndex => $section)
                <div class="flex mx-4 border-solid border-2 rounded-full shadow-xl">
                    <span class="section-number py-2 px-4 mr-2 text-white font-bold border-solid border-2 rounded-full" data-section="{{ $sectionIndex }}">{{ $sectionIndex + 1 }}</span>
                    <p class="font-bold py-2 px-4 mr-4">{{$section->section}}</p>
                </div>
                @endforeach
            </div>

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

                        @elseif($question->question_category_id === 4)
                        <div class="flex">
                            @foreach ($question->choice as $choice)
                            <div class="flex items-center mr-4">
                                <input id="inline-radio" type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                               <label for="">{{ $choice->pilihan_pertanyaan }}</label>
                            </div>
                            @endforeach
                        </div>
    
                        @elseif($question->question_category_id === 5)
                            @foreach ($question->choice as $choice)
                            <div class="choice">
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}">
                                {{ $choice->pilihan_pertanyaan }}
                            </div>
                            @endforeach
                        

                        @elseif($question->question_category_id === 6)
                        <select name="answers[{{ $question->id }}]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="" disabled selected>Pilih Jawaban yang sesuai</option>
                            @foreach($question->choice as $choice) 
                                <option value="{{ $choice->id }}"><h1>{{ $choice->pilihan_pertanyaan }}</h1></option>
                            @endforeach    
                        </select>

                        @elseif($question->question_category_id === 7)
                        @foreach ($question->choice as $choice)
                            <div class="choice">
                                <input type="checkbox" name="answers[{{ $question->id }}]" value="{{ $choice->id }}">
                                {{ $choice->pilihan_pertanyaan }}
                            </div>
                        @endforeach
                        
                        @elseif($question->question_category_id === 8)
                        <input type="date" name="answers[{{ $question->id }}]">

                        @elseif($question->question_category_id === 9)
                        <input type="time" name="answers[{{ $question->id }}]">
                        @endif
                    </div>
                        
                            
                            {{-- <select name="answers[{{ $question->id }}]">
                                @foreach($question->choice as $choice) 
                                    <option value="{{ $choice->id }}"><h1>{{ $choice->pilihan_pertanyaan }}</h1></option>
                                @endforeach
                            </select> --}}
                </div>
                @endforeach
                <div class="flex justify-end">
                    @if($sectionIndex === count($sections)-1)
                    <button type="button" class="mx-4 bg-rose-500 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded prevButton">Back</button>
                    <button type="submit" class="mx-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" style="{{ $sectionIndex === count($sections) - 1 ? '' : 'display: none;' }}">Submit</button>
                    @elseif ($sectionIndex === 0)
                    <button type="button" class="mx-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded nextButton">Next</button>
                    @else
                    <button type="button" class="mx-4 bg-rose-500 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded prevButton">Back</button>
                    <button type="button" class="mx-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded nextButton">Next</button>
                    @endif
                </div>
            </div>
            @endforeach
            {{-- <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> --}}
        </div>
    </form>
    {{-- akhir isi survey --}}
    <script>
        let currentSection = 0;
        const sections = document.querySelectorAll('.survey-section');
        const nextButton = document.querySelectorAll('.nextButton');
        const prevButton = document.querySelectorAll('.prevButton');
        const submitButton = document.querySelector('.submitButton');

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
            debugger;
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

        submitButton.addEventListener('click', () => {
            // Handle form submission here if needed
        });
    </script>
</body>
@endsection
