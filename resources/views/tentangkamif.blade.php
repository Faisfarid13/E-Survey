@extends('master')
@section('content')
<body class="bg-gray-100">
    <div class="relative">
        <h1 class="absolute md:ml-12 md:mt-20 ml-2 mt-6 text-[1.7rem] md:text-7xl font-bold tracking-tight leading-none text-white dark:text-dark text-left">Tentang Kami</h1>
        <img src="{{ asset('/asset/line1.png') }}" alt="Logo" class="w-[75%] absolute top-0 left-0">
        <img src="{{ asset('/asset/line2.png') }}" alt="Logo" class="w-[75%] absolute top-0 left-0">
        <img src="{{ asset('/asset/abstract5.png') }}" alt="Logo" class="w-[75%]">
    </div>
    <div class="flex flex-wrap">
        <!-- Card 1 - Kiri -->
        <div class="w-flex md:w-1/2 md:pl-8">
            <div class="p-2 max-w-screen-xl">
                <img src="{{ asset('/asset/ilustrasi.png') }}" alt="Logo" class="w-flex h-flex">
            </div>
        </div>

        <!-- Card 2 - Kanan -->
        <div class="w-flex md:px-10 p-4 mb-36 md:w-1/2">
            <div class="p-2 text-left">
                <h1 class="text-2xl font-semibold text-center mb-4">Visi dan Misi</h1>
                <h2 class="text-justify text-lg">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae aut, tenetur nulla explicabo qui incidunt nostrum reiciendis ea. Voluptatum doloribus corporis fugit inventore ullam temporibus eos nihil tempora officiis vero!
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae aut, tenetur nulla explicabo qui incidunt nostrum reiciendis ea. Voluptatum doloribus corporis fugit inventore ullam temporibus eos nihil tempora officiis vero!
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae aut, tenetur nulla explicabo qui incidunt nostrum reiciendis ea. Voluptatum doloribus corporis fugit inventore ullam temporibus eos nihil tempora officiis vero!
                </h2>
            </div>
        </div>
    </div>

    
</body>
@endsection
