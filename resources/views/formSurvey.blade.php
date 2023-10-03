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

    <form action="{{ url('/answers/store') }}" method="post">
        <div class="m-8 p-2 border-solid border-2 border-black rounded">
            <h1>{{$surveys->title}}</h1>
            {!!$surveys->description!!}
            <hr class="my-6 border-black border-solid" />
            @csrf
            @foreach ($questions as $question)
            <div class="m-4 p-2 border-solid border-2 border-black rounded-lg">
                <label for="survey"><p>{{$question->question}}</p></label>
                    @if ($question->question_category_id === 2)                    
                    <input type='text' name="answers[{{ $question->id }}]">

                    @elseif($question->question_category_id === 3)
                    <input type='textarea' name="" id="">

                    @elseif($question->question_category_id === 4)
                    <select name="answers[{{ $question->id }}]">
                        @foreach($question->choices as $choice)
                            <option value="{{ $choice->id }}">{{ $choice->pilihan_pertanyaan }}</option>
                        @endforeach
                    </select>

                    @elseif($question->question_category_id === 6)
                    <input type='date' name="" id="">
                    
                    @else
                    @endif   
                
            </div> 
            @endforeach
            <button class="btn btn-blue" type="submit">Submit</button>
        </div>
        
    </form>
{{-- akhir isi survey --}}
    
</body>
@endsection

