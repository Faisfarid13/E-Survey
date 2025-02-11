<!-- check login -->
@if(auth()->check())
    <!-- Navbar -->
<nav class="bg-white p-3 drop-shadow-xl" style="font-family: 'Poppins';">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div id="masterLogo" onclick="window.location.href='/'" class="flex items-center space-x-2 cursor-pointer">
                <img src="{{ asset('/asset/logokemenag.png') }}" alt="Logo" class="w-12 h-12">
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
@else 
<nav class="bg-white p-3 drop-shadow-xl sticky top-0 z-10">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div onclick="window.location.href='/'" class="flex items-center space-x-2 cursor-pointer">
            <img src="{{ asset('/asset/logokemenag.png') }}" alt="Logo" class="w-12 h-12">  
            <h1 class="text-[#137C13] text-xs font-bold" style="font-family: 'Poppins';">
                Badan Litbang dan Diklat <br>
                <span class="text-sm">Kementerian Agama RI</span>
            </h1> 
        </div>
        <!-- handler klik logo -->

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
</nav>

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

<script>
    // Toggle menu mobile ketika tombol hamburger ditekan
    const hamburgerButton = document.getElementById('hamburger-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    hamburgerButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
</script>
@endif
