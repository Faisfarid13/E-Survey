<div class="">
    <div class="m-8 p-2 border-solid border-2 border-black rounded">
        <h1>{{$surveys->title}}</h1>
        <p>{{$surveys->description}}</p>
        <hr class="my-6 border-black border-solid" />

        <div class="flex text-center grid grid-cols-2">
            @foreach($sections as $key => $section)
            @if ($key === $currentSection)
            <p class="text-white bg-green-500 border-solid border-2 border-green-500 rounded-full">Step {{$key+1}}</p>
            @else
            <p class="border-solid border-2 border-transparent rounded-full">Step {{$key+1}}</p>
            @endif
            @endforeach
        </div>

        <!-- Section -->
        @foreach($sections as $key => $section)
        @if($key === $currentSection)
        <div class="mt-4">
            <h2 class="font-bold">{{ $section->section }}</h2>

            <!-- Perulangan untutk menampilkan pertanyaan -->
            @csrf
            @foreach($questions->where('section_id', $section->id) as $question)
            <div class="m-4 p-2 border-solid border-2 border-black rounded-lg">
                <label class="question" for="survey">
                    <p>{{$question->question}}</p>
                </label>
                {{-- @dd($questions);  --}}
                @if ($question->question_category_id === 8)
                <input class=" " type='text' placeholder="Text" name="answers[{{ $question->id }}]">

                @elseif($question->question_category_id === 9)
                <textarea name="answers[{{ $question->id }}] " class="rounded-lg resize-none w-full" placeholder="Text"> </textarea>

                @elseif($question->question_category_id === 6)
                <input type='date' name="answers[{{ $question->id }}]">

                @elseif($question->question_category_id === 4 || 5)
                @foreach ($question->choice as $choice)
                <div class="choice">
                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}">
                    {{ $choice->pilihan_pertanyaan }}
                </div>
                @endforeach
                @endif
                {{-- <select name="answers[{{ $question->id }}]">
                @foreach($question->choice as $choice)
                <option value="{{ $choice->id }}">
                    <h1>{{ $choice->pilihan_pertanyaan }}</h1>
                </option>
                @endforeach
                </select> --}}
            </div>
            @endforeach


            @if($key === count($sections) - 1)
            <!-- Ini adalah section terakhir -->
            <button class="bg-rose-500 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded" wire:click="previousSection">Back</button>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="submitForm">Submit</button>
            @else
            @if($key > 0)
            <button class="bg-rose-500 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded" wire:click="previousSection">Back</button>
            @endif

            @if($key < count($sections) - 1) 
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="nextSection">Next</button>
            @endif
            @endif
        </div>
        @endif
        @endforeach
    </div>
</div>