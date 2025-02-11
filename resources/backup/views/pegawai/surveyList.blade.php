@extends('navbar-pegawai2')

@section('title')
    Survey List
@endsection

@section('content')
    <div class="w-[90%] mx-auto my-14">
        <div class="grid grid-cols-2 mb-5 md:mb-10">
            <div class="grid grid-rows">
                <div class="relative flex justify-end w-full md:w-fit">
                    <label for="entries" class="text-[0.875rem] md:text-[1rem] md:w-56 pt-2">Show Entries : </label>
                    <select id="entries" class="bg-[#F7D296] border border-gray-300 text-gray-900 text-sm rounded-lg shadow-md block w-2/4 md:w-full text-center">
                        <option value="5" {{ request('entries') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request('entries') == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end w-full">
                <input type="text" id="search" placeholder="Cari judul survey ...." class="border-[#9A9A9A] border-[1px] rounded-[0.625rem] h-10 p-2 w-[60%] md:w-[40%] text-[0.875rem] md:text-[1rem]">
            </div>
        </div>

        <table class="tableData w-full" id="search-results">
            <tbody>
                @foreach ($surveys as $item)
                <tr>
                    <td>
                        <div class="border w-full mx-auto p-3 rounded-lg hover:shadow-lg hover:bg-white hover:border bg-[#C7E2D9] mb-2">
                            <p style="font-family: Poppins; font-weight:600;" class="text-[0.875rem] md:text-[1rem]">{{$item->title}}</p>
                            <p style="font-family: Poppins; font-weight:400" class="py-1 text-[0.6875rem] md:text-[0.875rem]">{!! Str::limit($item->description, 200, '...') !!}</p>
                            <table>
                                <tbody class="mt-1">
                                    <tr>
                                        <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">Kategori </td>
                                        <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">: {{$item->criteria}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">Tanggal Publikasi </td>
                                        <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">: {{$item->tanggal_mulai}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">Tanggal Survey Ditutup </td>
                                        <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">: {{$item->tanggal_selesai}} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-2 md:mt-2">
            <div class="pagination">
                {{ $surveys->appends(['entries' => request('entries')])->links() }}
            </div>
        </div>
    </div>    

    <script>
        var selectElement = document.getElementById("entries");
        var searchInput = document.getElementById("search");
        var searchResults = document.getElementById("search-results");

        // AJAX (BELUM BISA)
        // searchInput.addEventListener("input", function () {
        //     var searchText = searchInput.value;
        //     var selectedValue = selectElement.value;

        //     fetch("/surveyJS?entries=" + selectedValue + "&search=" + searchText)
        //         .then(response => response.text())
        //         .then(data => {
        //             searchResults.innerHTML = data;
        //         });
        // });

        searchInput.addEventListener("input", function () {
            var searchText = searchInput.value;
            var selectedValue = selectElement.value;

            window.location.href = "listpegawai?entries=" + selectedValue + "&search=" + searchText;
        });

        selectElement.addEventListener("change", function () {
            var selectedValue = selectElement.value;

            window.location.href = "listpegawai?entries=" + selectedValue;
        });
    </script>
@endsection