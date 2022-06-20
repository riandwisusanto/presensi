<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token() }}">
    <style>
        table.static{
        position: relative;
        border: 1px solid #543535;
        }
    </style>
    <title>CETAK DATA STAFF</title>
</head>
<body>
    <div class="form-group">
        <h3 align="center"><b>Laporan Data staff</b></h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody>
            @php $i = 1 @endphp
                @forelse($staf as $staff)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$staff->nip}}</td>
                        <td>{{$staff->nama}}</td>
                        <td>{{$staff->email}}</td>
                        <td>{{$staff->alamat}}</td>
                        <td>{{$staff->jabatan}}</td>
                    </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>