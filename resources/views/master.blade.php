<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="dashboard.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-[#FFFFF] p-4 shadow-lg rounded-b-3xl">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2 ml-10  bg-cover bg-center w-40 h-10" style="background-image: url({{ asset('/asset/logodkv.png') }})">
            </div>

            <!-- Menu untuk Desktop -->
            <ul class="hidden md:flex lg:flex space-x-20 text-[#00923F] text-lg font-semibold items-center">
                <li class="nav-item">
                    <a class="nav-link text-[#00923F] hover:text-gray-200" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-[#00923F] hover:text-gray-200" href="#">Survey</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-[#00923F] hover:text-gray-200" href="#">Riwayat Survey</a>
                </li>
                <li class="nav-item">
                    <a href="/admin">
                        <button type="button" class="btn btn-light bg-white text-[#00923F] font-3xl rounded-lg font-semibold w-28 h-11 mr-10 shadow-md">Masuk</button>
                    </a>
                </li>
                {{-- <li class="relative w-32 h-8 group">
                    <div class="rounded-full border-white border-2 bg-cover text-absolute inset-y-0 left-0 w-8 h-8"
                        style="background-image: url({{ asset('/asset/profile.svg') }})"></div>
                    <button id="profile-button"
                        class="focus:outline-none absolute inset-y-0 right-0 w-22 h-8 text-lg font-semibold"
                        href='#'>Username</button>
                    <div id="profile-dropdown"
                        class="hidden space-y-2 bg-white text-black text-center p-4 rounded-lg shadow-lg right-0 absolute">
                        <a href="#">Profile</a>
                        <a href="#">Keluar</a>
                    </div>
                </li> --}}
            </ul>


            <!-- Tombol Hamburger untuk Mode Mobile -->
            <div class="lg:hidden">
                <button id="hamburger-button" class="text-white hover:text-gray-200 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="#00923f" fill-rule="evenodd" d="M0 3.75A.75.75 0 0 1 .75 3h14.5a.75.75 0 0 1 0 1.5H.75A.75.75 0 0 1 0 3.75ZM0 8a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H.75A.75.75 0 0 1 0 8Zm.75 3.5a.75.75 0 0 0 0 1.5h14.5a.75.75 0 0 0 0-1.5H.75Z" clip-rule="evenodd"/></svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Dropdown Menu untuk Mode Mobile -->
    <div id="dropdown-menu" class="hidden bg-black text-white font-semibold lg:hidden">
        <ul class="text-center space-y-4">
            <li><a href="#" class="text-white hover:text-gray-200">Dashboard</a></li>
            <li><a href="#" class="text-white hover:text-gray-200">Survey</a></li>
            <li><a href="#" class="text-white hover:text-gray-200">Riwayat</a></li>
            <li class="nav-item">
                <button type="button"
                    class="btn btn-light bg-white text-black font-3xl rounded-lg font-semibold w-28 h-11 ">
                    <a href="#">Masuk</a>
                </button>
            </li>
            {{-- <li class="relative">
                <button class="text-center pb-4 text-white font-semibold hover:text-gray-200"
                    id="username-dropdown-button">Username</button>
                <div class="hidden space-y-2 bg-white text-black ml-28 mt-20 p-2 rounded-lg shadow-lg absolute left-1/2 transform -translate-x-1/2 -top-20"
                    id="username-dropdown">
                    <a href="#" class="block w-28 h-8 border border-gray-300 rounded-lg font-semibold">Profile</a>
                    <a href="#" class="block w-28 h-8 border border-gray-300 rounded-lg font-semibold">Keluar</a>
                </div>
            </li> --}}
        </ul>
    </div>

    <main class="container">
        <!-- Content Area -->
    </main>
    <script>
    // const profileButton = document.getElementById('profile-button');
    // const profileDropdown = document.getElementById('profile-dropdown');

    // // Toggle the dropdown when the profile button is clicked
    // profileButton.addEventListener('click', () => {
    //     profileDropdown.classList.toggle('hidden');
    // });

    // // Close the dropdown when clicking outside of it
    // window.addEventListener('click', (event) => {
    //     if (!profileButton.contains(event.target)) {
    //         profileDropdown.classList.add('hidden');
    //     }
    // });

    // const usernameDropdownButton = document.getElementById('username-dropdown-button');
    // const usernameDropdown = document.getElementById('username-dropdown');

    // // Toggle the dropdown when the username button is clicked
    // usernameDropdownButton.addEventListener('click', () => {
    //     usernameDropdown.classList.toggle('hidden');
    // });

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
    <footer class="bg-black" style="font-family: Poppins;">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <img src="{{ asset('/asset/logo.svg') }}" class="w-28 mb-6 mx-auto" alt="Kemenag Logo" />
                    <p class="text-sm text-center font-semibold  text-white">E-Survei <br>Badan Moderasi Beragama dan PSDM <br> Kemenag RI </p>
                </div>
                <div class="md:grid md:grid-cols-2">
                    <div class="mb-6 md:mx-20">
                        <h2 class="mb-6 font-bold text-lg text-white">Bantuan</h2>
                        <ul class="text-white font-normal">
                            <li>
                                <a href="#" class="hover:underline">Pusat Bantuan</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Tentang Kami</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 font-bold text-lg text-white">Alamat</h2>
                        <ul class="text-white font-normal">
                            <li class="mb-4">
                                <a href="https://maps.app.goo.gl/TU8QFFtQa6CZ8ajK6" class="hover:underline">Gedung Kemeterian Agama RI, Jl. M.H. Thamrin No.6,<br> RT.2/RW.1, Kb. Sirih, Jakarta, Kota Jakarta Pusat,<br> Daerah Khusus Ibukota Jakarta 10340</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <a href="#"> <img src="{{ asset('/asset/youtube.png') }}" alt="youtube" class="mr-8"> </a>
                <a href="#"> <img src="{{ asset('/asset/instagram.png') }}" alt="instagram"> </a>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="text-center">
                <p class="text-sm text-center text-gray-500 sm:text-center">© 2023 Badan Moderasi Beragama - All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>