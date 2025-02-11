@extends('master')
@section('title', 'Terima Kasih')
@section('content')

<body>
    <div class="md:w-max md:mx-auto m-8 p-8 bg-white rounded shadow-md justify-center">
        <div class="text-center mb-4">
            <p class="text-xl font-bold">Terima Kasih Sudah Mengisi Survei Kami</p>
        </div>
        <div class="flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 1024 1024" class="">
                <path fill="#22c55e" d="M512 64a448 448 0 1 1 0 896a448 448 0 0 1 0-896zm-55.808 536.384l-99.52-99.584a38.4 38.4 0 1 0-54.336 54.336l126.72 126.72a38.272 38.272 0 0 0 54.336 0l262.4-262.464a38.4 38.4 0 1 0-54.272-54.336L456.192 600.384z" />
            </svg>
        </div>
        <p class="text-center font-medium">Survei Anda Berhasil Dikirim</p>
        <div class="item-center flex justify-center">
            @auth
                <button type="button" onclick="navigateToDashboard()" class="mt-8 text-white bg-green-500 hover:bg-green-700 font-bold py-2 px-4 rounded">Back To Dashboard</button>
            @else
                <button type="button" onclick="navigateToHomepage()" class="mt-8 text-white bg-green-500 hover:bg-green-700 font-bold py-2 px-4 rounded">Back To Home</button>
            @endauth
        </div>
    </div>
</body>

<script>
    function navigateToDashboard() {
        var newPageUrl = '/dashboard';
        window.location.href = newPageUrl;
    }

    function navigateToHomepage() {
        var newPageUrl = '/';
        window.location.href = newPageUrl;
    }
</script>

@endsection