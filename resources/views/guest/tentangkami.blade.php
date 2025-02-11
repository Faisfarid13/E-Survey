@extends(auth()->check() ? 'navbar-pegawai2' : 'master')
@section('title', 'Tentang Kami')
@section('content')
<body class="bg-[#EBFFF6]" style="background-image: url({{'asset/bgTentangKami.png'}}); ">
    <div class="relative">
        <h1 class="absolute md:ml-12 md:mt-16 ml-4 md:pt-4 mt-4 text-[1.4rem] md:text-5xl font-bold tracking-tight leading-none text-[#137C13] dark:text-dark text-left">Tentang Kami</h1>
        <img src="/asset/logodkvfix.png" alt="" class="md:w-[23%] w-[35%] absolute md:mt-36 md:ml-10 mt-12 ml-4">
        <img src="/asset/line12baru.png" alt="Logo" class="md:w-[70%] w-[90%] absolute top-0 left-0">
        <img src="/asset/abstract6.png" alt="Logo" class="md:w-[70%] w-[90%]">
    </div>
    <div class="flex flex-wrap z-40">
        <!-- Card 1 - Kiri -->
        <div class="w-flex md:w-1/2 md:pl-8">
            <div class="p-2 max-w-screen-xl">
                <img src="/asset/ilustrasikami.png" alt="Logo" class="w-flex w-[65%] h-flex md:ml-28 md:mb-8 ml-16 mt-4">
            </div>
        </div>

        <!-- Card 2 - Kanan -->
        <div class="w-flex md:px-10 p-4 mb-16 md:w-1/2 mt-8">
            <div class="text-left md:mr-8">
                <h1 class="md:text-2xl font-bold text-center mb-4">E-Survey Balitbang Diklat Kementerian Agama</h1>
                <h2 class="text-justify font-semibold md:text-xl ">
                E-Survey Balitbang Diklat Kementerian Agama adalah platform yang dikembangkan oleh Badan Litbang dan Diklat Kementerian  Agama untuk membuat survei-survei dalam rangka pengambilan data sebagai bahan rumusan dan evaluasi kebijakan keagamaan
                </h2>
            </div>
        </div>
    </div>
{{--    <div>--}}
{{--        <iframe src="https://survey.zohopublic.com/zs/TuClSv" frameborder='0' style='height:700px;width:100%;' marginwidth='0' marginheight='0' scrolling='auto' allow='geolocation'></iframe>--}}
{{--    </div>--}}

    
</body>
@endsection
