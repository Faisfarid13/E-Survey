@extends('navbar-pegawai2')
@section('title', 'Riwayat Survei')
@section('content')
    <div class="w-[90%] mx-auto my-14">
        <div class="grid grid-cols-2 mb-5 md:mb-10">
            <!-- Pagination -->
            <div class="grid grid-rows">
                <div class="relative flex justify-end w-full md:w-fit">
                    <label for="entries" class="text-[0.875rem] md:text-[1rem] md:w-56 pt-2">Show Entries : </label>
                    <select id="entries" class="bg-[#F7D296] border-gray-300 text-gray-900 text-sm rounded-lg shadow-md block w-2/4 md:w-full text-center">
                        <option value="5" {{ request('entries') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request('entries') == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                    </select>
                </div>
            </div>
            
            <!-- search -->
            <div class="flex justify-end w-full">
                <input type="text" id="search" placeholder="Cari judul survei...." class="border-[#9A9A9A] border-[1px] rounded-[0.625rem] h-10 p-2 w-[60%] md:w-[40%] text-[0.875rem] md:text-[1rem]">
            </div>
        </div>

        <!-- Table Riwayat Survei -->
        <table class="tableData w-full" id="search-results">
            <thead>
                <tr style="font-weight: 400; background-color: #C7E2D9">
                    <th class="text-black text-sm md:text-base" style="text-align: center;">No</th>
                    <th class="text-black text-sm md:text-base" style="text-align: center;">Nama Survei</th>
                    <th class="text-black text-sm md:text-base" style="text-align: center;">Tenggat Survei</th>
                    <th class="text-black text-sm md:text-base" style="text-align: center;">Status</th>
                </tr>
            </thead>
            @foreach ($surveys as $item)
            <tbody class="text-sm md:text-base" style="font-weight: 400;">
                <tr onclick="">
                    <td style="width: 5%; text-align: center;">{{ $loop->iteration }}</td>
                    <td style="width: 30%">{{ $item->title }}</td>
                    <td style="width: 20%; text-align: center;">{{$item->tanggal_selesai}}</td>
                    <td style="width: 10%; text-align: center;">{{ $item->status }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>

        <!-- pagination -->
        <div class="mt-2 md:mt-2">
            <div class="pagination">
                {{ $surveys->appends(['entries' => request('entries')])->links()}}
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

        searchInput.addEventListener("keypress", function () {
            var searchText = searchInput.value;
            var selectedValue = selectElement.value;

            if(event.key == "Enter"){
                window.location.href = "riwayats?entries=" + selectedValue + "&search=" + searchText;
            };
        });

        selectElement.addEventListener("change", function () {
            var selectedValue = selectElement.value;

            window.location.href = "riwayats?entries=" + selectedValue;
        });
    </script>
@endsection

