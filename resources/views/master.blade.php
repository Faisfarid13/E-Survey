<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="dashboard.css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-black p-4 ">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2 ml-10">
                <img src="" alt="Logo" class="">
                <h1 class="text-white text-base font-semibold">
                    E-Survey <br>
                    Badan Moderasi Beragama dan PDSM <br>
                    Kemenag RI
                </h1>
            </div>

            <!-- Menu untuk Desktop -->
            <ul class="hidden md:flex lg:flex space-x-20 text-white text-lg font-semibold items-center">
                <li class="nav-item">
                    <a class="nav-link text-white hover:text-gray-200" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white hover:text-gray-200" href="#">Survey</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white hover:text-gray-200" href="#">Riwayat Survey</a>
                </li>
                <li class="nav-item">
                    <button type="button"
                        class="btn btn-light bg-white text-black font-3xl rounded-lg font-semibold w-28 h-11 mr-10"><a
                            href="#">Masuk</a></button>
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
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
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
</body>

</html>