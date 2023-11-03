<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tambahkan link ke CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
    <!--Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<img src="{{ asset('/asset/detailsurvey.png') }}" alt="">
<div class="mx-auto w-4/5 h-screen"> 
    <h1 class="md:mt-4 mt-6 text-sm md:text-2xl font-semibold text-center mb-4" style="font-family: 'Poppins';">Survey Kepuasan Masyarakat Terhadap Pelayanan KUA</h1>
    <h2 class="md:mt-8 md:text-base text-xs text-justify mb-4" style="font-family: 'Poppins';">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    </h2>
    <table class="md:mt-8 md:text-base text-xs text-justify mb-4" style="font-family: 'Poppins';">
        <tbody>
            <tr>
                <td>Kategori </td>
                <td>: hggg</td>
            </tr>
            <tr>
                <td>Tanggal Publikasi </td>
                <td>: 67bhoo</td>
            </tr>
            <tr>
                <td>Tanggal survey ditutup </td>
                <td>: hhh </td>
            </tr>
        </tbody>
    </table>
     <!-- Button -->
     <div class="flex items-center justify-center">
        <button type="button" onclick="isisurvey()" class="btn btn-light drop-shadow-lg focus:outline-none hover:shadow-md text-grey-800 bg-[#C7E2D9] hover:bg-[#EBFFF6] font-bold rounded-full p-2 text-md px-5 py-1.5 mr-2 mb-2 mt-5 w-56 h-10 dark:focus:ring-yellow-900">Selanjutnya</button>
      </div>
      <div  class="flex items-center justify-center mb-2">
        <button type="button" onclick="list()" class="btn btn-light drop-shadow-lg focus:outline-none hover:shadow-md text-grey-800 bg-white hover:bg-gray-200 font-bold rounded-full p-2 text-md px-5 py-1.5 mr-2 mb-2 mt-5 w-56 h-10 dark:focus:ring-yellow-900">Batal</button>
      </div>
</div>

</body>
</html>