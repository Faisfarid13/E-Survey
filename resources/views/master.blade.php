<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css'])
    <!--Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
    <link rel="icon" type="logokemenag.png" href="/asset/logokemenag.png"/>
    <!-- jQuery -->
    @vite(['resources/js/app.js'])
</head>

<body>
<!-- Navbar -->
<nav class="bg-white p-3 drop-shadow-xl sticky top-0 z-10">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div id="masterLogo" class="flex items-center space-x-2 cursor-pointer">
            <img src="/asset/logokemenag.png" alt="Logo" class="w-12 h-12">  
            <h1 class="text-[#137C13] text-xs font-bold" style="font-family: 'Poppins';">
                Badan Litbang dan Diklat <br>
                <span class="text-sm">Kementerian Agama RI</span>
            </h1> 
        </div>
        <!-- handler klik logo -->
        <script type="module">
            $(document).ready(function(){
                $('#masterLogo').click(function(){
                    window.location.href = "/";
                });
            });
        </script>

        <!-- Menu untuk Desktop -->
        <ul class="hidden md:flex lg:flex space-x-6 text-[#137C13] text-lg font-semibold items-center" style="font-family: 'Poppins';">
            <li class="nav-item">
                <a class="nav-link hover:text-gray-200" href="/">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover:text-gray-200" href="/analisis">Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover:text-gray-200" href="#footer">Pusat Bantuan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover:text-gray-200" href="../tentangkami">Tentang Kami</a>
            </li>
            <li class="nav-item">
                <button type="button" onclick="window.location.href='/admin/login'" class="btn btn-light bg-white text-[#137C13] font-3xl rounded-lg border-2 shadow-lg font-semibold w-28 h-10">Masuk</button>
            </li>
        </ul>
        <!-- Tombol Hamburger untuk Mode Mobile -->
        <div class="lg:hidden">
            <button id="hamburger-button" class="text-white hover:text-green-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="green" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    <!-- Dropdown Menu untuk Mode Mobile -->
    <div id="dropdown-menu" class="hidden font-semibold bg-white py-4 lg:hidden">
        <ul class="text-center space-y-4">
            <li><a href="/" class="text-[#137C13] hover:text-gray-200">Beranda</a></li>
            <li><a href="/analisis" class="text-[#137C13] hover:text-gray-200">Data</a></li>
            <li><a href="#footer" class="text-[#137C13] hover:text-gray-200">Pusat Bantuan</a></li>
            <li><a href="../tentangkami" class="text-[#137C13] hover:text-gray-200">Tentang kami</a></li>
            <li><button type="button" onclick="window.location.href='/admin/login'" class="btn btn-light font-semibold rounded-lg text-[#137C13] shadow-lg border-2 bg-white w-24 h-10">Masuk</button></li>
        </ul>
    </div>
</nav>


<script>
    // Toggle menu mobile ketika tombol hamburger ditekan
    const hamburgerButton = document.getElementById('hamburger-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    hamburgerButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
</script>

@yield('content')

<footer id="footer" class="bg-[#76817C]" style="font-family: Poppins;">
    <div class="relative ">
        <div class="bottom-0 inset-x-0 mx-auto w-full max-w-screen-xl p-4 py-1 md:py-6 lg:py-8">
            <div class="md:mt-12 mt-8 md:flex md:justify-between">
                <div class="mr-4 md:mb-0">
                    <img src="/asset/logokemenag.png" class="w-[86px] h-[82px]"/>
                    <div class="flex my-4">
                        <a href="#"> <iconify-icon class="mr-3" icon="iconoir:youtube" style="color: white;" width="35"></iconify-icon> </a>
                        <a href="#"> <iconify-icon icon="iconoir:instagram" style="color: white;" width="35"></iconify-icon> </a>
                    </div>
                </div>
                <div class="my-2 mr-14">
                    <p class="text-left text-base font-semibold text-white">Badan Litbang dan Diklat <br> Kementerian Agama <br> Republik Indonesia </p>
                </div>
                <div class="md:grid md:grid-cols-2">
                    <div class="mb-6 md:mx-4">
                        <h2 class="mb-6 font-bold text-lg text-white">Bantuan</h2>
                        <ul class="text-white font-normal">
                            <li>
                                <a href="https://mail.google.com/mail/?view=cm&to=sisinfobalitbangdiklat@kemenag.go.id&su=Subjek%20Email&body=Isi%20Pesan" class="hover:underline ">sisinfobalitbangdiklat@kemenag.go.id</a>
                            </li>
                            <li>
                                <a>(021) 7404185</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 font-bold text-lg text-white">Alamat</h2>
                        <ul class="text-white font-normal">
                            <li class="mb-4">
                                <a href="https://maps.app.goo.gl/TU8QFFtQa6CZ8ajK6" class="hover:underline">Gedung Kementerian Agama RI, Jl. M.H. Thamrin No.6,<br> RT.2/RW.1, Kb. Sirih, Jakarta, Kota Jakarta Pusat,<br> Daerah Khusus Ibukota Jakarta 10340</a>
                            </li>
                        </ul>
                        <iframe class="w-full rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.301841863525!2d106.82129343856599!3d-6.183762731845963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5b7f1744e87%3A0x86cdb90f595f526a!2sBadan%20Litbang%20dan%20Diklat%20Kementerian%20Agama%20RI!5e0!3m2!1sid!2sid!4v1702522175500!5m2!1sid!2sid" 
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-white sm:mx-auto lg:my-8" />
            <div class="text-center">
                <p class="text-sm text-center text-white sm:text-center">© 2023 Badan Litbang dan Diklat - All Rights Reserved.</p>
                <p class="text-sm text-center text-white sm:text-center">Developed by <a href="https://www.instagram.com/intern.balitbang/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" target="_blank">MSIB batch 5</a>.</p>
            </div>
        </div>
    </div>
</footer>
<x-home.back-top-button />
</body>

</html>
