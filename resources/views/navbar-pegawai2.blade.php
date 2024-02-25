<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="logokemenag.png" href="/asset/logokemenag.png"/>
    <!--Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tambahkan tailwind css-->
    @vite(['resources/css/app.css'])
    <!-- jQuery -->
    @vite(['resources/js/app.js'])
    
</head>
<body>

<!-- Navbar -->
<nav class="bg-white p-3 drop-shadow-xl" style="font-family: 'Poppins';">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div id="masterLogo" onclick="window.location.href='/'" class="flex items-center space-x-2 cursor-pointer">
                <img src="/asset/logokemenag.png" alt="Logo" class="w-12 h-12">
                <h1 class="text-[#137C13] text-xs font-bold" style="font-family: 'Poppins';">
                    Badan Litbang dan Diklat <br>
                    <span class="text-sm">Kementerian Agama RI</span>
                </h1> 
            </div>
            <!-- handler klik logo -->

        <!-- Menu untuk Desktop -->
        <ul class="hidden md:flex lg:flex space-x-6 text-[#137C13] text-lg font-semibold items-center">
                <li class="nav-item">
                    <a class="nav-link text-[#137C13] hover:text-gray-200" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-[#137C13] hover:text-gray-200" href="/analisis">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-[#137C13] hover:text-gray-200" href="/listpegawai">Survei</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-[#137C13] hover:text-gray-200" href="/riwayats">Riwayat Survei</a>
                </li>
            <li class="flex grid-cols-2 w-fit">    
                {{-- profile photo --}}
                @if(auth()->check() && auth()->user()->photo)
                    <div class="p-1 h-10 w-10 rounded-full bg-cover bg-center border" style="background-image: url('{{ asset('storage/' . auth()->user()->photo) }}')"></div>
                @else
                    <div class="p-1 h-10 w-10 rounded-full bg-cover" style="background-image: url({{ asset('/asset/profile.svg') }})"></div>
                @endif
                @auth
                <div id="profile-button" class="cursor-pointer p-2 w-fit">{{auth()->user()->name}}</div>
                @endauth
                <div id="profile-dropdown" class="hidden bg-white text-[#137C13] text-center p-2 rounded-lg right-8 shadow-lg mx-auto mt-14 absolute">
                  <a href="/profile" class='block btn btn-light rounded-lg px-6 py-1 border-2 border-gray border-solid'>Profile</a>
                  <div class="mt-1">
                  <a href="/logout" class='block btn btn-light rounded-lg px-6 py-1 border-2 border-gray border-solid'>Keluar</a>
                </div>
            </li>
        </ul>
        

        <!-- Tombol Hamburger untuk Mode Mobile -->
        <div class="lg:hidden">
            <button id="hamburger-button" class="text-white hover:text-gray-200 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="green" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Dropdown Menu untuk Mode Mobile -->
<div id="dropdown-menu" class="relative hidden bg-white text-[#137C13] font-semibold py-4 lg:hidden">
    <ul class="text-center space-y-4 ">
        <li><a href="#" class="text-[#137C13] hover:text-gray-200">Dashboard</a></li>
        <li><a href="#" class="text-[#137C13] hover:text-gray-200">Survey</a></li>
        <li><a href="/riwayats" class="text-[#137C13] hover:text-gray-200">Riwayat</a></li>
        <li class="relative">
            <button class="text-center text-[#266C3E] font-semibold hover:text-gray-200" id="username-dropdown-button">{{ auth()->user()->name }}</button>
            <div class="hidden bg-white text-[#137C13] ml-28 mt-20 p-2 rounded-lg shadow-lg absolute left-1/2 transform -translate-x-1/2 -top-20" id="username-dropdown">
                <a href="#" class="block btn btn-light rounded-lg px-6 py-1 border-2 border-gray border-solid">Profile</a>
                <div class="mt-1">
                <a href="/logout" class="block btn btn-light rounded-lg px-6 py-1 border-2 border-gray border-solid">Keluar</a>
            </div>
        </li>
    </ul>
</div>

<script>
    const profileButton = document.getElementById('profile-button');
    const profileDropdown = document.getElementById('profile-dropdown');

    // Toggle the dropdown when the profile button is clicked
    profileButton.addEventListener('click', () => {
      profileDropdown.classList.toggle('hidden');
    });

    // Close the dropdown when clicking outside of it
    window.addEventListener('click', (event) => {
      if (!profileButton.contains(event.target)) {
        profileDropdown.classList.add('hidden');
      }
    });
    
    const usernameDropdownButton = document.getElementById('username-dropdown-button');
    const usernameDropdown = document.getElementById('username-dropdown');
    
    // Toggle the dropdown when the username button is clicked
    usernameDropdownButton.addEventListener('click', () => {
        usernameDropdown.classList.toggle('hidden');
    });
    
    // Close the dropdown when clicking outside of it
    window.addEventListener('click', (event) => {
        if (!usernameDropdownButton.contains(event.target)) {
            usernameDropdown.classList.add('hidden');
        }
    });
    
    // Toggle menu mobile ketika tombol hamburger ditekan
    const hamburgerButton = document.getElementById('hamburger-button');
    const dropdownMenu = document.getElementById('dropdown-menu');
    
    hamburgerButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
</script>

@yield('content')

<footer id="footer" class="bg-[#76817C]" style="font-family: Poppins;">
    <div class="relative">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-1 md:py-6 lg:py-8">
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
                    </div>
                </div>
            </div>
            <hr class="my-6 border-white sm:mx-auto lg:my-8" />
            <div class="text-center">
                <p class="text-sm text-center text-white sm:text-center">© 2023 Badan Litbang dan Diklat - All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
