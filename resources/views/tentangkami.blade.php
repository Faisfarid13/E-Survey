@extends('master')
@section('content')
<body class="bg-gray-100">
    <div class="container relative mx-auto mt-0">
    <h1 class="absolute ml-36 mt-10 text-lg font-bold tracking-tight leading-none text-white md:text-6xl  dark:text-dark text-center">Tentang Kami</h1>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="50 0 1040 280" class="w-full h-max"><path fill="#77A06A" fill-opacity="1" d="M0,256L60,229.3C120,203,240,149,360,133.3C480,117,600,139,720,154.7C840,171,960,181,1080,154.7C1200,128,1320,64,1380,32L1440,0L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
        <div class="flex flex-wrap">
        
            <!-- Card 1 -->
            <div class="flex md:w-1/2 p-4">
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-screen-xl">
                <div class="w-1/2 pr-4">
                <img src="{{ asset('/asset/ttgkami.png') }}" alt="Logo" class=" max-w-lg h-screen">
                </div>
</div>
            </div>


            <!-- Card 2 -->
            <div class="w-full md:w-1/2 p-4">
            <svg width="95" height="95" viewBox="0 0 95 95" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <circle cx="47.5" cy="47.5" r="47.5" fill="#F5F5FA"/>
            <rect x="5" y="6" width="78" height="78" fill="url(#pattern0)"/>
            <defs>
            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
            <use xlink:href="#image0_1271_2794" transform="scale(0.0078125)"/>
            </pattern>
            <image id="image0_1271_2794" width="128" height="128" xlink:href="data:image/png;base64,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"/>
            </defs>
            </svg>

            <div class="rounded-lg shadow-lg p-6 ">
                <div class="bg-white rounded-lg shadow-lg p-6 mr-0 text-left">
                    <div class="w-1/2">
                        <h2 class="text-xl font-semibold text-center mb-2">Visi dan Misi</h2>
                        <br>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae aut, tenetur nulla explicabo qui incidunt nostrum reiciendis ea. Voluptatum doloribus corporis fugit inventore ullam temporibus eos nihil tempora officiis vero!
          
         
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae aut, tenetur nulla explicabo qui incidunt nostrum reiciendis ea. Voluptatum doloribus corporis fugit inventore ullam temporibus eos nihil tempora officiis vero!
          
          
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae aut, tenetur nulla explicabo qui incidunt nostrum reiciendis ea. Voluptatum doloribus corporis fugit inventore ullam temporibus eos nihil tempora officiis vero!
            </br>
                                </div>
            </div>
                            </div>
          
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#77A06A" fill-opacity="1" d="M0,256L60,229.3C120,203,240,149,360,133.3C480,117,600,139,720,154.7C840,171,960,181,1080,154.7C1200,128,1320,64,1380,32L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
@endsection