@extends('navbar-pegawai2')

@section('title')
Riwayat Survei
@endsection

@section('content')

    <!--Tailwind Style-->
    <link rel="stylesheet" href="../dist/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />

    <!--Data Table-->
    <!--Add jQuery cdn-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!--Add data table cdn-->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!--Add css file-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!--Add syle-->
    <style>
        div.dataTables_wrapper{
            margin-top: 2%;
            margin-right: 2%;
            margin-left: 2%;
            margin-bottom: 2%;
            font-family:'Poppins';
        }

        @media only screen and (max-width:640px){
            div.dataTables_wrapper{
                font-size: 0.6875rem;
            }
        }

        div.example_filter{
            z-index: 10;
        }
    </style>
    <!--Inisialisasi data tabel-->
    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        } );
    </script>
    <h1 style="font-weight:bold; font-family:Poppins; font-size: 1.5rem; text-align:center; color:#C7E2D9; margin-top:2.5%;">
        Riwayat Survei
    </h1>
    <table id="example" class="row-border stripe" style="z-index: 10; width:100%; font-family:Poppins; font-size: 1rem; border: 1px black solid;">
        <thead>
            <tr style="font-weight: 400; background-color: #C7E2D9">
                <th class="text-black text-sm md:text-base" style="text-align: center;">No</th>
                <th class="text-black text-sm md:text-base" style="text-align: center;">Nama Survey</th>
                <th class="text-black text-sm md:text-base" style="text-align: center;">Tanggal Selesai</th>
                <th class="text-black text-sm md:text-base" style="text-align: center;">Status</th>
            </tr>
        </thead>
        @foreach ($surveys as $data)
        <tbody class="text-sm md:text-base" style="font-weight: 400;">
            <tr onclick="">
                <td style="width: 5%; text-align: center;">{{ $loop->iteration }}</td>
                <td style="width: 30%">{{ $data->title }}</td>
                <td style="width: 20%; text-align: center;">{{$data->tanggal_selesai}}</td>
                <td style="width: 10%; text-align: center;">{{ $data->status }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>

@endsection