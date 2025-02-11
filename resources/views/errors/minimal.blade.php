<!-- component -->
@vite(['resources/css/app.css'])
<div class="  md:min-w-screen md:min-h-screen lg:min-w-screen lg:min-h-screen bg-[#9ADED5] flex items-center p-5 lg:p-20 overflow-hidden relative">
    <div class="flex-1 min-h-full min-w-full rounded-3xl bg-white shadow-xl p-10 lg:p-20 text-gray-800 relative md:flex items-center text-center md:text-left">
        <!-- Logo Kemenag -->
        <div class="w-full md:w-1/2">
           <div class="h-64 w-[18rem] lg:h-72 lg:w-[20rem] md:h-72 md:w-[20rem] mx-auto bg-cover bg-center" style="background-image:url({{'asset/logokemenag.png'}})"></div>
           <p class="text-center text-[1.7rem] leading-7 font-semibold mt-4">Badan Litbang dan Diklat</p>
           <p class="text-center text-[1.7rem] leading-7 font-semibold mt-4">Kementerian Agama</p>
        </div>
        <div class="w-full md:w-1/2">
            <!-- Logo Esurvey -->
            <div class="flex justify-end mb-5 lg:mb-10">
                <img src="asset/logodkvfix.png" class="w-60 "></img>
            </div>
            <!-- Detail Error -->
            <div class="mb-5 md:mb-10 text-gray-600">
                <h1 class="uppercase text-2xl lg:text-3xl drop-shadow-lg text-[#FF0202] font-bold mb-10">@yield('message')</h1>
                <p class="uppercase text-md drop-shadow-lg text-black font-bold text-lg lg:text-lg">Error Code : @yield('code')</p>
                <p class="text-md text-black font-semibold drop-shadow-lg text-lg lg:text-lg">@yield('advice')</p>
            </div>
            <!-- Button Back Beranda -->
            <div class="mb-20 md:mb-0">
                <button onclick="window.location.href='/'" class="text-xl hover:text-black hover:shadow-xl shadow-lg border-2 border-[#116223] font-semibold outline-none focus:outline-none transform transition-all hover:scale-110 text-black text-center p-2 rounded-md" >Kembali ke Beranda</button>
            </div>
        </div>
    </div>
</div>