@extends('master')

@section('title')
    HASIL ANALISIS
@endsection

@section('content')
    <div class="bg-white">
        <div class="text-center w-fit mx-auto bg-white">
            <div class="">
                {{-- embedded code disini --}}
                @foreach ($surveys as $item)
                    @if (($item->hasil) != null)
                        {!!$item->hasil!!}
                    @else
                        <p>Mohon maaf, hasil analisis survey belum tersedia silahkan kembali nanti</p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("click",function(event){
          if(event.target.classList.contains("surveyCard")){
            const surveyId = event.target.getAttribute("surveyId");
            console.log(surveyId);
            window.location.href = "/hasil/"+surveyId;
          }
        });
      </script>
@endsection