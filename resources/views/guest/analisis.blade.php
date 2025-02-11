
{{-- check login --}}
@extends(auth()->check() ? 'navbar-pegawai2' : 'master')
@section('title', 'Hasil Analisis')
@section('content')
    <p class="font-bold mt-10 text-center text-xl mb-4" style="font-family: 'Poppins'">Hasil Analisis Survei</p>
    <div id="surveyResults" class="w-3/5 mx-auto mb-8 ">
        
    </div>
    <!-- list survey -->
    <div id="container" class="mb-4 w-full">
        <table class="w-4/5 mx-auto">
            <tbody>
                @foreach ($surveys as $item)
                        <tr surveyId="{{ $item->id }}">
                            <td>
                                <div class="p-4 rounded-xl w-full mx-auto  hover:shadow-lg bg-[#EBFFF6] hover:bg-[#9ADED5] drop-shadow-lg cursor-pointer mb-3">
                                    <p class="text-lg font-semibold">{{$item->title}}</p>
                                    <p class="text-sm">Tanggal Selesai : {{$item->tanggal_selesai}}</p>
                                </div>
                            </td>
                        </tr>
                @endforeach             
            </tbody>
        </table>
    </div>

    <div id="pagination" class="w-4/5 mx-auto mb-10">
        <div class="pagination">
            {{ $surveys->links() }}
        </div>
    </div>

    <div id="btnBack" class="hidden w-full mt-4">
        <button class="flex mx-auto border rounded p-2 bg-[#F5C577] hover:bg-[#F5C577] mb-4 hover:shadow-lg drop-shadow-md">
            Kembali ke daftar survei
        </button>
    </div>

     {{-- Clickable div --}}
    <script type="module">
        $(document).ready(function() {
            $('tr').click(function() {
                const attributeValue = $(this).attr('surveyId');
                fetch("hasil/" + attributeValue)
                .then(response => response.text())
                .then(data => {
                    $('#surveyResults').show();
                    $('#surveyResults').html(data);
                    $('#btnBack').show();
                    $('#container').hide();
                    $('#pagination').hide();
                });
            });

            $('#btnBack').click(function(){
                $('#surveyResults').hide();
                $('#container').show();
                $('#btnBack').hide();
                $('#pagination').show();
            });
        });
</script>

@endsection