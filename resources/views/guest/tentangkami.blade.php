@extends('master')
@section('content')
<body class="bg-[#EBFFF6]">
    <div class="relative">
        <h1 class="absolute md:ml-12 md:mt-20 ml-2 md:pt-6 mt-6 text-[1.4rem] md:text-7xl font-bold tracking-tight leading-none text-white dark:text-dark text-left">Tentang Kami</h1>
        <img src="{{ asset('/asset/line12baru.png') }}" alt="Logo" class="w-[75%] absolute top-0 left-0">
        <img src="{{ asset('/asset/abstract6.png') }}" alt="Logo" class="w-[75%]">
    </div>
    <div class="flex flex-wrap z-40">
        <!-- Card 1 - Kiri -->
        <div class="w-flex md:w-1/2 md:pl-8">
            <div class="p-2 max-w-screen-xl">
                <img src="{{ asset('/asset/ilustrasikami.png') }}" alt="Logo" class="w-flex h-flex">
            </div>
        </div>

        <!-- Card 2 - Kanan -->
        <div class="w-flex md:px-10 p-4 pt- mb-36 md:w-1/2">
            <div class="text-left">
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
