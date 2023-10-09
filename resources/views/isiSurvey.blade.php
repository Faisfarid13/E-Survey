@extends('master')
@section('content')
<!--jumbotron-->
<section class="bg-[#266C3E] w-full p-6 text-center ">
    <h1 class="mb-4 text-xl font-bold tracking-tight leading-none text-white md:text-4xl lg:text-5xl dark:text-white">
        Selamat Datang di E-Survey</h1>
    <p class="mb-4 text-xl font-bold tracking-tight leading-none text-white md:text-4xl lg:text-2xl dark:text-white">
        Puslitbang Bimas Agama Dan Layanan Keagamaan, Badan</p>
    <p class="mb-4 text-xl font-bold tracking-tight leading-none text-white md:text-4xl lg:text-2xl dark:text-white">
        Litbang Dan Diklat Kementerian Agama</p>
</section>
<!--akhir jumbotron-->

{{-- page isi survey --}}
<body>
    <div class="m-8 p-2 border-solid border-2 border-black rounded">
        <h1>Survey Kepuasan Masyarakat</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt doloremque officiis consequatur laboriosam odit ab velit! Eligendi illum laborum asperiores placeat libero accusantium voluptatum minima facilis voluptas quia fuga, omnis itaque ipsum dolores suscipit dicta nesciunt officia ullam quisquam architecto quasi pariatur? Odit repellendus dolores vitae possimus aut expedita magni.</p>
        <hr class="my-6 border-black border-solid" />
        <p>Menunjukkan pertanyaan yang wajib diisi</p>
        
        <div class="m-4 p-2 border-solid border-2 border-black rounded-lg">
            <p>5. Pertanyaan 5</p>
            <div>
                <input type='date' name="" id="">
                
            </div>

        </div>
        <div class="m-4 p-2 border-solid border-2 border-black rounded">
            <p>6. Pertanyaan 6</p>
            <div>
                <input type='time' name="" id="">
                
            </div>
        </div>
        <div class="m-4 p-2 border-solid border-2 border-black rounded">
            <p>7. Pertanyaan 7</p>
            <div>
                <input type='email' name="" id="" placeholder="Email">
                
            </div>
        </div>
        <div class="m-4 p-2 border-solid border-2 border-black rounded">
            <p>8. Pertanyaan 8</p>
            <div >
                <input type='checkbox' name="" id=""> <label>Pilihan 1</label> <br>
                <input type='checkbox' name="" id=""> <label>Pilihan 1</label> <br>
                <input type='checkbox' name="" id=""> <label>Pilihan 1</label> <br>
                <input type='checkbox' name="" id=""> <label>Pilihan 1</label> <br>
                <input type='checkbox' name="" id=""> <label>Pilihan 1</label> <br>
                
            </div>
        </div>
        <div class="m-4 p-2 border-solid border-2 border-black rounded">
            <p>9. Pertanyaan 9</p>
            
        </div>
        
    </div>
</body>
{{-- akhir isi survey --}}
@endsection


{{-- <script>
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
</script> --}}