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

{{-- page isi survey --}}

<body>
    <livewire:wizard />
    <form action="{{ url('formSurvey/'.$surveys->title.'/submit') }}" method="post">
        <div class="m-8 p-2 border-solid border-2 border-black rounded">
            <h1>{{$surveys->title}}</h1>
            {!!$surveys->description!!}
            <hr class="my-6 border-black border-solid" />
            @csrf
            @foreach ($questions as $question)

            <div class="m-4 p-2 border-solid border-2 border-black rounded-lg">
                <label class="question" for="survey">
                    <p>{{$question->question}}</p>
                </label>
                {{-- @dd($questions);  --}}
                @if ($question->question_category_id === 2)
                <input type='text' name="answers[{{ $question->id }}]">

                @elseif($question->question_category_id === 3)
                <textarea name="answers[{{ $question->id }}] " class="rounded-lg resize-none w-full"> </textarea>

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
            <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </div>
    </form>
    {{-- akhir isi survey --}}

</body>