@extends('master')

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
        }

        div.example_filter{
            margin-bottom: 1%;
        }
    </style>
    <!--Inisialisasi data tabel-->
    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        } );
    </script>
    <table id="example" class="row-border stripe" style="width:100%; font-family:Poppins; font-size: 1rem; border: 1px black solid;">
        <thead>
            <tr style="background-color: #00923F">
                <th class="text-white" style="text-align: center;">No</th>
                <th class="text-white" style="text-align: center;">Nama Survey</th>
                <th class="text-white" style="text-align: center;">Tanggal Selesai</th>
                <th class="text-white" style="text-align: center;">Status</th>
            </tr>
        </thead>
        @foreach ($surveys as $data)
        <tbody style="font-weight: 400;">
            <tr>
                <td style="width: 5%; text-align: center;">{{ $loop->iteration }}</td>
                <td style="width: 30%">{{ $data->title }}</td>
                <td style="width: 40%">{!! Str::limit($data->description, 100, '...')!!}</td>
                <td style="width: 10%; text-align: center;">{{ $data->status }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>

@endsection