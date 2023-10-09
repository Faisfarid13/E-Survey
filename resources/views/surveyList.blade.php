@extends('navbar-pegawai2')

@section('title')
    <title>List Survey</title>
@endsection

@section('content')
<!--Data Table-->
    <!--Add jQuery cdn-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!--Add data table cdn-->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <!--Add css file-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
     <!--Inisialisasi data tabel-->
     <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
     <style>
        div.dataTables_wrapper{
            margin-top: 2%;
            margin-right: 2%;
            margin-left: 2%;
            margin-bottom: 2%;
        }

        div.example_filter{
            margin-bottom: 1%;
        }
    </style>

    
    {{-- List survey --}}
    <table class="compact" id="myTable">
        <thead>
            <tr>
                <th style="text-align: center">List Survey</th>
            </tr>
        </thead>
        @foreach ($surveys as $item)     
        <tbody>
            <tr>
                <td>      
                    <div class="border w-full mx-auto p-3 rounded-lg hover:shadow-lg hover:bg-white bg-[#CADAC5]">
                        <p style="font-family: Inter; font-weight:700;" class="text-[0.875rem] md:text-[1rem]">{{$item->title}}</p>
                        <p style="font-family: Inter; font-weight:400" class="py-2 text-[0.6875rem] md:text-[0.875rem]">{{$item->description}}</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td style="font-family: Inter;" class="text-[0.5rem] md:text-[0.6875rem]">Kategori </td>
                                    <td style="font-family: Inter;" class="text-[0.5rem] md:text-[0.6875rem]">: {{$item->criteria}}</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Inter;" class="text-[0.5rem] md:text-[0.6875rem]">Tanggal Publikasi </td>
                                    <td style="font-family: Inter;" class="text-[0.5rem] md:text-[0.6875rem]">: {{$item->tanggal_mulai}}</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Inter;" class="text-[0.5rem] md:text-[0.6875rem]">Tanggal survey ditutup </td>
                                    <td style="font-family: Inter;" class="text-[0.5rem] md:text-[0.6875rem]">: {{$item->tanggal_selesai}} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

@endsection