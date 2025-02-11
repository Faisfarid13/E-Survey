<div>
    <nav class="bg-white p-3 shadow-xl rounded-b-3xl sticky top-0">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <img src="{{ asset('/asset/logokemenag.png') }}" alt="Logo" class="w-12 h-12">
                <h1 class="text-[#266C3E] text-xs font-bold">
                    Badan Litbang dan Diklat <br>
                    Kementerian Agama RI
                </h1>
            </div>

            <!-- Menu untuk Desktop -->
            <ul class="hidden md:flex lg:flex space-x-6 text-[#266C3E] text-lg font-semibold items-center" style="font-family: 'Poppins';">
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-200" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-200" href="#footer">Pusat Bantuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:text-gray-200" href="../tentangkami">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-light bg-white text-[#266C3E] font-3xl rounded-lg border-2 shadow-lg font-semibold w-28 h-10"><a href="../admin/login">Masuk</a></button>
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
            <li><a href="#" class="text-[#266C3E] hover:text-gray-200">Beranda</a></li>
            <li><a href="#" class="text-[#266C3E] hover:text-gray-200">Pusat Bantuan</a></li>
            <li><a href="#" class="text-[#266C3E] hover:text-gray-200">Tentang kami</a></li>
            <li><button type="button" class="btn btn-light font-semibold rounded-lg text-[#266C3E] shadow-lg border-2 bg-white w-24 h-10"><a href="#">Masuk</a></button></li>
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
</div>
